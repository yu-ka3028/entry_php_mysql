<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
  <?php

  $staff_name = $_POST['name'];
  $staff_pass = $_POST['pass'];
  $staff_pass2 = $_POST['pass2'];

  $staff_name = htmlspecialchars($staff_name,ENT_QUOTES,'UTF-8');
  $staff_pass = htmlspecialchars($staff_pass,ENT_QUOTES,'UTF-8');
  $staff_pass2 = htmlspecialchars($staff_pass2,ENT_QUOTES,'UTF-8');

  if(!isset($staff_name)) {
    $staff_name = '';
    print 'スタッフ名が入力されていません<br />';
  }
  else{
    print 'スタッフ名: ';
    print $staff_name;
    print '<br />';
  }

  // 8.2からこれでは未定義になる
  // if($staff_pass = '') {
  //   print 'パスワードが入力されていません<br />';
  // }

  if (!isset($staff_pass)) {
    $staff_pass = '';
    print 'パスワードが入力されていません';
  }


  if(!isset($staff_pass2)){
    $staff_pass2 = '';
    $staff_pass != $staff_pass2;
    print 'パスワードが一致しません<br />';
  }

  if($staff_name == '' || $staff_pass == '' || $staff_pass != $staff_pass2){
    print '<form>';
    print '<input type = "button" onclick = "history.back()" value = "戻る">';
    print '</form>';
  }
  else{
    // md5はもう新規では使われてない
    // $staff_pass = md5($staff_pass);
    $staff_pass = password_hash($staff_pass, PASSWORD_DEFAULT);
    var_dump("var_dump:$staff_pass");
    print '<form method = "post"action = "staff_add_done.php">';
    print '<input type = "hidden" name = "name" value = "'.$staff_name.'">';
    print '<input type = "hidden" name = "pass" value = "'.$staff_pass.'">';
    print '<br />';
    print '<input type = "button" onclick = "history.back()" value = "戻る" >';
    print '<input type = "submit" value = "OK">';
    print '</form>';
  }

  ?>

</body>
</html>