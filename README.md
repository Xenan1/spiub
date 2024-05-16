steps to run:
  1. fill the .env file inside project root folder
  2. fill the .env file inside 'project' folder
  3. run `docker compose up -d`
  4. inside 'app' service container: run `composer install`
  5. inside 'app' service container: run `php artisan key:generate`
