<?php

    $server ='mysql:host=localhost;dbname=infidome';
    $user='root';
    $pass ='';
  try {
          $pdo = new PDO($server, $user,$pass);
          $pdo->exec("SET NAMES 'utf8';");
            // return $pdo ;     
      } catch (Exception $e) {
               $connected=true;
              }
         return;
?>


