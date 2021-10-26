<?php

session_start();

$email = "Dana@assmail.com";
$password = "woman";

// 1. добавление пользователя в БД
// для этого нужно соедениться с БД
$pdo = new PDO("mysql:host=localhost;dbname=rahimcourseseptember", "root", "");

// внизу проверяет на наличие пользователя в БД, если найдеться такой чувак, то код начиная с $sql = "INSERT INTO до PASSWORD_DEFAULT); ]); не выполнять! 

$sql = "SELECT * FROM first_project WHERE email=:email";

$statement = $pdo->prepare($sql);
$statement->execute(["email" => $email]);
// возвращает пользователя, fetch - 1, fetchAll - выводить всех пользователей
$users = $statement->fetch(PDO::FETCH_ASSOC);
// внизу проверка
/* echo '<pre>';
    print_r($users);
echo '</pre>'; */

// теперь скрипт на проверку пользователя
// внизу пример 
// if(!empty($users)){
//     echo "Эл. адрес уже занят!";
// }else {
//     echo "Можно зарегестрироваться";
// }
// die;
// теперь основной код 
if(!empty($users)){ // if(!empty = если не пустo
    $_SESSION["danger"]='Этот эл. адрес уже занят другим пользователем.';
    // перенаправляет header на страницу ...
    header("Location: ./page_register.php");
    exit;
}/* else {
    echo "Можно зарегестрироваться";
}
die; */

// следуюшее подготовить сам запрос, :email - это метки,подробности в ПДО 
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
    
$_SESSION["success"] = "Регистрация успешна";
header("Location: ./page_login.php");
exit;
