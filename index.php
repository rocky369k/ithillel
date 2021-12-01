<?php

$roles = [
  'Admin',
  'Editor',
];
$includes = [
  'Admin' => [
             'articles',
             'comments',
             'stats',
  ],
  'Editor' => [
              'comments',
              'stats'
  ],
];
if($_GET['Admin']) {
      echo $_GET['articles','comments','stats'];
    }
    elseif($_GET['Editor'){
    echo $_GET['comments','stats'];
    }
      else{
        echo "{Код HTTP Ответа} Неизвестный уровень доступа. Доступ запрещен»"
    }
      exit();
   }
