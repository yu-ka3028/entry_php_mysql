# エラー
Fatal error: Uncaught ArgumentCountError: password_hash() expects at least 2 arguments, 1 given in /var/www/html/staff_add_check.php:56 Stack trace: #0 /var/www/html/staff_add_check.php(56): password_hash(Object(SensitiveParameterValue)) #1 {main} thrown in /var/www/html/staff_add_check.php on line 56

## エラー文から読み取れること
- 引数(Argument)のカウントが合わない
  - password hash()では、2つの引数が必要だが1つしかない
## 仮説
- md5からpassword hash()へ安易に入れ替えるだけではダメそう
## 調査したいこと
- md5ではなぜダメか、もう使ってないのか
- password hash()の書き方
# 結果
- md4は10秒そこらで解析されてしまうようになった[参考記事](https://qiita.com/ob_nullpo/items/941385d0a603e6a4386c)
- password hash()の書き方
  `$staff_name = password_hash($staff_pass, PASSWORD_DEFAULT);`
  - [公式](https://www.php.net/manual/ja/function.password-hash.php)
  - [参考記事](https://qiita.com/wakahara3/items/792943c1e0ed7a87e1ef)
- 正しくかけていれば帰ってくる値はハッシュ
  passwordに"1234"を入力<br>
  -> `string(69) "var_dump:$2y$10$siDbB7osAxxWhZ6odVFVWeyq0uLIjpLM0I/wuIiy9gxu4SNW8EPz." `
- PHP 5.5.0以降で利用可能となっている