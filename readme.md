Приложение работает на порту 8000.

Для запуска приложения скорипуйте файл настроек из шаблона:
	
	cp .env.example .env

Запустите сборку docker:

	docker-compose build app

	docker-compose up -d

Соберите приложение Laravel внутри контейнера:

	docker-compose exec app composer install

	docker-compose exec app php artisan key:generate

Создайте таблицы в базе данных:

	docker-compose exec app php artisan migrate



