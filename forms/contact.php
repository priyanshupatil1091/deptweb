<?php
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

echo $name;
// database connection

$conn = new mysqli('localhost', 'root', '', 'contact');
if ($conn->connect_error) {
    die('connection failed : ' . $conn->connect_error);
} else
    $stmt = $conn->prepare("insert into `contact info`(name,email,subject,message)
    values(?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $email, $subject, $message);
$stmt->execute();
echo "form submitted";
$stmt->close();
$conn->close();

?>
