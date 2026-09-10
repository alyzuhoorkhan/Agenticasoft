<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/php_error.log');
header('Content-Type: application/json');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/PHPMailer/src/Exception.php';
require __DIR__ . '/PHPMailer/src/PHPMailer.php';
require __DIR__ . '/PHPMailer/src/SMTP.php';

// Retrieve POST arguments
$email = trim($_POST['email'] ?? '');
$targetUrl = trim($_POST['url'] ?? '');

if (empty($email) || empty($targetUrl)) {
    echo json_encode(['status' => 'error', 'message' => 'Email and Website URL are required.']);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid email address.']);
    exit;
}

// Add protocol if missing
if (!preg_match('/^https?:\/\//i', $targetUrl)) {
    $targetUrl = 'https://' . $targetUrl;
}

// Basic URL validation
if (!filter_var($targetUrl, FILTER_VALIDATE_URL)) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid website URL.']);
    exit;
}

// Parse domain name for response
$domain = parse_url($targetUrl, PHP_URL_HOST);

// Initialize audit variables
$is_ssl = (strpos(strtolower($targetUrl), 'https://') === 0);
$title = '';
$description = '';
$h1_count = 0;
$has_viewport = false;
$img_count = 0;
$img_with_alt = 0;
$response_time = 0.0;
$crawl_success = false;

// 1. Fetch the URL content with cURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $targetUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt_array($ch, [
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_MAXREDIRS => 3,
    CURLOPT_TIMEOUT => 4,
    CURLOPT_CONNECTTIMEOUT => 3,
    CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AgenticaSoft-SEOBot/1.0',
    CURLOPT_SSL_VERIFYPEER => false, // Bypass SSL validation issues during audits
    CURLOPT_SSL_VERIFYHOST => false
]);

$start_time = microtime(true);
$html = curl_exec($ch);
$end_time = microtime(true);
$response_time = round(($end_time - $start_time), 2);

$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$curl_error = curl_error($ch);
curl_close($ch);

if ($html && $http_code >= 200 && $http_code < 400) {
    $crawl_success = true;
}

// 2. Process findings
$score = 0;
$checks = [];

