<?php
session_start();
include 'dbconn.php';


if(isset($_POST['email']) && isset($_POST['password'])){
    function val($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $email = val($_POST['email']);
    $password = val($_POST['password']);


    if(empty($email)){
        header('location:index.php?error=email is required');
        exit();
    }
    elseif(empty($password)){
        header('location:index.php?error=password is required');
        exit();
    }

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows === 1){
        while($row = $result->fetch_assoc()){
            if(password_verify($password, $row['password'])){
                $_SESSION['fullname'] = $row['fullname'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['id'] = $row['id'];
                header('location:home.php');
                exit();

            }else {
                header('location:index.php?error=Incorrect email or password');
            }
        }
    }
    else {
        header('location:index.php?error=Incorrect email or password');
    }
}