<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  ユーザー新規登録
  <form method="post" action="user_new_check.php">
    ユーザー名
    <input type=text name=username><br>
    メールアドレス
    <input type=text name=email><br>
    パスワード
    <input type=text name=password><br>
    <input type="button" onclick="history.back()"value="戻る">
    <input type="submit" value="送信">
  </form>
</body>
</html>
