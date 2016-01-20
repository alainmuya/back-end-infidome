<?php

   header("Access-Control-Allow-Origin:http://localhost:3000");  
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
    //echo $request;
    $email   = $request->email;
    $lastname = $request->lastname;
    $tel      = $request->tel;
    $name     = $request->name;
    
    $numeroIdentification = 0001000000;

     // checking for blank values.  
    if (empty($name))
      $errors['name'] = 'Name is required.';

    if (empty($lastname))
      $errors['username'] = 'Username is required.';

    if (empty($email))
      $errors['email'] = 'Email is required.';

    if (!empty($errors)) {
      $data['errors']  = $errors;
    } else {
      $data['message'] = 'Form data is going well';
    }
    $sth = $pdo->prepare("INSERT INTO nurse (id, Nom, Prenom,Email,Adresse, Telephone, numeroIdentification,password) VALUES (NULL,:name, :lastname, :email,:tel,:numeroIdentification )");
    $sth->bindParam(":email",$email);
    $sth->bindParam(":lastname",$lastname);
    $sth->bindParam(":tel",$tel);
    $sth->bindParam(":name",$name); 
    $sth->bindParam(":numeroIdentification",$numeroIdentification);
    $sth->execute();
    //$yellow = $sth->fetchAll(PDO::FETCH_OBJ);
  echo json_encode($request);

?>