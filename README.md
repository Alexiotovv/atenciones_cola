Para instalar JWT:
composer require tymon/jwt-auth

php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"

php artisan jwt:secret



Habilitar Storage:
php artisan storage:link
