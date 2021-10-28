<?php

function get_user_by_email( $email ) {

    $name = $_SESSION["name"];
    $email = $_SESSION["email"];

    $pdo = new PDO("mysql:host=localhost;dbname=rahimcourseseptember", "root", "");

    $sql = "SELECT * FROM first_project WHERE email=:email";
    
    $statement = $pdo->prepare($sql);
    $statement->execute(["email" => $email]);
    $users = $statement->fetch(PDO::FETCH_ASSOC);

    return $user;
    
};

function add_user($email, $password) {
    
    $pdo = new PDO("mysql:host=localhost;dbname=rahimcourseseptember", "root", "");

    $sql = "INSERT INTO first_project (email, password) VALUES (:email, :password)";
    // подготавлеваем запрос
    $statement = $pdo->prepare($sql);
    // выполнениям запрос
    $statement->execute([
    "email" => $email,    
    "password" => password_hash($password, PASSWORD_DEFAULT)
    ]);

};

function set_flash_message($name, $message) {
    
    $_SESSION[$name] = $message;   
    
};

function display_flash_message($name) {
    if(isset($_SESSION["$name"]))
    echo "<div class=\"alert alert-{$name} text-dark\" role=\"alert\">{$_SESSION[$name]}<div>" ;
    unset($_SESSION["$name"]);
};

function redirect_to($path) {
    header("Location: {$path}");
    exit;
};