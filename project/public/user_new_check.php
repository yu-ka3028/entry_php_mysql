<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //POSTデータ取得
        $new_username = $_POST["username"];
        $new_email = $_POST["email"];
        $new_password = $_POST["password"];
        //HTMLエスケープ
        $new_username = htmlspecialchars($new_username, ENT_QUOTES,'UTF-8');
        $new_email = htmlspecialchars($new_email, ENT_QUOTES,'UTF-8');
        $new_password = htmlspecialchars($new_password, ENT_QUOTES,'UTF-8');

        echo '<h1>確認画面</h1>';
        echo '<p>ユーザー名: ' .$new_username. '</p>';
        echo '<p>メールアドレス: ' .$new_email. '</p>';
        echo '<p>パスワード: ' .$new_password. '</p>';
        //確認用のフォーム
        echo '<form method="post" action="user_new.php">';
        echo '<input type="hidden" name="username" value="'.$new_username.'">';
        echo '<input type="hidden" name="email" value="'.$new_email.'">';
        echo '<input type="hidden" name="password" value="'.$new_password.'">';
        echo '<input type="submit" value="登録">';
        echo '</form>';
    } else {
        echo "データが送信されていません。";
    }
  ?>
</body>
</html>