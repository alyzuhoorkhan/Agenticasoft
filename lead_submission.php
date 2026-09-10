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

$email = trim($_POST['email'] ?? '');
$type = trim($_POST['type'] ?? '');
$name = trim($_POST['name'] ?? 'Startup Founder');
$targetUrl = trim($_POST['url'] ?? '');
$notes = trim($_POST['notes'] ?? '');

if (empty($email) || empty($type)) {
    echo json_encode(['status' => 'error', 'message' => 'Email and Request Type are required.']);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid email address.']);
    exit;
}

// Perform validation depending on the lead magnet type
$service_name = '';
$lead_message = '';
$mail_subject = '';

if ($type === 'review') {
    if (empty($targetUrl)) {
        echo json_encode(['status' => 'error', 'message' => 'Website URL is required for a website review.']);
        exit;
    }
    if (!preg_match('/^https?:\/\//i', $targetUrl)) {
        $targetUrl = 'https://' . $targetUrl;
    }
    if (!filter_var($targetUrl, FILTER_VALIDATE_URL)) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid website URL.']);
        exit;
    }
    $service_name = 'Free Website Review (Lead Magnet)';
    $lead_message = "Requested website review for: {$targetUrl}. Notes: {$notes}";
    $mail_subject = '[Lead Magnet] Website Review Request';
} elseif ($type === 'checklist') {
    $service_name = 'Startup Tech Stack Checklist (Lead Magnet)';
    $lead_message = "Requested the Startup Tech Stack Checklist PDF. Name: {$name}";
    $mail_subject = '[Lead Magnet] Tech Stack Checklist Download';
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request type.']);
    exit;
}

// 1. Send Email Notification to Admin
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
    $mail->addReplyTo($email, $name);

    $mail->isHTML(true);
    $mail->Subject = $mail_subject;

    $mailBody = "<h3>New Lead Magnet Capture</h3>";
    $mailBody .= "<p><strong>Type:</strong> " . ($type === 'review' ? 'Website Review Request' : 'Checklist PDF Download') . "</p>";
    $mailBody .= "<p><strong>Email:</strong> {$email}</p>";
    if ($type === 'review') {
        $mailBody .= "<p><strong>URL:</strong> <a href='{$targetUrl}' target='_blank'>{$targetUrl}</a></p>";
        $mailBody .= "<p><strong>Notes:</strong><br>" . nl2br(htmlspecialchars($notes)) . "</p>";
    } else {
        $mailBody .= "<p><strong>Name:</strong> {$name}</p>";
    }
    $mailBody .= "<p><strong>Date:</strong> " . date('Y-m-d H:i:s') . "</p>";

    $mail->Body = $mailBody;
    $mail->AltBody = strip_tags(str_replace(['<p>', '</p>', '<br>'], ["\n", "", "\n"], $mailBody));

    $mail->send();
    $mailSent = true;
} catch (Exception $e) {
    error_log('Lead Submission Mailer Error: ' . $mail->ErrorInfo);
}

// 2. Log Lead to Google Sheets
$googleScriptURL = "https://script.google.com/macros/s/AKfycbyF1nSit_dsh72_Y6xdjmmJYqG2tfiAKYrR_1kQXggUI9Qacd-H8MdmuNBxpmnsBHqNRA/exec";
$payload = json_encode([
    "name"    => $name,
    "email"   => $email,
    "service" => $service_name,
    "message" => $lead_message,
    "ip"      => $_SERVER['REMOTE_ADDR'] ?? 'Unknown'
]);

$ch = curl_init($googleScriptURL);
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_HTTPHEADER => ['Content-Type: application/json'],
    CURLOPT_POSTFIELDS => $payload,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_SSL_VERIFYPEER => false // bypass verification for speed
]);
$response = curl_exec($ch);
curl_close($ch);

// Log response
file_put_contents(__DIR__ . '/google_response.log', '[Lead Magnet ' . strtoupper($type) . '] ' . $response . PHP_EOL, FILE_APPEND);

// 3. Return JSON response
$res = [
    'status' => 'success',
    'message' => ($type === 'review') ? 'Your request has been queued! We will review your site and email you within 24 hours.' : 'Checklist requested successfully!'
];

if ($type === 'checklist') {
    $res['download_url'] = 'uploads/startup-tech-stack-checklist.pdf';
}

echo json_encode($res);
exit;
