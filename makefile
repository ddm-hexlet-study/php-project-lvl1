istall: #установить зависимости
	composer install
brain-games: #запуск стартовой страницы
	./bin/brain-games
brain-even: #запуск игры на четность
	./bin/brain-even
brain-calc: #запуск игры калькулятор
	./bin/brain-calc
brain-gcd: #запуск игры НОД
	./bin/brain-calc
brain-progression: #запуск игры прогрессия
	./bin/brain-progression
validate: #проверка валидности пакета
	composer validate
lint: #запуск phpcs
	composer exec --verbose phpcs -- --standard=PSR12 src bin
