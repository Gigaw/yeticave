<?php 
    //Функция шаблонизатор
    
    // function include_template($path, array $data = []){
    //     ob_start();
    //     $template = "";

    //     if (is_readable($path) == true){
    //         require $path;
    //         extract($data);
    //         $template = ob_get_clean();
    //         return $template;
    //     } else {
    //         return $template;
    //     }

    // }

    //ini_set('memory_limit', '96MB');
    //Функция шаблонизатор 
    function include_template($name, array $data = []) {
        
        $result = '';
    
        if (!is_readable($name)) {
            return $result;
        }
    
        ob_start();
        extract($data);
        require $name;
    
        $result = ob_get_clean();
    
        return $result;
    }
    //Обработака цены (разделение тысяч)
    function new_price($price){
        $ceiled_price = ceil($price);
        $updated_price =  number_format($ceiled_price,  $decimals = 0 , $dec_point = "." , $thousands_sep = " ");
        
        return $updated_price . "₽" ;
      }
    //Сколько времени до конца заказа,
    // для простоты решим, что время заказа истекает в полночь
    function lots_time_set(){
        date_default_timezone_set("Europe/Moscow");
        $ts = time();
        $ts_midnight = strtotime('tomorrow');
        $secs_to_midnight = $ts_midnight - $ts;
        
        $hours = floor($secs_to_midnight/3600);
        
        $minutes = floor(($secs_to_midnight%3600)/60);
        
        return "$hours:$minutes";
    }

    function searchUserByEmail($email, $users_arr) { // Функция проверки логина пользователя
        if(isset($users_arr[$email])){
          return ['email' => $email, 'password' => $users_arr[$email]];
        }else{
          return false;
        }  
    }
    

    
?>