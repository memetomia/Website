<?php

include_once 'base/const.php';
include_once 'base/ClassCookie.php';


  $co = new ClassCookie("sec");
  
  $co->CloseSession();
  
  header('Location: index.php');
?>