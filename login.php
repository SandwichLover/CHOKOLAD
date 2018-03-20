<?php

$username = $_POST['username'];
$password = $_POST['password'];
$submit_type = $_POST['submit'];

if ($submit_type == 'Log-in') {
    try {
        $file_db = new PDO('sqlite:CHOKOLAD.sqlite');
        
        $password_query = $file_db->prepare('SELECT user_ID, password FROM `users` WHERE username = :username');
        $password_query->execute(array(
            'username' => $username
        ));
        
        while($fetched_data = $password_query->fetch(PDO::FETCH_OBJ)) {
            if (password_verify($password, $fetched_data->password)) {
                $user_ID = $fetched_data->user_ID;
                session_start();
                $_SESSION['user_ID'] = $user_ID;
                break;
            }
        }
        if (isset($user_ID) == false) {
            session_destroy();
            header('Location: login.html'); // Redirecting To Home Page
        } else {
            header('Location: index.php'); // Redirecting To Home Page
        }
    } catch (PDOException $e) {
        echo $e->getMesseage();
    }
}
?>
