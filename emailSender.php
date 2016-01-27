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
    //echo $request;
ini_set();
   //$email   = trim($request->email);    
     $to     =  "alainfly3@gmail.com";
     $subject = 'Confirmation du compte infidome';
     $message = '<html>
                    <head>
                     <title>Calendrier des anniversaires pour Août</title>
                    </head>
                    <body>
                     <p>Voici les anniversaires à venir au mois d\'Août !</p>
                     <table>
                      <tr>
                       <th>Personne</th><th>Jour</th><th>Mois</th><th>Année</th>
                      </tr>
                      <tr>
                       <td>Josiane</td><td>3</td><td>Août</td><td>1970</td>
                      </tr>
                      <tr>
                       <td>Emma</td><td>26</td><td>Août</td><td>1973</td>
                      </tr>
                     </table>
                    </body>
                </html>';
     $headers = 'From: service@infidome.com' . "\r\n" .
     'Reply-To: alainfly3@gmail.com' . "\r\n" .
     'X-Mailer: PHP/' . phpversion();

     mail($to, $subject, $message, $headers);

     echo json_encode("ok");

?>