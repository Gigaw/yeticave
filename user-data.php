<?php 

$igor_pass = password_hash('gigaw123', PASSWORD_DEFAULT);
$eva_pass = password_hash('eva145', PASSWORD_DEFAULT);
$olga_pass = password_hash('ola567', PASSWORD_DEFAULT );
$users = ['gigolaevigor@mail.ru' => $igor_pass, 'evagigolaeva@gmail.com' => $eva_pass, 'olyakol@yandex.ru' => $olga_pass ];


