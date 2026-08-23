# Top-Athlete

Top-Athlete is a web application for an online football jersey store. This project features a storefront where users can browse jerseys from various leagues (Premier League, LaLiga, Ligue 1, Bundesliga, Serie A), manage their accounts, add items to their cart, and save their favorite products.

## Prerequisites

To run this project locally, you will need a local web server environment that supports PHP and MySQL. We recommend using:
- **XAMPP** (Windows/Mac/Linux)
- **WAMP** (Windows)
- **MAMP** (Mac)

## Installation & Setup

1. **Move the Project Folder**
   Place the entire `Top-Athlete` project folder inside your web server's root directory:
   - For XAMPP: `htdocs` folder (e.g., `/Applications/XAMPP/xamppfiles/htdocs/Top-Athlete` on Mac or `C:\xampp\htdocs\Top-Athlete` on Windows)
   - For WAMP: `www` folder
   - For MAMP: `htdocs` folder

2. **Database Configuration**
   - Start Apache and MySQL from your XAMPP/WAMP/MAMP control panel.
   - Open your web browser and go to `http://localhost/phpmyadmin` (or `http://localhost:8888/phpmyadmin` if you are using MAMP).
   - Create a new database named `maillot_nouvelle`.
   - Import the database schema and data:
     - Select the `maillot_nouvelle` database you just created.
     - Click on the **Import** tab.
     - Choose the SQL file located in the project at `le sql vrai/le sql vraix.sql`.
     - Click **Go** to run the import.

3. **Verify Database Credentials**
   By default, the application connects to the database using the following credentials:
   - **Host:** localhost
   - **User:** root
   - **Password:** root
   - **Database:** maillot_nouvelle

   *Note: These settings are centralized in the `db_config.php` file at the root of the project. If your local MySQL setup uses a different password (for example, an empty password `""` which is default on XAMPP Windows), you only need to update the `$password` variable in that one `db_config.php` file.*

4. **Launch the Application**
   - Open your web browser and navigate to: `http://localhost/Top-Athlete/index.php` (adjust the URL depending on your exact folder name).

## Features
- **Leagues Navigation:** Browse jerseys by league (Premier League, LaLiga, etc.).
- **Search System:** Search for specific teams or jerseys.
- **Cart & Favorites:** Save items for later or proceed to checkout.
- **User Accounts:** Registration, login, and session management.