# BE-praxxys

## Stack used

-   Tailwind CSS - Front end (CSS)
-   VueJS - Front end (JS)
-   InertiaJS
-   Laravel Breeze

## Run this project

-   `git clone https://github.com/jimuelcaratao/BE-praxxys.git`
-   cd BE-praxxys
-   composer install
-   npm install
-   create a database in your phpMyAdmin or other tool with the same name in the .env file (be_praxxys)
-   php artisan migrate
-   php artisan storage:link
-   php artisan db:seed --class=UserSeeder (for local seeder check creds here-> database\seeders\UserSeeder.php)
-   php artisan serve
-   npm run dev
-   run to browser - http://127.0.0.1:8000/

