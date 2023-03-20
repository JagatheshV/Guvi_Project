<?php
// Database connection code
// ...
$dbHost = 'localhost';
$dbName = 'user';
$dbUser = 'root';
$dbPass = '';

try {
  $con = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
  $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
$email= $_POST['email'];
 // $email    = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
  $stmt = $con->prepare("SELECT * FROM register where email=:email");
$stmt->bindParam(':email', $email);
 
  $stmt->execute();

  
  // Fetch all the results as an array
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  
  if (count($result) > 0) {
    // Start building the HTML table
    $result=$result[0];
    echo json_encode(array('success' => true,'name'=>$result["name"],'email'=>$result["email"],'age'=>$result["age"],'dob'=>$result["dob"],'num'=>$result["num"]));
 // echo json_encode(array('success' => true,'name'=>$email,'age'=>$age,'email'=>$email,'dob'=>$dob,'num'=>$num);
  }
  else{
    return array('success' =>  false, 'error' => 'Unkown error');
  }
  


} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
  exit;
}



// Close the prepared statement and the database connection
// $stmt->close();
 //$con->close();
?>
