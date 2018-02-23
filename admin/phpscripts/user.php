<?php

function AddNewUser($fname, $username, $email , $lvllist){
  include('connect.php');
  $password = unknownPass();



  // echo $password;

  //ordering to the mail function for the Encryption the password
  $mailLink = submitData($username, $email, $password);

  $EncryptPass = md5($password);
  $UserSTR = "INSERT INTO tbl_user VALUES(NULL, '{$fname}', '{$username}', '{$EncryptPass}', '{$email}', NULL, '{$lvllist}', 'no')";
  // echo $UserSTR;
  $UserQuery= mysqli_query($link, $UserSTR);
  if($UserQuery){
    redirect_to('admin_index.php');
  }else{
    $message = "Something goes woung, Your atempt have failed. This individual sucks";
    return $message;
  }






  mysqli_close($link);
}
include('connect.php');



function unknownPass() {
  $MagicPass = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
  $password = array(); //Keep it in mind to reveal $password as an array
  $MagicPassNum = strlen($MagicPass) - 1; //put the length -1 in cache
  for ($i = 0; $i < 8; $i++) {
    $n = rand(0, $MagicPassNum);
    $password[] = $MagicPass[$n];
  }
  return implode($password); //turn an array into a string
}


function submitData($username, $email, $password){
  $to = $email;
  $subj = "Confimation of login our movies. Thank you";
  $msg =  "Email: ".$email."\n\nPassword: ".$password.'admin_login.php';
  // echo 'admin_login.php';
  mail($to, $subj, $msg);
}

?>
