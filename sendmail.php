<?php
//send mail

$receiver = $_POST['receiver'];
$subject = $_POST['subject'];
$message = $_POST['message'];
$header = "From: " . $_POST['sender'];

if (mail($receiver, $subject, $message, $header)) {
    echo "Mail sent to " . $receiver;
} else {
    echo "Mail not sent";
}

?>