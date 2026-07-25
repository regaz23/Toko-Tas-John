@echo off
title John Bag Shop - Server
color 0A

echo ============================================
echo   JOHN BAG SHOP - Laravel Dev Server
echo ============================================
echo.

:: Matikan proses PHP lama jika ada
taskkill /F /IM php.exe >nul 2>&1
timeout /t 1 >nul

:: Masuk ke folder project
cd /d "%~dp0"

:: Clear view cache lama
echo [1/3] Clearing cache...
php artisan view:clear >nul 2>&1
php artisan config:cache >nul 2>&1
php artisan route:cache >nul 2>&1
php artisan view:cache >nul 2>&1
php artisan icons:cache >nul 2>&1
echo       Done!

:: Hapus hot file jika ada
if exist public\hot del public\hot >nul 2>&1

echo [2/3] Starting server...
echo.
echo  ^> Buka browser: http://127.0.0.1:8080
echo  ^> Login: admin@example.com / password  
echo  ^> Tekan Ctrl+C untuk stop server
echo.
echo ============================================
echo.

:: Jalankan server dengan router kustom (static files cepat)
php -S 127.0.0.1:8080 server.php
