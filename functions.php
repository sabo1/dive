<?php

function get_user_by_email( $email ) {

    $name = $_SESSION["name"];
    $email = $_SESSION["$email"];

    $pdo = new PDO("mysql:host=localhost;dbname=rahimcourseseptember", "root", "");

    $sql = "SELECT * FROM first_project WHERE email=:email";
    
    $statement = $pdo->prepare($sql);
    $statement->execute(["email" => $email]);
    $users = $statement->fetch(PDO::FETCH_ASSOC);
    
};

function add_user($email, $password) {};

function set_flash_message($name, $message) {};

function display_flash_message($name) {};

function redirect_to($path) {};