<?php

$username = $_POST['username'];
$password = $_POST['password'];

$address = $_POST['address'];
$zip_code = $_POST['zip_code'];
$city = $_POST['city'];

$submit_type = $_POST['submit'];

if ($submit_type == 'Sign-up') {
    try {
        $file_db = new PDO('sqlite:CHOKOLAD.sqlite');
        
        $username_query = $file_db->prepare('SELECT username FROM `users` WHERE username = :username');
        $username_query->execute(array(
            'username' => $username
        ));
        
        
        $fetched_data = $username_query->fetch(PDO::FETCH_OBJ);

        $headerErrors;
        
        
        session_start();        
        
            //Username isn't a match
            
        $zip_code_api = 'http://api.zippopotam.us/DK/'.$zip_code ;
        $zip_code_api_data = json_decode(file_get_contents ($zip_code_api), true) ;


        if ($fetched_data->username == $username) {
            //Username is a match
            session_destroy();
            $headerErrors .= 'username_error=Username is already in use.';
        }
        if (!isset($zip_code_api_data)) {
            //non existent zip code
            session_destroy();
            $headerErrors .= '&zip_code_error=Your zip code isn\'t real';
        }


        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        $register_query = $file_db->prepare('INSERT INTO `users` (username, password, address, zip_code, city) VALUES (:username, :password, :address, :zip_code, :city)');
        $register_query->execute(array(
            'username' => $username,
            'password' => $password_hash,

            'address' => $address,
            'zip_code' => $zip_code,
            'city' => $city,
        ));




        header('Location: index.php?'.$headerErrors);

    } catch (PDOException $e) {
        echo $e->getMesseage();
    }
}
?>
