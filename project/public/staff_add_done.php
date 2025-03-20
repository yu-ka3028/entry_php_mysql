<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
  <?php

  try {
    $staff_name = $_POST['name'];
    $staff_pass = $_POST['pass'];

    $staff_name = htmlspecialchars($staff_name, ENT_QUOTES, 'UTF-8');
    $staff_pass = htmlspecialchars($staff_pass, ENT_QUOTES, 'UTF-8');

    var_dump($staff_name);
    var_dump($staff_pass);

    $dsn = 'mysql:dbname=shop;host=localhost;charset=utf8';
    $user = 'root';
    $password = '';
    $dbh = new PDO($dsn, $user, $password);
    $dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    $sql = 'INSERT INTO mst_staff(name, password) VALUE (?, ?)';
    $stmt = $dbh -> prepare($sql);
    $data[] = $staff_name;
    $data[] = $staff_pass;
    $stmt -> excute($data);

    $dbh = null;

    print $staff_name;
    print 'さんを追加しました。<br />';
  }
  catch(Exception $e) {
    print 'ただいま障害により大変ご迷惑をかけしています。';
    exit();
  }

  ?>
  <a href = "staff_list.php">戻る</a>

</body>
</html>