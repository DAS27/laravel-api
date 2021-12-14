start:
	./vendor/bin/sail up -d

setup: install migrate

migrate:
	./vendor/bin/sail artisan migrate

install:
	composer install
	cp -n .env.example .env|| true
	php artisan key:gen --ansi
	php artisan sail:install

test:
    ./vendor/bin/sail test
