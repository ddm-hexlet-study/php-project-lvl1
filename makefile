istall: #установить зависимости
	composer install
brain-games: #запуск стартовой страницы
	./bin/brain-games
validate: #проверка валидности пакета
	composer validate
lint: #запуск phpcs
	composer exec --verbose phpcs -- --standard=PSR12 src bin
