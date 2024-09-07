<?php
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $conn = new mysqli('localhost','root' ,'','contact');
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into enquire(name,email,message)values(?,?,?)");
        $stmt->bind_param("sss",$name, $email, $message);
        $stmt->execute();
        echo "Message Sent Succesfully....";
        $stmt->close();
        $conn->close();
    }
?>
