<?php

// внизу даны функций, которые будут использоываны

/**
    parameters:
                string - $email

    description: поиск пользователя по электронному адресу

    return value: array
**/
function get_user_by_email( $email ) {};

/**
    parameters:
                string - $email
                string - $password

    description: добавить пользователя в БД 

    return value: int (user_id)
**/
function add_user($email, $password) {};

/**
    parameters:
                string - $name (ключ)
                string - $message (значение, текст сообщения)

    description: подготовить флеш сообщение

    return value: null
**/
function set_flash_message($name, $message) {};

/**
    parameters:
                string - $name (ключ)

    description: вывести флеш сообщение

    return value: null
**/
function display_flash_message($name) {};

/**
    parameters:
                string - $path

    description: перенаправить на другую страницу

    return value: null
**/
function redirect_to($path) {};