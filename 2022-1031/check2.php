<?php
session_start();
$users=[[
    "name"=>"leo",
    "pw"=>"1234",
    "level"=>"n"
],[
    "name"=>"mack",
    "pw"=>"1234",
    "level"=>"n"
],[
    "name"=>"emma",
    "pw"=>"1234",
    "level"=>"n"
],[
    "name"=>"kim",
    "pw"=>"1234",
    "level"=>"n"
],[
    "name"=>"sam",
    "pw"=>"1234",
    "level"=>"vip"
]];
$acc='leo';
$pw='1234';

$formAcc=$_POST['acc'];
$formPw=$_POST['pw'];

if($acc==$formAcc && $pw==$formPw){
    $_SESSION['login']=$formAcc;
}else{
    $_SESSION['error']="帳號或密碼錯誤";
}

header("location:loginByses.php");

?>