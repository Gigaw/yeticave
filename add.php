<?php 
  require_once 'data.php';
  require_once 'functions.php';

  
  if (!isset($_SESSION['user'])) {
    
}else{

//Обработка Формы
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $lot = $_POST;

    $required = ['lot-name', 'message', 'category', 'lot-rate', 'lot-step', 'lot-date'];
    $dict = ['lot-name' => 'Название', 'message' => 'Описание', 'category' => 'Категория',
     'lot-rate' => 'Начальная цена', 'lot_step' => 'Шаг ставки'  , 'lot-img' => 'Изображение лота'];
    $errors = []; //Массив ошибок

    foreach ($required as $key) { //Проверка заполненности формы
        trim($_POST[$key]);
        if (empty($_POST[$key])) {
            $errors[$key] = 'Это поле надо заполнить';
        }
    }

    if(!is_numeric($lot['lot-step'])){ //Проверка шага лота на валидность 

            $errors['lot-step'] = 'Значение  должно быть числом';

    }elseif($lot['lot-step']  <= 0){
        $errors['lot-step'] = 'Значение  должно больше 0';
    }

    if(!is_numeric($lot['lot-rate'])){ //Проверка начальной цены лота на валидность
            $errors['lot-rate'] = 'Значение поле должно быть числом';
    
    }elseif($lot['lot-rate']  <= 0){
        $errors['lot-rate'] = 'Значение  должно больше 0';
    }
   
    //Обработка файла
    if (isset($_FILES['lot_img']['name'])) {
        $tmp_name = $_FILES['lot_img']['tmp_name'];
        $path = $_FILES['lot_img']['name'];

        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $file_type = finfo_file($finfo, $tmp_name);
        if ($file_type !== "image/jpeg") {
            $errors['lot-img'] = 'Загрузите картинку в формате jpg';
        }
        else {
            move_uploaded_file($tmp_name, "img/" . $path);
            $lot['lot-img'] = "img/$path";
        }
    }
    else {
        $errors['lot-img'] = 'Вы не загрузили файл';
    }

        if (count($errors)) {
            $page_content = include_template('templates/add.php', ['lot' => $lot, 'errors' => $errors, 'dict' => $dict]);
        }
        else {
            $page_content = include_template('templates/lot.php', ['lot' => $lot]);
        }
       } 
else {
    $page_content = include_template('templates/add.php');    
}

$layout_content = include_template('templates/layout.php', compact('page_content', 'title' ,
     'user_name', 'user_avatar' , 'nav_list'  ) );


print($layout_content);
}