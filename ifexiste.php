<?php

   header("Access-Control-Allow-Origin:*");  
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
    @$email= $request->email;
    $sth = $pdo->prepare("SELECT * FROM nurse WHERE email = :email"); 
    $sth->bindParam(":email",$email);
    $sth->execute();    
    //$yellow = $sth->fetchAll(PDO::FETCH_OBJ);
    $count = $sth->rowCount();
    if ($count > 0 ) {
      $exist = 'found';
      echo json_encode($exist);
    }else {
              $exist = 'notfound';
      echo json_encode($exist);   
    }


   
?>