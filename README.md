# soporte-remoto


Pasos para instalar proyecto desde github

Requisitos:
Xampp 7.3.28 +			-			https://www.apachefriends.org/es/download.html
composer 				- 		 	https://getcomposer.org/download/
nodejs					-			https://www.npmjs.com/get-npm



Luego de haber instalado lo anterior

Pasos:
1- crear una copia de .env.example y renombrarlo a .env
modificar .env con los datos de la base de datos (db_username, db_password)
2- En la terminal:
		composer install
		php artisan key:generate
		npm install
		npm run dev
		npm install vuejs-datatable
		php artisan migrate

3.- Instalar dependencias
comando datatables 
npm install --save jszip
npm install --save pdfmake
npm install --save datatables.net-bs4
npm install --save datatables.net-buttons-bs4

comando multiselect
npm install vue-multiselect --save

comando jspdf
npm install jspdf --save

4.- Para correr el programa
php artisan serve
entrar al link que sale en la terminal


<!-- Comandos extras:
	composer dump-autoload
	composer require laravel/ui
	php artisan ui vue -->