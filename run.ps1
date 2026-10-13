# Run both Backend and Frontend in one command
$env:Path = "$env:LOCALAPPDATA\Programs\php;$env:LOCALAPPDATA\Programs\nodejs;$env:Path"

$baseDir = $PSScriptRoot

Write-Host "========================================================" -ForegroundColor Cyan
Write-Host "      Starting Smart Parking System (Full Stack)        " -ForegroundColor Cyan
Write-Host "========================================================" -ForegroundColor Cyan

# 1. Start PHP Backend server in background
Write-Host "[1/2] Starting PHP Backend on http://localhost:8000 ..." -ForegroundColor Yellow
Start-Process powershell -ArgumentList "-NoExit", "-Command", "cd '$baseDir'; `$env:Path = '$env:LOCALAPPDATA\Programs\php;`$env:Path'; Write-Host 'PHP API Server running on port 8000...' -ForegroundColor Green; php -S localhost:8000"

# 2. Start React Frontend server in background
Write-Host "[2/2] Starting React Frontend on http://localhost:5173 ..." -ForegroundColor Yellow
$reactDir = Join-Path $baseDir "react-app"
Start-Process powershell -ArgumentList "-NoExit", "-Command", "cd '$reactDir'; `$env:Path = '$env:LOCALAPPDATA\Programs\nodejs;`$env:Path'; Write-Host 'React Frontend Server running on port 5173...' -ForegroundColor Green; npm run dev"

# Wait briefly and open browser
Start-Sleep -Seconds 2
Start-Process "http://localhost:5173"

Write-Host "Both servers started successfully! Browser opened at http://localhost:5173" -ForegroundColor Green
