<?php

$email = "sapura@assmail.com";
$password = "woman";

// 1. добавление пользователя в БД
// для этого нужно соедениться с БД
$pdo = new PDO("mysql:host=localhost;dbname=rahimcourseseptember", "root", "");

// внизу проверяет на наличие пользователя в БД, если найдеться такой чувак, то код начиная с $sql = "INSERT INTO до PASSWORD_DEFAULT); ]); не выполнять! 

$sql = "SELECT * FROM first_project WHERE email=:email";

$statement = $pdo->prepare($sql);
$statement->execute(["email" => $email]);
// возвращает пользователя
$users = $statement->fetch(PDO::FETCH_ASSOC);
// внизу проверка
/* echo '<pre>';
    print_r($users);
echo '</pre>'; */

// теперь скрипт на проверку польвателя
if(!empty($users)){
    echo "Эл. адрес уже занят";
}
    echo "Можно зарегестриватр";


// следуюшее подготовить сам запрос :email - это метки
$sql = "INSERT INTO first_project (email, password) VALUES (:email, :password)";

// подготавлеваем запрос
$statement = $pdo->prepare($sql);
// выполнениям запрос
$statement->execute([
    "email" => $email,
    // 1. здесь пароль видно в базе
    // "password" => $password
    // 2. здесь пароль закрыть в базе, даже администратор не видет
    "password" => password_hash($password, PASSWORD_DEFAULT)
]);
