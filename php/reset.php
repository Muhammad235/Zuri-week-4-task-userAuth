<?php
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    resetPassword($email, $password);
}

function resetPassword($email, $password){
 
    $file = fopen("../storage/users.csv", "r");

    while(!feof($file)){
    $readCsv = fgetcsv($file);

   //open file and check if the email is the same as the given one
        if ($readCsv[1] == $email ) {

          //if it does, replace the password to the new password
            $readCsv[2] = $password; 

            $file = fopen("../storage/users.csv", "w");

            fputcsv($file, $readCsv);

            echo "password replaced success";

            fclose($file);
            exit;
        }else{
            echo "password not replaced";
        }
    }






}
//echo "HANDLE THIS PAGE";




