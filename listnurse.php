<?php

   header("Access-Control-Allow-Origin:http://localhost:1337");  
   /* Allowed request method */
   header("Access-Control-Allow-Methods: GET,POST,PUT");
   /* Allowed custom header */
   header("Access-Control-Allow-Headers: Content-Type");  
   /* Age set to 1 day to improve speed caching */
   header("Access-Control-Max-Age: 86400");     
   /* Options request exits before the page is completely loaded */ 
   if (strtolower($_SERVER['REQUEST_METHOD']) == 'options') 
   {
      exit();
   }

include_once('config.php');
    
    $postdata = file_get_contents("php://input"); 
    $request = json_decode($postdata);
    $sth = $pdo->prepare("SELECT * FROM nurse"); 
    $sth->execute();
    $yellow = $sth->fetchAll(PDO::FETCH_OBJ);
  echo json_encode($yellow);

?>