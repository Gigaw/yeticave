<?php

  require_once 'data.php';
  require_once 'user-data.php';
  require_once 'functions.php';

  

  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $form = $_POST;

    $errors = [];
    $required = ['email', 'password'];

    foreach($required as $field){ //Проверка на заполненность формы
      if(empty($form[$field])){
        $errors[$field] = 'Это поле надо заполнить';
      }
    }

    if(!count($errors) and $user = searchUserByEmail($form['email'], $users) ){ //Проверка формы на пароль и логин
      if(password_verify($form['password'], $user['password'])){
        $_SESSION['user'] = $user;
      }else{
        $errors['password'] = 'Неверный пароль';
      }
    }else{
      $errors['email'] = 'Такой пользователь не найден';
    }

    if(count($errors)){
      $page_content = include_template('templates/login.php', compact('form', 'errors'));
      
    }else{
      header("Location: /index.php");
      
    }
    
  }else { // если пользователь не отправлял форму 
    $form = ['email' => '', 'password' => ''];
    $errors = [];
          $page_content = include_template('templates/login.php', compact('form', 'errors'));
  }




  $layout_content = include_template('templates/layout.php', compact('page_content', 'title' ,
   'user_name', 'user_avatar' , 'nav_list'  ));
  
  print($layout_content);
