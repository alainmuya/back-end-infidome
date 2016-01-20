<?php

   header("Access-Control-Allow-Origin:http://localhost:3000");	
   header('Content-Type: application/json');
   /* Allowed request method */
   header("Access-Control-Allow-Methods: GET,POST,PUT");
    header("Access-Control-Allow-Credentials: true");
   /* Allowed custom header */
   header("Access-Control-Allow-Headers: Content-Type");	
   /* Age set to 1 day to improve speed caching */
   header("Access-Control-Max-Age: 86400");	    
   /* Options request exits before the page is completely loaded */ 
  

include_once('config.php');
//$email="alainfly@gmail.com";
//$password="dom";
//print_r($_SERVER);
$postdata = file_get_contents("php://input");
@$email = "alainfly3@gmail.com";
@$password  = "dom";
//$postdata->password;
//$postdata->email
$req = $pdo->prepare("SELECT * FROM nurse WHERE email = :email AND password = :password");
$req->bindParam(":email",$email);
$req->bindParam(":password",$password);
$req->execute();
$callback = $req->fetchAll();
echo json_encode($callback);
?>