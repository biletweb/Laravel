## Про цей проєкт:

Це мій перший проєкт під назвою Блог який увійде в моє портфоліо, я постарався зробити код та дизайн максимально читаним та приємним оку.

## Функціонал:
- Особистий кабінет користувача:
  - перегляд своїх постів;
  - перегляд постів які сподобались;
  - перегляд коментарів;
  - завантаження/видалення аватар;
- Пошук постів;
- Категорії постів;
- Створення постів та додавання зображень к ним;
- Лайки постів;
- Коментарі для постів та відповіді на них;
- Видалення поста;

## Встановлення:
- клонувати проект на пк/хостинг;
- виконати команду composer install;
- створити admin користувача php artisan migrate --seed --seeder=AdminSeeder;
- створити унікальний ключ php artisan key:generate;
- створити посилання для завантажених зображень php artisan storage:link;

## Облікові дані профілю admin:
- Email: admin@gmail.com;
- Password: admin;
- Можливості:
    - Редагування/видалення постів;
    - Видалення коментаря з відповідями на нього;
    - Створення/видалення категорій;
