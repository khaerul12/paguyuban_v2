<!-- ABOUT THE PROJECT -->
## About The Project


<!-- GETTING STARTED -->
## Getting Started
Project uses laravel v10, tailwind and filament v3. So make sure your local computer has node.js, php 8 and MySql

### Installation

The following are instructions for running the application properly and correctly.

1. Migration Database
    ```sh
   php artisan migrate
   ```
2. Import Cities and Provinces of Indonesia
    ```sh
    php artisan db:seed
   ```
3. Create user admin in database
    ```sh
    php artisan make:filament-user
   ```
4. Running npm dev
   ```sh
   npm run dev
   ```
5. Start Application 
   ```sh
   php artisan serve
   ```