<?php
    if(!empty($_POST["loginEmail"]) && !empty($_POST["pwdLogin"])){
        $email = $_POST["loginEmail"];
        $pwd = $_POST["pwdLogin"];
                    $userName = "root";
                    $localHost = "localhost:3306";
                    $password = "";
                    $database = "lab4";

         $connection = new mysqli($localHost, $userName, $password, $database);

         if($connection -> connect_errno){
         echo("<script>console.log('PHP: ".$connection."');</script>");
         }
         $queryUser = "SELECT COUNT(*) FROM user WHERE email = '$email'";
                     $checkUser = mysqli_query($connection, $queryUser);
                     $dataCheck = mysqli_fetch_array($checkUser, MYSQLI_NUM);
                     if($dataCheck[0] > 1)
                     {
                         echo('<script type="text/javascript">
                                document.getElementById("pwdErrorLogin").innerHTML = "user already exist";
                                </script>');
                     }
                     else{
                              $queryUserAndPassword = "SELECT * FROM user WHERE email = '$email' AND pwd = '$pwd'";
                              $checkUser = mysqli_query($connection, $queryUser);
                     }
    }
?>