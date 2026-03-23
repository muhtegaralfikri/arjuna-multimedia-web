#!/bin/bash

# Post-Deployment Verification Script
# Run this script after deploying to verify everything is working

echo "=========================================="
echo "Arjuna Net - Deployment Verification"
echo "=========================================="
echo ""

# Colors for output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
NC='\033[0m' # No Color

# Counter for results
PASS=0
FAIL=0
WARN=0

# Function to print results
print_result() {
    if [ $1 -eq 0 ]; then
        echo -e "${GREEN}✓ PASS${NC}: $2"
        ((PASS++))
    elif [ $1 -eq 1 ]; then
        echo -e "${RED}✗ FAIL${NC}: $2"
        ((FAIL++))
    else
        echo -e "${YELLOW}⚠ WARN${NC}: $2"
        ((WARN++))
    fi
}

# Check if .env exists
echo "Checking .env file..."
if [ -f .env ]; then
    print_result 0 ".env file exists"
else
    print_result 1 ".env file not found"
fi

# Check APP_ENV
echo ""
echo "Checking environment configuration..."
if grep -q "APP_ENV=production" .env 2>/dev/null; then
    print_result 0 "APP_ENV is set to production"
else
    print_result 1 "APP_ENV is not set to production"
fi

# Check APP_DEBUG
if grep -q "APP_DEBUG=false" .env 2>/dev/null; then
    print_result 0 "APP_DEBUG is disabled (good for production)"
else
    print_result 1 "APP_DEBUG is enabled (should be false in production)"
fi

# Check APP_KEY
if grep -q "APP_KEY=base64:" .env 2>/dev/null; then
    print_result 0 "APP_KEY is set"
else
    print_result 1 "APP_KEY is not set"
fi

# Check database connection
echo ""
echo "Checking database connection..."
if php artisan tinker --execute="DB::connection()->getPdo(); echo 'OK';" 2>/dev/null | grep -q "OK"; then
    print_result 0 "Database connection successful"
else
    print_result 1 "Database connection failed"
fi

# Check migrations
echo ""
echo "Checking database migrations..."
if php artisan migrate:status 2>/dev/null | grep -q "No migrations"; then
    print_result 2 "No migrations run yet"
else
    MIGRATION_COUNT=$(php artisan migrate:status 2>/dev/null | grep -c "Batch")
    if [ $MIGRATION_COUNT -gt 0 ]; then
        print_result 0 "Database migrations applied ($MIGRATION_COUNT batches)"
    else
        print_result 1 "No migrations found"
    fi
fi

# Check storage link
echo ""
echo "Checking storage link..."
if [ -L "public/storage" ]; then
    print_result 0 "Storage link exists"
else
    print_result 1 "Storage link not found (run: php artisan storage:link)"
fi

# Check cache
echo ""
echo "Checking cache configuration..."
if [ -f "bootstrap/cache/config.php" ]; then
    print_result 0 "Config cache exists"
else
    print_result 2 "Config not cached (run: php artisan config:cache)"
fi

if [ -f "bootstrap/cache/routes-v7.php" ]; then
    print_result 0 "Routes cache exists"
else
    print_result 2 "Routes not cached (run: php artisan route:cache)"
fi

# Check file permissions
echo ""
echo "Checking file permissions..."
if [ -w "storage/logs" ]; then
    print_result 0 "Storage directory is writable"
else
    print_result 1 "Storage directory is not writable"
fi

if [ -w "bootstrap/cache" ]; then
    print_result 0 "Cache directory is writable"
else
    print_result 1 "Cache directory is not writable"
fi

# Check required PHP extensions
echo ""
echo "Checking PHP extensions..."
PHP_VERSION=$(php -v | head -n 1 | cut -d ' ' -f 2 | cut -d '.' -f 1,2)
echo "PHP Version: $PHP_VERSION"

REQUIRED_EXTENSIONS=("bcmath" "ctype" "curl" "fileinfo" "json" "mbstring" "openssl" "pdo" "pdo_mysql" "tokenizer" "xml" "zip")
for ext in "${REQUIRED_EXTENSIONS[@]}"; do
    if php -m | grep -q "^$ext$"; then
        print_result 0 "PHP extension '$ext' is installed"
    else
        print_result 1 "PHP extension '$ext' is missing"
    fi
done

# Check Composer dependencies
echo ""
echo "Checking Composer dependencies..."
if [ -d "vendor" ]; then
    print_result 0 "Vendor directory exists"
else
    print_result 1 "Vendor directory not found (run: composer install)"
fi

# Check Node modules
echo ""
echo "Checking Node.js dependencies..."
if [ -d "node_modules" ]; then
    print_result 0 "Node modules exist"
else
    print_result 2 "Node modules not found (run: npm install)"
fi

# Check built assets
if [ -f "public/build/assets/main.js" ] || [ -f "public/assets/app.js" ]; then
    print_result 0 "Frontend assets are built"
else
    print_result 2 "Frontend assets not built (run: npm run build)"
fi

# Check admin user
echo ""
echo "Checking admin user..."
ADMIN_COUNT=$(php artisan tinker --execute="echo App\Models\AdminUser::count();" 2>/dev/null)
if [ "$ADMIN_COUNT" -gt 0 ]; then
    print_result 0 "Admin user exists ($ADMIN_COUNT admin(s))"
else
    print_result 1 "No admin user found (run: php artisan db:seed)"
fi

# Check seed data
echo ""
echo "Checking seed data..."
PACKAGE_COUNT=$(php artisan tinker --execute="echo App\Models\Package::count();" 2>/dev/null)
if [ "$PACKAGE_COUNT" -gt 0 ]; then
    print_result 0 "Packages seeded ($PACKAGE_COUNT packages)"
else
    print_result 2 "No packages found"
fi

AREA_COUNT=$(php artisan tinker --execute="echo App\Models\ServiceArea::count();" 2>/dev/null)
if [ "$AREA_COUNT" -gt 0 ]; then
    print_result 0 "Service areas seeded ($AREA_COUNT areas)"
else
    print_result 2 "No service areas found"
fi

# Final summary
echo ""
echo "=========================================="
echo "Verification Summary"
echo "=========================================="
echo -e "${GREEN}PASSED: $PASS${NC}"
echo -e "${YELLOW}WARNINGS: $WARN${NC}"
echo -e "${RED}FAILED: $FAIL${NC}"
echo ""

if [ $FAIL -eq 0 ]; then
    echo -e "${GREEN}✓ Deployment verification PASSED!${NC}"
    echo ""
    echo "Next steps:"
    echo "1. Visit your site and test all pages"
    echo "2. Test admin login at /admin/login"
    echo "3. Test form submissions"
    echo "4. Check SSL certificate"
    echo "5. Setup monitoring"
    exit 0
else
    echo -e "${RED}✗ Deployment verification FAILED!${NC}"
    echo ""
    echo "Please fix the issues above before proceeding."
    exit 1
fi
