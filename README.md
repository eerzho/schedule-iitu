# schedule-iitu
ИНСТРУКЦИЯ ДЛЯ ТОГО ЧТОБ ИЗИ ЗАПУСТИТЬ КОД И НИЧЕГО НЕ МЕНЯТЬ:
Устоновите Xampp.
Добавьте этот проект в новую папку в «htdocs» которая находится в xampp. 
Если не смогли найти этот файл просто сделайте поиск.  
После этого запустите xampp и в браузере перейдите по ссылке http://localhost/«названия папки» он откроет вам inde.html .
http://localhost/«названия папки»/login.html перейдите по этой ссылку эта страница входа в админку чтобы открыть эту страницу без ввода .html
добавьте в папку проекта, файл и назовите .htaccess впишите туда такой код: 
RewriteEngine on
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME}\.php -f
RewriteRule ^(.*)$ $1.php [NC,L]
RewriteEngine on
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME}\.html -f
RewriteRule ^(.*)$ $1.html [NC,L]

НИЧИГО МЕНЯТЬ НЕ НУЖНО!

В phpmyadmin создайте базу данных под названием schedule  добавьте туда две таблицы admin(id, userName, password) и chair(id, name). Id - должны быть PRIMARY KEY и AUTO INCREMENT(A_I). В таблицу admin добавьте админа и перейдите по этой ссылке http://localhost/«названия папки»/login Войдите в аккаунт который добавили через базу данных. 
