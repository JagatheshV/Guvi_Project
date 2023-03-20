<?php
$dbHost = 'localhost';
$dbName = 'user';
$dbUser = 'root';
$dbPass = '';

$name  = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$age   = filter_input(INPUT_POST, 'age', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$pass = filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_STRING);
$dob= filter_input(INPUT_POST, 'dob', FILTER_SANITIZE_STRING);
$num = filter_input(INPUT_POST, 'num', FILTER_SANITIZE_STRING);
try {
  $con = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
  $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $prp = $con->prepare("INSERT INTO register (name, age, email,pass,dob,num) VALUES (:name, :age, :email,:pass,:dob,:num)");
  $prp->bindParam(':name', $name);
  $prp->bindParam(':age', $age);
  $prp->bindParam(':email', $email);
  $prp->bindParam(':pass', $pass);
  $prp->bindParam(':dob', $dob);
  $prp->bindParam(':num', $num);
  $prp->execute();

  echo json_encode(array('success' => true));
  //echo json_encode(array('success' => true,'name'=>$name,'email'=>$email,'age'=>$age,'dob'=>$dob,'num'=>$num));
  
} catch(PDOException $e) {
  echo json_encode(array('success' => false, 'error' => $e->getMessage()));
}
?>




