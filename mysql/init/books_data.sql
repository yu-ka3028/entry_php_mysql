-- データベースがなければ作成
CREATE DATABASE IF NOT EXISTS books;

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
);

-- books テーブルにデータを挿入
INSERT INTO books (isbn, title, author, genre, price, image_url, detail)
VALUES
  ('9784297124373', 'プロを目指す人のためのRuby入門[改訂2版]', '伊藤 淳一', 'Ruby', 3278, 'https://i.gyazo.com/9cbb0ba3c2040dc3dc28ae5317a14a10.jpg', '通称チェリー本です。');
