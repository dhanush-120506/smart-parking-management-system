@echo off
title Smart Parking System Launcher
set "PATH=%LOCALAPPDATA%\Programs\php;%LOCALAPPDATA%\Programs\nodejs;%PATH%"

cd /d "%~dp0"
echo ========================================================
echo          Starting Smart Parking System
echo ========================================================

echo 1. Starting PHP Backend server at http://localhost:8000 ...
start "Smart Parking - PHP Server" cmd /c "php -S localhost:8000"

echo 2. Starting React Dev server at http://localhost:5173 ...
cd /d "%~dp0react-app"
start "Smart Parking - React UI" cmd /c "npm run dev"

ping -n 3 127.0.0.1 >nul
echo 3. Opening browser...
start http://localhost:5173

echo.
echo ========================================================
echo   System running successfully!
echo   - React App:    http://localhost:5173
echo   - PHP Dashboard: http://localhost:8000
echo ========================================================
echo.
pause