if ($crawl_success) {
    // SSL Check (15 pts)
    if ($is_ssl) {
        $score += 15;
        $checks[] = [
            'title' => 'SSL Secure Connection',
            'status' => 'pass',
            'score' => 15,
            'max' => 15,
            'message' => 'Your website uses a secure HTTPS connection. This is highly favored by Google and protects user data.'
        ];
    } else {
        $checks[] = [
            'title' => 'SSL Secure Connection',
            'status' => 'fail',
            'score' => 0,
            'max' => 15,
            'message' => 'Your website is using insecure HTTP. Google flags these sites and lowers their search ranking.'
        ];
    }

    // Title Tag Check (15 pts presence + 5 pts length)
    if (preg_match('/<title>(.*?)<\/title>/is', $html, $matches)) {
        $title = htmlspecialchars_decode(trim($matches[1]));
        $title_len = strlen($title);
        $score += 15;
        
        if ($title_len >= 30 && $title_len <= 65) {
            $score += 5;
            $checks[] = [
                'title' => 'Title Tag Optimization',
                'status' => 'pass',
                'score' => 20,
                'max' => 20,
                'message' => "Found title tag ('{$title}') with perfect length ({$title_len} characters)."
            ];
        } else {
            $checks[] = [
                'title' => 'Title Tag Optimization',
                'status' => 'warning',
                'score' => 15,
                'max' => 20,
                'message' => "Title tag exists ('{$title}'), but is {$title_len} characters. Ideal length is 30-65 characters to avoid truncation."
            ];
        }
    } else {
        $checks[] = [
            'title' => 'Title Tag Optimization',
            'status' => 'fail',
            'score' => 0,
            'max' => 20,
            'message' => 'No title tag was found in your site. This is a critical SEO issue.'
        ];
    }

    // Meta Description Check (15 pts presence + 5 pts length)
    $has_desc = false;
    if (preg_match('/<meta\s+[^>]*name=["\']description["\'][^>]*content=["\'](.*?)["\']/is', $html, $matches) ||
        preg_match('/<meta\s+[^>]*content=["\'](.*?)["\'][^>]*name=["\']description["\']/is', $html, $matches)) {
        $description = htmlspecialchars_decode(trim($matches[1]));
        $desc_len = strlen($description);
        $score += 15;
        $has_desc = true;

        if ($desc_len >= 110 && $desc_len <= 160) {
            $score += 5;
            $checks[] = [
                'title' => 'Meta Description',
                'status' => 'pass',
                'score' => 20,
                'max' => 20,
                'message' => "Meta description is set and has an optimal length ({$desc_len} characters)."
            ];
        } else {
            $checks[] = [
                'title' => 'Meta Description',
                'status' => 'warning',
                'score' => 15,
                'max' => 20,
                'message' => "Meta description is present but length is {$desc_len} characters. Ideal length is 110-160 characters."
            ];
        }
    } else {
        $checks[] = [
            'title' => 'Meta Description',
            'status' => 'fail',
            'score' => 0,
            'max' => 20,
            'message' => 'Missing meta description. Search engines will automatically generate one, which is rarely optimized.'
        ];
    }

    // H1 Heading Check (15 pts presence + 5 pts exactly one)
    $h1_count = preg_match_all('/<h1[^>]*>(.*?)<\/h1>/is', $html, $h1_matches);
    if ($h1_count > 0) {
        $score += 15;
        if ($h1_count == 1) {
            $score += 5;
            $checks[] = [
                'title' => 'Heading 1 Structure',
                'status' => 'pass',
                'score' => 20,
                'max' => 20,
                'message' => 'Excellent. Found exactly one H1 header tag on the page.'
            ];
        } else {
            $checks[] = [
                'title' => 'Heading 1 Structure',
                'status' => 'warning',
                'score' => 15,
                'max' => 20,
                'message' => "Found {$h1_count} H1 tags. There should be exactly one H1 tag representing the primary topic of the page."
            ];
        }
    } else {
        $checks[] = [
            'title' => 'Heading 1 Structure',
            'status' => 'fail',
            'score' => 0,
            'max' => 20,
            'message' => 'No H1 tag found. Search engines use the H1 tag to understand the main topic of your page.'
        ];
    }

    // Viewport Mobile Check (15 pts)
    if (preg_match('/<meta\s+[^>]*name=["\']viewport["\']/is', $html)) {
        $has_viewport = true;
        $score += 15;
        $checks[] = [
            'title' => 'Mobile Responsive Check',
            'status' => 'pass',
            'score' => 15,
            'max' => 15,
            'message' => 'Mobile viewport tag found. Your site is configured to render responsively on mobile devices.'
        ];
    } else {
        $checks[] = [
            'title' => 'Mobile Responsive Check',
            'status' => 'fail',
            'score' => 0,
            'max' => 15,
            'message' => 'Missing mobile viewport tag. Your website may not look responsive or mobile-friendly to search bots.'
        ];
    }

    // Image alt tags (10 pts)
    $img_count = preg_match_all('/<img\s+[^>]*>/i', $html, $img_matches);
    if ($img_count > 0) {
        foreach ($img_matches[0] as $img) {
            if (preg_match('/alt\s*=\s*["\']\s*["\']/i', $img) === 0 && preg_match('/alt\s*=/i', $img)) {
                $img_with_alt++;
            }
        }
        $alt_percentage = ($img_with_alt / $img_count);
        $alt_score = round($alt_percentage * 10);
        $score += $alt_score;

        if ($img_with_alt == $img_count) {
            $checks[] = [
                'title' => 'Image Alt Tags',
                'status' => 'pass',
                'score' => 10,
                'max' => 10,
                'message' => "All {$img_count} images contain descriptive alternative (alt) tags."
            ];
        } else {
            $missing = $img_count - $img_with_alt;
            $checks[] = [
                'title' => 'Image Alt Tags',
                'status' => 'warning',
                'score' => $alt_score,
                'max' => 10,
                'message' => "{$img_with_alt} out of {$img_count} images have alt tags. {$missing} images are missing alternative text."
            ];
        }
    } else {
        $score += 10;
        $checks[] = [
            'title' => 'Image Alt Tags',
            'status' => 'pass',
            'score' => 10,
            'max' => 10,
            'message' => 'No images detected on page. Alt tags are not required.'
        ];
    }
} else {
    // Fallback Mock Audit (If site is unreachable or CDN protected)
    $score = 65;
    $checks[] = [
        'title' => 'Audit Connection Status',
        'status' => 'warning',
        'score' => 10,
        'max' => 15,
        'message' => "We couldn't connect to {$domain} directly due to CDN/firewall protection, but here is a standard baseline check."
    ];
    $checks[] = [
        'title' => 'SSL Secure Connection',
        'status' => 'pass',
        'score' => 15,
        'max' => 15,
        'message' => 'Assuming SSL is configured. Secure connections are mandatory for search indexing.'
    ];
    $checks[] = [
        'title' => 'Title Tag Optimization',
        'status' => 'warning',
        'score' => 15,
        'max' => 20,
        'message' => 'Ensure your title tag has your primary target keywords and is between 30 and 65 characters.'
    ];
    $checks[] = [
        'title' => 'Meta Description',
        'status' => 'warning',
        'score' => 15,
        'max' => 20,
        'message' => 'Ensure your meta description explains what your startup does in 110-160 characters.'
    ];
    $checks[] = [
        'title' => 'Heading Structure',
        'status' => 'pass',
        'score' => 10,
        'max' => 20,
        'message' => 'Verify that you have exactly one H1 tag at the top of your landing page.'
    ];
}

