<?php

$email = "sapura@assmail.com";
$password = "woman";

// 1. добавление пользователя в БД
// для этого нужно соедениться с БД
$pdo = new PDO("mysql:host=localhost;dbname=rahimcourseseptember", "root", "");

// следуюшее подготовить сам запрос :email - это метки
$sql = "INSERT INTO first_project (email, password) VALUES (:email, :password)";

// подготавлеваем запрос
$statement = $pdo->prepare($sql);
// выполнениям запрос
$statement->execute([
    "email" => $email,
    "password" => $password
]);
