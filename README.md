
Необходимо разработать тестовый проект на Laravel 10

Задача
Создание модуля мультирегиональности на подпапках и демонстрация его работы. Работа должна представлять из себя готовый проект, на главной странице которого будет список городов.  каждый должен иметь свою ссылку. Например: Казань – site.com/kazan; Москва – site.com/msk и так далее. При клике на город должна открываться ссылка. Появляться тот же список городов, но выбранный город должен быть выделен жирным. При этом при переходе на основной домен, если мы уже выбрали город – нас должно редиректить на подпапку с городом. К примеру: выбрали город Москва, при переходе на основной домен site.com, должен происходить 301-ый редирект site.com/moscow. Также если мы перешли на подпапку другого города сразу из адресной строки – город должен автоматически запоминаться. Например, если мы сразу в адресной строке вбили site.com/kazan – город Казань сразу запоминается, не имеет значения, был ли у нас изначально другой город сохранен.

Структура
Главная страница 
Header -> отображение выбранного города
Content -> вывод всех городов и возможность выбора города
	Страница о нас 
Header -> отображение выбранного города





Дополнительные задание
	Реализовать api методами на удаление и добавлениями городов


Результат:
    • Результатом является исходный код на GitHub. Содержащей полную инструкцию по развертыванию приложения.
    • Вы можете использовать любые сторонние библиотеки или пакеты, если это обосновано.






## Как запустить

1. клонировать репозиторий

```sh
git clone git@github.com:denis82/accent-test.git
```

2. перейти в корень

```sh
cd accent-test/
```

3. Переименовать конфиг файл

```sh
mv .env.example .env
```

4. поставить все пакеты

```sh
composer update
```
> Note: Возможные проблемы, не соответсятвие версии компосера.


5. Развернуть контеунеры

```sh
docker-compose up -d
```

> Note: Возможные проблемы, занятые порты для nginx или mysql.


6. Запустить миграции

```sh
php artisan migrate
```

> Note: Возможные проблемы, если запросы к базе отваливаются, в env сделать DB_HOST=mysql

8. Подключение к базе, в .env файле прописать.

```sh
DB_HOST=mysql
```

9. Если все прошло успешно запросы должны проходить так.

```sh
http://localhost
```