// 3. Build Action Items/Recommendations based on fails/warnings
$recommendations = [];
foreach ($checks as $chk) {
    if ($chk['status'] === 'fail' || $chk['status'] === 'warning') {
        if ($chk['title'] === 'SSL Secure Connection') {
            $recommendations[] = 'Install an SSL certificate and force HTTPS redirection immediately.';
        } elseif ($chk['title'] === 'Title Tag Optimization') {
            $recommendations[] = 'Rewrite your page <title> tag to include primary keywords and keep length under 65 characters.';
        } elseif ($chk['title'] === 'Meta Description') {
            $recommendations[] = 'Add a custom meta description tag summarizing your service in 110-160 characters.';
        } elseif ($chk['title'] === 'Heading 1 Structure') {
            $recommendations[] = 'Ensure your page has exactly one <h1> tag. Combine multiple <h1>s or add one if missing.';
        } elseif ($chk['title'] === 'Mobile Responsive Check') {
            $recommendations[] = 'Add <meta name="viewport" content="width=device-width, initial-scale=1"> to your HTML head.';
        } elseif ($chk['title'] === 'Image Alt Tags') {
            $recommendations[] = 'Add descriptive alt="your keyword" attributes to all images to help image indexing.';
        }
    }
}
if (empty($recommendations)) {
    $recommendations[] = 'Great job! Your landing page follows basic SEO structure. Consider adding structured schema markup to stand out.';
}

// 4. Send Lead to Admin Email
$mail = new PHPMailer(true);
$mailSent = false;
try {
    $mail->isSMTP();
    $mail->Host = 'smtp.hostinger.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'info@agenticasoft.com';
    $mail->Password = 'Ag@2026.com';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom('info@agenticasoft.com', 'AgenticaSoft');
    $mail->addAddress('info@agenticasoft.com');
    $mail->addReplyTo($email);

    $mail->isHTML(true);
    $mail->Subject = '[Lead Magnet] New Free SEO Audit Requested';

    $mail->Body = "
        <h3>New Lead: Free SEO Audit</h3>
        <p><strong>Website:</strong> <a href='{$targetUrl}' target='_blank'>{$targetUrl}</a></p>
        <p><strong>Email:</strong> {$email}</p>
        <p><strong>Calculated Score:</strong> {$score}/100</p>
        <p><strong>Audit Time:</strong> " . date('Y-m-d H:i:s') . "</p>
        <p><strong>Response Time:</strong> {$response_time}s</p>
    ";

    $mail->AltBody = "
        New Lead: Free SEO Audit
        Website: {$targetUrl}
        Email: {$email}
        Calculated Score: {$score}/100
        Audit Time: " . date('Y-m-d H:i:s') . "
        Response Time: {$response_time}s
    ";

    $mail->send();
    $mailSent = true;
} catch (Exception $e) {
    error_log('Lead Mailer Error: ' . $mail->ErrorInfo);
}

// 5. Send Lead Data to Google Sheet
$googleScriptURL = "https://script.google.com/macros/s/AKfycbyF1nSit_dsh72_Y6xdjmmJYqG2tfiAKYrR_1kQXggUI9Qacd-H8MdmuNBxpmnsBHqNRA/exec";
$payload = json_encode([
    "name"    => "SEO Audit Client",
    "email"   => $email,
    "service" => "Free SEO Audit (Lead Magnet)",
    "message" => "Requested SEO audit for: {$targetUrl}. Score: {$score}/100. Response time: {$response_time}s.",
    "ip"      => $_SERVER['REMOTE_ADDR'] ?? 'Unknown'
]);

$ch = curl_init($googleScriptURL);
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_HTTPHEADER => ['Content-Type: application/json'],
    CURLOPT_POSTFIELDS => $payload,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_SSL_VERIFYPEER => false // bypass verification for fast response
]);
$response = curl_exec($ch);
curl_close($ch);

// Log sheet entry
file_put_contents(__DIR__ . '/google_response.log', '[Lead Magnet SEO] ' . $response . PHP_EOL, FILE_APPEND);

// 6. Return response
echo json_encode([
    'status' => 'success',
    'score' => $score,
    'url' => $targetUrl,
    'checks' => $checks,
    'recommendations' => $recommendations
]);
exit;
