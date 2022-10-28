<?php
$acc = 'leo';
$pw = '123';
$formAcc = $_POST['acc'];
$formPw = $_POST['pw'];

if ($acc == $formAcc && $pw == $formPw) {
    header("location:login.php?result=sucees");
    echo "帳密正確";
} else {
    header("location:login.php?result=fail");
    
    echo "erro";
}
