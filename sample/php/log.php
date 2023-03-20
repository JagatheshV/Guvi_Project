<?php
$dbHost = 'localhost';
$dbName = 'user';
$dbUser = 'root';
$dbPass = '';

$email    = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$pass = filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_STRING);

try {
  $db = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $stmt = $db->prepare("SELECT email,pass FROM register WHERE email=:email AND pass=:pass");
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':pass', $pass);
  $stmt->execute();
  
  $user = $stmt->fetch(PDO::FETCH_ASSOC);
  //echo '<script> sessionStorage.setItem("email", "' . $email .'");</script>';
  if($user) {
    echo json_encode(array('success' => true,'email'=>$email));
  } else {
    echo json_encode(array('success' => false, 'error' => 'Invalid email or password'));
  }
} catch(PDOException $e) {
  echo json_encode(array('success' => false, 'error' => $e->getMessage()));
}
?>