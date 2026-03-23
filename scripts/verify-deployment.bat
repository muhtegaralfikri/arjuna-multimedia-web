@echo off
REM Post-Deployment Verification Script for Windows
REM Run this script after deploying to verify everything is working

echo ==========================================
echo Arjuna Net - Deployment Verification
echo ==========================================
echo.

REM Counter for results
set PASS=0
set FAIL=0
set WARN=0

echo Checking .env file...
if exist .env (
    echo [PASS] .env file exists
    set /a PASS+=1
) else (
    echo [FAIL] .env file not found
    set /a FAIL+=1
)
echo.

echo Checking environment configuration...
findstr /C:"APP_ENV=production" .env >nul 2>&1
if %errorlevel%==0 (
    echo [PASS] APP_ENV is set to production
    set /a PASS+=1
) else (
    echo [FAIL] APP_ENV is not set to production
    set /a FAIL+=1
)

findstr /C:"APP_DEBUG=false" .env >nul 2>&1
if %errorlevel%==0 (
    echo [PASS] APP_DEBUG is disabled (good for production)
    set /a PASS+=1
) else (
    echo [FAIL] APP_DEBUG is enabled (should be false in production)
    set /a FAIL+=1
)

findstr /C:"APP_KEY=base64:" .env >nul 2>&1
if %errorlevel%==0 (
    echo [PASS] APP_KEY is set
    set /a PASS+=1
) else (
    echo [FAIL] APP_KEY is not set (run: php artisan key:generate)
    set /a FAIL+=1
)

echo.
echo Checking database connection...
php artisan tinker --execute="DB::connection()->getPdo(); echo 'OK';" 2>nul | findstr "OK" >nul
if %errorlevel%==0 (
    echo [PASS] Database connection successful
    set /a PASS+=1
) else (
    echo [FAIL] Database connection failed
    set /a FAIL+=1
)

echo.
echo Checking storage link...
if exist public\storage (
    echo [PASS] Storage link exists
    set /a PASS+=1
) else (
    echo [FAIL] Storage link not found (run: php artisan storage:link)
    set /a FAIL+=1
)

echo.
echo Checking cache configuration...
if exist bootstrap\cache\config.php (
    echo [PASS] Config cache exists
    set /a PASS+=1
) else (
    echo [WARN] Config not cached (run: php artisan config:cache)
    set /a WARN+=1
)

echo.
echo Checking file permissions...
if exist storage\logs (
    echo [PASS] Storage logs directory exists
    set /a PASS+=1
) else (
    echo [FAIL] Storage logs directory not found
    set /a FAIL+=1
)

echo.
echo Checking Composer dependencies...
if exist vendor (
    echo [PASS] Vendor directory exists
    set /a PASS+=1
) else (
    echo [FAIL] Vendor directory not found (run: composer install)
    set /a FAIL+=1
)

echo.
echo Checking Node.js dependencies...
if exist node_modules (
    echo [PASS] Node modules exist
    set /a PASS+=1
) else (
    echo [WARN] Node modules not found (run: npm install)
    set /a WARN+=1
)

echo.
echo Checking built assets...
if exist public\build\assets\main.js (
    echo [PASS] Frontend assets are built (Vite)
    set /a PASS+=1
) else if exist public\assets\app.js (
    echo [PASS] Frontend assets are built (Legacy)
    set /a PASS+=1
) else (
    echo [WARN] Frontend assets not found (run: npm run build)
    set /a WARN+=1
)

echo.
echo Checking admin user...
for /f %%i in ('php artisan tinker --execute="echo App\Models\AdminUser::count();" 2^>nul') do set ADMIN_COUNT=%%i
if defined ADMIN_COUNT (
    if %ADMIN_COUNT% GTR 0 (
        echo [PASS] Admin user exists (%ADMIN_COUNT% admin(s))
        set /a PASS+=1
    ) else (
        echo [FAIL] No admin user found (run: php artisan db:seed)
        set /a FAIL+=1
    )
) else (
    echo [WARN] Could not check admin user
    set /a WARN+=1
)

echo.
echo ==========================================
echo Verification Summary
echo ==========================================
echo PASSED: %PASS%
echo WARNINGS: %WARN%
echo FAILED: %FAIL%
echo.

if %FAIL%==0 (
    echo [SUCCESS] Deployment verification PASSED!
    echo.
    echo Next steps:
    echo 1. Visit your site and test all pages
    echo 2. Test admin login at /admin/login
    echo 3. Test form submissions
    echo 4. Check SSL certificate (if applicable)
    echo 5. Setup monitoring
    pause
    exit /b 0
) else (
    echo [FAILED] Deployment verification FAILED!
    echo.
    echo Please fix the issues above before proceeding.
    pause
    exit /b 1
)
