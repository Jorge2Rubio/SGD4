@echo off
REM Set Python path manually
SET "PYTHON_PATH=%LocalAppData%\Programs\Python\Python313\python.exe"

REM Check if Python exists
IF NOT EXIST "%PYTHON_PATH%" (
    echo ❌ Python not found at %PYTHON_PATH%
    echo Please verify your installation.
    pause
    exit /b 1
)

REM Add Python path to Git Bash temporarily
echo ✅ Linking Python into Git Bash...
bash -c "ln -sf /c/Users/%USERNAME%/AppData/Local/Programs/Python/Python313/python.exe /usr/bin/python"

REM Confirm Python in Git Bash
echo ✅ Python version in Git Bash:
bash -c "python --version"

REM Run git-filter-repo from Git Bash
echo 🧹 Cleaning git history...
bash -c "python git-filter-repo --path .env --invert-paths"

REM Push clean history to GitHub
echo 🚀 Force pushing to GitHub...
bash -c "git push origin vince --force"

pause
@echo off
REM Set Python path manually
SET "PYTHON_PATH=%LocalAppData%\Programs\Python\Python313\python.exe"

REM Check if Python exists
IF NOT EXIST "%PYTHON_PATH%" (
    echo ❌ Python not found at %PYTHON_PATH%
    echo Please verify your installation.
    pause
    exit /b 1
)

REM Add Python path to Git Bash temporarily
echo ✅ Linking Python into Git Bash...
bash -c "ln -sf /c/Users/%USERNAME%/AppData/Local/Programs/Python/Python313/python.exe /usr/bin/python"

REM Confirm Python in Git Bash
echo ✅ Python version in Git Bash:
bash -c "python --version"

REM Run git-filter-repo from Git Bash
echo 🧹 Cleaning git history...
bash -c "python git-filter-repo --path .env --invert-paths"

REM Push clean history to GitHub
echo 🚀 Force pushing to GitHub...
bash -c "git push origin vince --force"

pause
