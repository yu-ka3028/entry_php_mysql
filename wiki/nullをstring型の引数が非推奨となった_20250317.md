# エラー

Warning: Undefined variable $staff_pass in /var/www/html/staff_add_check.php on line 17

Deprecated: htmlspecialchars(): Passing null to parameter #1 ($string) of type string is deprecated in /var/www/html/staff_add_check.php on line 17

## エラー文から読み取れること

- $staff_pass が未定義
- null がダメと言っている？
- string 型が廃止されている？

## 仮説

- null と string 型が変数($staff_pass)として定義されていない
- バージョンで、書き方が変わった？

## 調査したいこと

- php8.2
- `Passing null to parameter #1 ($string) of type string is deprecated`

# 結果

- inset を入れる -> エラー変わらず
  `if(inset($staff_name = '')) {`
  - insetじゃない！isset...!!
  - 定義されているか：is set

- [isset,empty,is_null](https://qiita.com/fujita-goq/items/9e115cd14adc1b3bd593)

- [true,false,nullいずれも型となった](https://zenn.dev/koji9412/articles/revisiting_enhanced_points_of_php8_0_to_8_4#true%2Cfalse%2Cnull-%E3%82%92%E5%9E%8B%E3%81%A8%E3%81%97%E3%81%A6%E4%BD%BF%E7%94%A8%E5%8F%AF%E8%83%BD)

```php
  // 8.2からこれでは未定義になる
  // if($staff_pass = '') {
  //   print 'パスワードが入力されていません<br />';
  // }

  if (!isset($staff_pass)) {
    $staff_pass = '' ;
    print 'パスワードが入力されていません';
  }
```
  - これ実務でも触れた記憶...!!
  - nullも1つの型として独立され、関数の戻り値やパラメータ、プロパティの型をより具体的に指定できるように
  - php8.0からは型チェックがより厳格にできるようになっている
  - string型はnullを許容しなくなった
