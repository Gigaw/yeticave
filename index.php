<?php
  require_once 'data.php';
  require_once 'functions.php';
  
  if(isset($_GET['log_out'])){
    $_SESSION = [];
  }

  //HTML главной страницы  
    $page_content = include_template('templates/index.php', compact('lots_list'));

  //Окончательный HTML код 
  $layout_content = include_template('templates/layout.php', compact('page_content', 'title' ,
   'user_name', 'user_avatar' , 'nav_list'));
   print($layout_content);

?>


