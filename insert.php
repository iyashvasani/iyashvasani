<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- PORTFOLIO LOGO -->
  <link rel="icon" href="files/img/YV.png" type="image/png" sizes="32x32">

  <!-- CSS -->
  <link rel="stylesheet" href="files/css/styles.css">

  <title>Portfolio</title>
</head>

<body>

</body>

</html>
<?php

if(isset($name) || isset($email) || isset($mobile) || isset($message)) {

  $name = $_POST['name'];
  $email = $_POST['email'];
  $mobile = $_POST['mobile'];
  $message = $_POST['message'];
}

//CLIENT SIDE
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "portfolio";

//SERVER SIDE
$servername = "sql308.unaux.com";
$username = "unaux_28971751";
$password = "z2kqlnq3u5u3c9";
$dbname = "unaux_28971751_portfolio";

// Create connection

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection

if ($conn->connect_error) {
  die("Connection Failed: " . $conn->connect_error);
} else {
  $stmt = $conn->prepare("INSERT INTO data (name, email, mobile, message) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("ssss", $name, $email, $mobile, $message);
  $stmt->execute();
?>

  <div class="insert__container">
    <div class="insert">
      <h1 style="color: var(--first-color);">Your data has been inserted Successfully</h1>
      <br>
      <a href="/index.html" class="insert__button">
        <button type="button" class="button button--flex button__icon">Back to Home</button>
      </a>
    </div>
  </div>

<?php
  $stmt->close();
  $conn->close();
}
?>