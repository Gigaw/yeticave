<?php
  
   require_once 'data.php';
   require_once 'functions.php';

   

if (isset($_GET['lot_id'])) { //Обработка GET запроса

	$lot_id = $_GET['lot_id'];

	foreach ($lots_list as $key => $item) {
		if ($item['lot_id'] == $lot_id) {
			$lot = $item;
			break;
		}
	}

	//Создание куки
	$history_name = "visitlog";
	$history_value = [$lot_id];
 	$expire = strtotime("+2 days");
 	$path = "/";

	if (isset($_COOKIE['visitlog'])) { //  Обработка куки
		$history_value =json_decode($_COOKIE["visitlog"]) ;
		$history_value[] =  $lot_id ;
	}
	$json = json_encode($history_value);
	setcookie($history_name, $json, $expire, $path);
}



if (!$lot) {
	http_response_code(404);
}
//echo $_GET['num'];

//HTML главной страницы
$page_content = include_template('templates/lot.php', compact( 'lot'));

//Окончательный HTML код 

// $layout_content = input_template('templates/layout.php', ['page_content' => $page_content, 'title' => 'Главная страница ' ,
// 'is_auth' => $is_auth, 'user_name' => $user_name, 'user_avatar' => $user_avatar, 'nav_list' => $nav_list]);
$layout_content = include_template('templates/layout.php', compact('page_content', 'title' ,
'user_name', 'user_avatar' , 'nav_list'  ));
 print($layout_content);


?>
