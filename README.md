# schedule-iitu
ИНСТРУКЦИЯ ДЛЯ ТОГО ЧТОБ ИЗИ ЗАПУСТИТЬ КОД И НИЧЕГО НЕ МЕНЯТЬ:<br>
Устоновите Xampp.<br>
Добавьте этот проект в новую папку в «htdocs»  <br>
После этого запустите xampp и в браузере перейдите по ссылке http://localhost/«название папки» он откроет вам index.html .<br>
http://localhost/«название папки»/login.html перейдите по этой ссылке эта страница входа в админку чтобы открыть эту страницу <br>без ввода .html добавьте в папку проекта, файл и назовите .htaccess впишите туда такой код: <br>
RewriteEngine on<br>
RewriteCond %{REQUEST_FILENAME} !-d<br>
RewriteCond %{REQUEST_FILENAME}\.php -f<br>
RewriteRule ^(.*)$ $1.php [NC,L]<br>
RewriteEngine on<br>
RewriteCond %{REQUEST_FILENAME} !-d<br>
RewriteCond %{REQUEST_FILENAME}\.html -f<br>
RewriteRule ^(.*)$ $1.html [NC,L]<br>
<br>
НИЧИГО МЕНЯТЬ НЕ НУЖНО!
<br>
В phpmyadmin создайте базу данных под названием schedule  добавьте туда две таблицы admin(id, userName, password) и chair(id, <br>name). Id - должен быть PRIMARY KEY и AUTO INCREMENT(A_I). В таблицу admin добавьте админа и перейдите по этой ссылке <br>http://localhost/«названия папки»/login Войдите в аккаунт который добавили ранее. <br>
