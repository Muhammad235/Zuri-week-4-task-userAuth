<?php
if(isset($_POST['submit'])){
    $username = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

registerUser($username, $email, $password);

}

function registerUser($username, $email, $password){

    //store data in variables
    $data = [$username, $email, $password];

    // open file to read
    $file = fopen("../storage/users.csv", "r");

    // read csv file
    $readCsv = fgetcsv($file);

    // check if email already exist by comparing stored data with new data array
    if($readCsv[1] == $data[1]){
            echo "<h2>User already exist</h2>";

        }else{

        // if email does not exist before open file and write user data
         $file = fopen("../storage/users.csv", "w");
        //save data into the file
        fputcsv($file, $data);
        fclose($file);
    
        // send a success message 
        $message = "Registration successful login here";
        echo "<script>
        alert('$message');
        window.location.href='../forms/login.html';
        </script>";

    }
}
//echo "HANDLE THIS PAGE";


