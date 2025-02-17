Вітаю всіх, хто читає це повідомлення! Це тестове завдання, зроблене для Приватбанку на позицію Full Stack PHP Developer. 
Саме ТЗ можна знайти в документы WORD "ТЗ на позицію фулстек розробника". 

Для розгортання проекту необхідно: 
1) Для роботи використовується PHP 8.3 та MariaDB 10.6
2) Вибрати папку і в ній через термінал ввести команду git clone .
3) composer install
4) php artisan key:generate
5) після цього в файлі .env вказуємо доступи до бази даних
6) php artisan migrate
7) npm install
8) npm run prod
9) php artisan optimize:clear

Сайт передбачає наявність двух основних директорій:
1) / — корінь, де розміщено п. 1 і 2
2) /logic — розглядається питання на логіку з п. №3

Загальна побудова грунтується на принципах SOLID. Код декомпозований, для ряду функціоналу
використовуються сервіси та репозиторії. По можливості, намагався покращити читабельність
за допомогою активного коментування. 