<?php
// ===============================
// DEBUG & SECURITY (Turn off display_errors in production)
// ===============================
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/php_error.log');
header('Content-Type: application/json');

// Log POST data for debugging
file_put_contents(__DIR__ . '/post_test.log', json_encode($_POST) . PHP_EOL, FILE_APPEND);

// ===============================
// PHPMailer
// ===============================
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/PHPMailer/src/Exception.php';
require __DIR__ . '/PHPMailer/src/PHPMailer.php';
require __DIR__ . '/PHPMailer/src/SMTP.php';

// ===============================
// INPUT SANITIZATION
// ===============================
$fields = ['name', 'email', 'message']; // Required fields
$missing = [];

foreach ($fields as $field) {
    if (empty($_POST[$field])) {
        $missing[] = $field;
    } else {
        $$field = trim($_POST[$field]); // e.g. $name, $email, $message
    }
}

// Optional field
$service = trim($_POST['service'] ?? 'Not specified');

// If any required fields are missing, show exactly which ones
if (!empty($missing)) {
    echo json_encode(['status' => 'error', 'message' => 'Missing required fields: ' . implode(', ', $missing)]);
    exit;
}

// Validate email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid email address']);
    exit;
}

// ===============================
// MAIL SETUP
// ===============================
$mail = new PHPMailer(true);

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
    $mail->Subject = 'New Contact Form Submission';

    $mail->Body = "
        <h3>New Contact Submission</h3>
        <p><strong>Name:</strong> {$name}</p>
        <p><strong>Email:</strong> {$email}</p>
        <p><strong>Service:</strong> {$service}</p>
        <p><strong>Message:</strong><br>" . nl2br(htmlspecialchars($message)) . "</p>
    ";

    $mail->AltBody = "
        Name: {$name}
        Email: {$email}
        Service: {$service}
        Message: {$message}
    ";

    $mail->send();
    $mail->send();

// ===============================
// SEND DATA TO GOOGLE SHEET (FIRST)
// ===============================
$googleScriptURL = "https://script.google.com/macros/s/AKfycbyF1nSit_dsh72_Y6xdjmmJYqG2tfiAKYrR_1kQXggUI9Qacd-H8MdmuNBxpmnsBHqNRA/exec";

$payload = json_encode([
    "name"    => $name,
    "email"   => $email,
    "service" => $service,
    "message" => $message,
    "ip"      => $_SERVER['REMOTE_ADDR'] ?? 'Unknown'
]);

$ch = curl_init($googleScriptURL);
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_HTTPHEADER => ['Content-Type: application/json'],
    CURLOPT_POSTFIELDS => $payload,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_SSL_VERIFYPEER => true
]);

$response = curl_exec($ch);
$curlError = curl_error($ch);
curl_close($ch);

// Log Google response
file_put_contents(__DIR__ . '/google_response.log', $response . PHP_EOL, FILE_APPEND);

// ===============================
// FINAL RESPONSE TO FRONTEND
// ===============================
echo json_encode([
    'status' => 'success',
    'message' => 'Message sent and stored successfully'
]);
exit;

  

} 
catch (Exception $e) {
    // Log PHPMailer errors
    error_log('Mailer Error: ' . $mail->ErrorInfo);
    echo json_encode(['status' => 'error', 'message' => 'Mailer Error: ' . $mail->ErrorInfo]);
    exit;
} catch (Throwable $t) {
    error_log('Fatal Error: ' . $t->getMessage());
    echo json_encode(['status' => 'error', 'message' => 'Fatal Error: ' . $t->getMessage()]);
    exit;
}

?>