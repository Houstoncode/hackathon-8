# hackathon-8

Чтобы развернуть приложение, необходимо:
# Окружение
PHP 7.4.5 и выше
Composer 1.10.1 и выше
OpenServer

# Установка
Зайти в папку domains в OpenServer </br>
Выполнить команду git clone https://github.com/Houstoncode/hackathon-8.git
Выполнить следующие команды:</br>
cd hackathon-8 </br>
composer install </br>
npm install </br>
npm run dev - компилируем исходники </br>
Создаём файл .env в корне проекта с следующим содержимым:</br>
~~~
APP_NAME=LaravelVue
APP_ENV=local
APP_KEY=base64:rAYBLMHs7Lp4D3D4dnJv0x/lAt/vcNDZCUW6rDaozSA=
APP_DEBUG=true
APP_LOG_LEVEL=debug
APP_URL=http://localhost

LOG_CHANNEL=stack

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=root

BROADCAST_DRIVER=log
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"

JWT_TTL=1440
JWT_SECRET=UcRkrwNp8JBeEv0hD37PyqoStLVkL9rK307iTii523ps7TelycmsQWwBuTRmCSS3
CLOUDCONVERT_API_KEY=eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiZjcxZjYwMjQ0OWM5ODY4ZjFjYjBmOWU1ZjA2OWZjMWYwNjM5MzAyZWMwNzk5Mjk3MzQ4NTI5MWQxOWZiNjY2MzE3YjlkZTVhYWNmNjU3MjEiLCJpYXQiOjE2MzEzNzg5MjYuMDYwMjE1LCJuYmYiOjE2MzEzNzg5MjYuMDYwMjE4LCJleHAiOjQ3ODcwNTI1MjYuMDI3NDYsInN1YiI6IjUzMzU1NzMxIiwic2NvcGVzIjpbInVzZXIucmVhZCIsInVzZXIud3JpdGUiLCJ0YXNrLnJlYWQiLCJ0YXNrLndyaXRlIiwid2ViaG9vay5yZWFkIiwid2ViaG9vay53cml0ZSIsInByZXNldC5yZWFkIiwicHJlc2V0LndyaXRlIl19.kcFRNA-E3aS9cx7wepdqh34rrkx_LykaYq3kc9lLQMsZMLQwZbTgxrmtRK4RXzAVSnI7RFd8N8A890o-bcXWTHqFGDbVSPfq1LtzUqkyk14I3MxTOzXcm_4kgSwEpV57nysALGZE6QrzTfdXEP4QF4IUtZ2UUKBRM7xlzvKCCjDLySg8udBu31VKu_iNMHsoAseWyTUK8dLbSAAjlASgS6_H5taqtuCi1YTXzpeFRdESKTUy9JK_pp9n98I1G7w2rF60aLC_UM9pXEBZ-5CCBMt4Rkdo-PGLFPMbElTT47YKCrfd8SFl16Eg5XX4kp6zk1jgNt83YdOa3xJuRes_H97MWXt_zso-_6Ta-LUSJiVEnds5b_jcVOj6WJLqLTWQcxyteRUQ9EsOHlUVQBLisVJGsypyEoEnqJzk8mReuI37ghm11Nrj-3wXTXGZiI_rbi3ISFbkB2lcYNx7FXEUMhlFp0PwqVJ8vyrkI5VwkPnHmB7kk70D9VOnXMeV7ehfLWPeIFln4Alb1C5LjNntW6b9cqP3i7e90_swXlACiUeIUJHEZweOzzD0b9bB-Dh8phzWR63TqCgS9pCpJPWkEXgQjbb4IXu50q21MLUCYYKCHbBiF-vqPNppcxT9v4WdE38ARfqu8Wr4rgZDBCdVLNeQouCWr2F5JUmDc-h0KDM

~~~

Создаём базу данных и правим соответственные данные: </br>
~~~
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=root
~~~

После того как подключили, заполняем базу данными, выполняем следующую команду </br>
php artisan migrate:fresh --seed

# Данные для входа
логин - sasha@mail.ru </br>
пароль - nikapr321A

