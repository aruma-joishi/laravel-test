Dockerビルド
  1.git clone git@github.com:aruma-joishi/laravel-test.git
  2.docker-compose up -d --build

Laravek環境構築
  1.docker-compose exec php bash
  2.composer install
  3.env.exampleファイルから.envを作成し、環境変数を変更
  4.php artisan key:generate
  5.php artisan migrate
  6.php artisan db:seed

使用技術
  PHP 7.4.9
  Laravel 8.83.8
  MySQL  8.0.26

URL
  開発環境: http://localhost:8080
  phpMyAdmin: http://localhost:8080

ER図
<img width="373" alt="タイトルなし" src="https://github.com/aruma-joishi/laravel-test/assets/144969756/4761aeca-59c2-463f-abc4-57f4bec887f5">
