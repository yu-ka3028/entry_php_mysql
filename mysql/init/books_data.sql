-- データベースがなければ作成
CREATE DATABASE IF NOT EXISTS books CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- books データベースを使用
USE books;

-- books テーブルの作成
CREATE TABLE books (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,         -- 本のID
    isbn CHAR(13),                                -- ISBN(13桁) ※カンマを追加
    title VARCHAR(255) NOT NULL,                  -- 本のタイトル
    author VARCHAR(255),                          -- 著者名
    genre VARCHAR(50) NOT NULL,                   -- ジャンル
    price INT NOT NULL,                           -- 仮想通貨での価格
    image_url TEXT,                               -- サムネイル画像URL
    detail TEXT,                                  -- 本の詳細説明
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- 作成日時
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP -- 更新日時
)CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- books テーブルにデータを挿入
INSERT INTO books (isbn, title, author, genre, price, image_url, detail)
VALUES
  ('9784297124373', 'プロを目指す人のためのRuby入門[改訂2版]', '伊藤 淳一', 'Ruby', 3278, 'https://i.gyazo.com/9cbb0ba3c2040dc3dc28ae5317a14a10.jpg', '通称チェリー本です。'),
  ('9784798144450', 'SQLゼロからはじめるデータベース操作', 'ミック', 'SQL', 2068, 'https://m.media-amazon.com/images/I/71wBt9D4wIL._SY522_.jpg', 'postgreSQLで実際にDB操作ができる' ),
  ('9784873115658', 'リーダブルコード', 'Dustin Boswell', '技術書', 2640, 'https://m.media-amazon.com/images/I/81+3DpjuMdL._SY522_.jpg', 'より良いコードを書くためのテクニック' ),
  ('9784802614061', 'システム設計の面接試験', 'アレックス・シュウ', '技術書', 3080, 'https://m.media-amazon.com/images/I/81JWwksE-9L._SY522_.jpg', '中規模~大規模システムってどんな感じで動くか' );
