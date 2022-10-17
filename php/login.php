<?php

session_start();

if(isset($_POST['submit'])){
    // $username = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];


loginUser($email, $password);

}

function loginUser($email, $password){
    /*
        Finish this function to check if username and password 
    from file match that which is passed from the form
    */

        $file = fopen("../storage/users.csv", "r");

        // read csv file
        $readCsv = fgetcsv($file);

        // check if email already exist by comparing stored data with new data array
        if($readCsv[1] == $email && $readCsv[2] == $password){
        echo "login successful";

        // if it is true set username
        $_SESSION['username'] = $readCsv[0];

        header('location: ../dashboard.php');

        }else{

           // send a failure message 

            $message = "Invalid data try again";
            echo "<script>
            alert('$message');
            window.location.href='../forms/login.html';
            </script>";
       
        }
    
}

// echo "HANDLE THIS PAGE";
//echo "Not success";

