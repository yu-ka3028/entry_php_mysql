<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  ユーザー新規登録
  <form method="post" action="user_new.php">
    ユーザー名
    <input type=text name=username>
    メールアドレス
    <input type=text name=email>
    パスワード
    <input type=text name=password>
    <input type="button" onclick="history.back() value="戻る">
    <input type="submit" value="登録">
  </form>
</body>
</html>
