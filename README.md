# OptBaza
1. Установить: php7.2, yarn, composer, symfony (wget https://get.symfony.com/cli/installer -O - | bash) 
1. composer install
1. yarn encore prod
2. ENV файл необходимо будет изменить под свои настройки сервера
1. php bin/console doctrine:database:create
1. php bin/console doctrine:migrations:migrate
1. symfony server:start
