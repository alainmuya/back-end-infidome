<?php

   header("Access-Control-Allow-Origin:http://localhost:3000");	   
 //  header("Content-Type: application/json");
   /* Allowed request method */
   header("Access-Control-Allow-Credentials: true");
   header("Access-Control-Allow-Methods: GET,POST,PUT");
   /* Allowed custom header */
   header("Access-Control-Allow-Headers:origin, Content-Type, accept");	
   /* Age set to 1 day to improve speed caching */
   header("Access-Control-Max-Age: 86400");	    
   /* Options request exits before the page is completely loaded */   



include_once("config.php");
//$email="alainfly@gmail.com";
//$password="dom";
//print_r($_SERVER);
//$postdata = json_decode(file_get_contents("php://input"));
//$email = "alainfly3@gmail.com";
//$password  = "dom";

if ($connected){
$req = $pdo->prepare("SELECT * FROM nurse");
//$req->bindParam(":email",$email);
//$req->bindParam(":password",$password);
$req->execute();
$callback = $req->fetchAll();
//print_r(htmlentities($callback));
echo json_encode($callback);
}else {

	echo json_encode("Impossible de se connecter à l base de donnée");
}
?>