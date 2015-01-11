<?php
include_once 'base/const.php';
include_once 'base/classSession.php';
//include_once 'base/ClassCookie.php';
//
//
//  $co = new ClassCookie("sec");
//  
//  $co->CloseSession();
$co = new oSession();
$co->CloseSession();
//header('Location: index.php');
//exit();
