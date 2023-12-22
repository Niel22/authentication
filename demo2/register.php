<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'testdb';

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
    die('Connection error' . $conn->connect_error);
}

if(!isset($_POST['username'], $_POST['password'], $_POST['email'], $_POST['fullname'])){
    exit('Empty Field(s)');
}

if(empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email']) || empty($_POST['fullname'])){
    exit('Values Empty');
}

if($stmt = $conn->prepare('SELECT id, username FROM users WHERE email = ?')){
    $stmt->bind_param('s', $_POST['email']);
    $stmt->execute();
    $stmt->store_result();

    if($stmt->num_rows > 0){
        echo "This email has been used by another user";
    }
    else {
        if($stmt = $conn->prepare('INSERT INTO users(fullname, username, email, password) VALUES (?, ?, ?, ?)')){
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $stmt->bind_param('ssss',$_POST['fullname'], $_POST['username'], $_POST['email'], $password);
            $stmt->execute();
            header('location:index.php?error=Successfully Registered, you can now log in');
        }else {
            echo "Error Occured";
        }
    }
    $stmt->close();
}
else {
    echo "Error Occured";
}
$conn->close(); 
?>