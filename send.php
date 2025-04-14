  <!-- $mail->Username = 'gandhibapu009@gmail.com';
    $mail->Password = 'bskv bfps vtuk zlhz'; // App password
   -->

    <?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Autoload Composer dependencies
require 'vendor/autoload.php';

// Check if the form is submitted using POST method
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo "Method Not Allowed";
    exit;
}

// Collect form data
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$phone = $_POST['phone'] ?? '';
$quantity1 = $_POST['quantity_estimate'] ?? '';
$quantity2 = $_POST['quantity_pieces'] ?? '';
$requirement = $_POST['requirement'] ?? '';
$purpose = $_POST['purpose'] ?? [];
$purposeText = implode(", ", $purpose);

// PHPMailer setup
$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';  // Use Gmail SMTP server
    $mail->SMTPAuth = true;
    $mail->Username = 'gandhibapu009@gmail.com';  // Your email
    $mail->Password = 'bskv bfps vtuk zlhz';  // Your app password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Sender and recipient
    $mail->setFrom('gandhibapu009@gmail.com', 'Website Enquiry');
    $mail->addAddress('adityatodmal47@gmail.com');  // Recipient email

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'New Enquiry from AgroMart Website';
    
    $mail->Body = "
        <html>
        <head>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f4f4f9;
                    margin: 0;
                    padding: 0;
                    color: #333;
                }
                .container {
                    width: 80%;
                    margin: 20px auto;
                    padding: 20px;
                    background-color: #ffffff;
                    border-radius: 8px;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                }
                h3 {
                    color: #0056b3;
                    font-size: 24px;
                    margin-bottom: 15px;
                }
                p {
                    font-size: 16px;
                    line-height: 1.5;
                    margin: 8px 0;
                }
                .strong {
                    font-weight: bold;
                }
                .footer {
                    font-size: 14px;
                    color: #555;
                    margin-top: 20px;
                }
            </style>
        </head>
        <body>
            <div class='container'>
                <h3>New Enquiry Received from Website</h3>
                <p><span class='strong'>Name:</span> $name</p>
                <p><span class='strong'>Email:</span> $email</p>
                <p><span class='strong'>Phone:</span> $phone</p>
                <p><span class='strong'>Quantity Estimate:</span> $quantity1</p>
                <p><span class='strong'>Quantity Pieces:</span> $quantity2</p>
                <p><span class='strong'>Purpose of Requirement:</span> $purposeText</p>
                <p><span class='strong'>Requirement Details:</span> $requirement</p>
                <p class='footer'>This enquiry was submitted through the AgroMart platform. Please review the details and respond to the user accordingly.</p>
            </div>
        </body>
        </html>
    ";
    

        $mail->send();
        echo "successfully";
    } catch (Exception $e) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
    
?>
