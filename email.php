<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['submit'])) {

    // Retrieve form data
    $name = htmlspecialchars($_POST['name']);
    $phone = htmlspecialchars($_POST['phone']);
    $email = htmlspecialchars($_POST['email']);
    $property_address = htmlspecialchars($_POST['property_address']);

    // Create the email body
    $body_message = "
    <html>
    <body>
        <p>Dear Admin,</p>
        <p>You have received an inquiry from:</p>
        <table width='500' border='1' cellspacing='0'>
            <tr>
                <td style='padding:10px;' width='200'>Name</td>
                <td style='padding:10px;'>$name</td>
            </tr>
            <tr>
                <td style='padding:10px;' width='200'>Phone Number</td>
                <td style='padding:10px;'>$phone</td>
            </tr>
            <tr>
                <td style='padding:10px;' width='200'>Email</td>
                <td style='padding:10px;'>$email</td>
            </tr>
            <tr>
                <td style='padding:10px;' width='200'>Proprty Address</td>
                <td style='padding:10px;'>$property_address</td>
            </tr>
        </table>
    </body>
    </html>";

    // Email headers
    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
    $headers .= 'From: info@ocpropm.com' . "\r\n";
    $headers .= 'Reply-To: info@ocpropm.com' . "\r\n"; // Fixed missing closing quote
    $headers .= 'X-Mailer: PHP/' . phpversion() . "\r\n";
    $headers .= 'CC: mae@gosidekickgo.com ' . "\r\n";  // Add CC recipients here
    $headers .= 'BCC: testing1@sibinfotech.com' . "\r\n";  // Add CC recipients here

    // Recipient's email address
    $to = 'mitch@ocpropm.com';
    $subject = 'New Inquiry from oclasks.com ';

    // Send the email
    if (mail($to, $subject, $body_message, $headers)) {
        // Redirect to thank you page
        echo '<script language="javascript" type="text/javascript">
                window.location = "thanks.html";
              </script>';
    } else {
        // Handle error
        echo '<script language="javascript" type="text/javascript">
                alert("Message failed. Please try again.");
                window.location = "index.html";
              </script>';
    }
}
?>