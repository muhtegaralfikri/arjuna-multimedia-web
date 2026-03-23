# @package    Laravel
# @author     Taylor Otwell <taylor@laravel.com>
# @copyright  2003-2024 Laravel
# @link       https://laravel.com
# @license    https://opensource.org/licenses/MIT

composer install --no-interaction --prefer-dist --optimize-autoloader --no-dev
php artisan key:generate
php artisan storage:link
php artisan migrate --force
php artisan optimize:clear
