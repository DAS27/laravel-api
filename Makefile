start:
	php artisan serve --host 0.0.0.0

setup:
	composer install
	cp -n .env.example .env|| true
	php artisan key:gen --ansi
	migrate

migrate:
	php artisan migrate
	php artisan db:seed

log:
	tail -f storage/logs/laravel.log
