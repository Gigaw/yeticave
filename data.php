
<?php 
session_start();
$user_name = 'Константин';
$user_avatar = 'img/user.jpg';

$nav_list = ["Доски и лыжи", "Крепления", "Ботинки", "Одежда", "Инструменты", "Разное"];

$title = "Yeticave";

$lots_list = [
  0 => [
        'lot-name' => '2014 Rossignol District Snowboard',
        'category' => 'Доски и лыжи',
        'lot-rate' => '10999',
        'lot-img' => 'img/lot-1.jpg',
        'lot_id' => '0' 

  ],
  1 => [
    'lot-name' => 'DC Ply Mens 2016/2017 Snowboard',
    'category' => 'Доски и лыжи',
    'lot-rate' => '159999',
    'lot-img' => 'img/lot-2.jpg',
    'lot_id' => '1'  

  ],
  2 => [
    'lot-name' => 'Крепления Union Contact Pro 2015 года размер L/XL',
    'category' => 'Крепления',
    'lot-rate' => '8000',
    'lot-img' => 'img/lot-3.jpg',
    'lot_id' => '2'  

  ],
  3 => [
    'lot-name' => 'Ботинки для сноуборда DC Mutiny Charocal',
    'category' => 'Ботинки',
    'lot-rate' => '10999',
    'lot-img' => 'img/lot-4.jpg',
    'lot_id' => '3'  

  ],
  4 => [
    'lot-name' => 'Куртка для сноуборда DC Mutiny Charocal',
    'category' => 'Одежда',
    'lot-rate' => '7500',
    'lot-img' => 'img/lot-5.jpg',
    'lot_id' => '4'  

  ],
  5 => [
    'lot-name' => 'Маска Oakley Canopy',
    'category' => 'Разное',
    'lot-rate' => '5400',
    'lot-img' => 'img/lot-6.jpg',
    'lot_id' => '5' 
    ]      
  

  ]; ?>