<?php
   require_once 'data.php';
   require_once 'functions.php';

   if(isset($_COOKIE['visitlog'])){
    $cookie_list = json_decode($_COOKIE['visitlog']);
   }else{
    $cookie_list = [];
   }
  

   //HTML главной страницы
  $page_content = include_template('templates/history.php', compact( 'lots_list', 'cookie_list'));

  //Окончательный HTML код 

  // $layout_content = input_template('templates/layout.php', ['page_content' => $page_content, 'title' => 'Главная страница ' ,
  // 'is_auth' => $is_auth, 'user_name' => $user_name, 'user_avatar' => $user_avatar, 'nav_list' => $nav_list]);
  $layout_content = include_template('templates/layout.php', compact('page_content', 'title' ,
  'is_auth' , 'user_name', 'user_avatar' , 'nav_list'));
  print($layout_content);
