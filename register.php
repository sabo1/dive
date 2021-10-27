<?php

session_start();

require "functions.php";

$name = $_SESSION["name"];
$email = $_SESSION["email"];

$user = get_user_by_email($email);

// если эл. адрес занят, то перенаправляем назад

if(!empty($user)){
    set_flash_message("danger", "Этот эл. адрес уже занят другим пользователем.");
    redirect_to("page_register.php");
}