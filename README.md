![image](https://github.com/VithyabavanS/Laravel-Project/assets/124652078/d3299805-e9bd-4efc-8488-079c24b10b32)
# Laravel-Project
Forum Application
This is a forum application built with Laravel. It allows users to register, login, view approved posts, create posts for admin approval, delete their own posts, and provides admin users the ability to approve or reject posts.

Project Folder --> ABC copy

Requirements
PHP >= 8.0
Composer
XAMPP
Installation
Clone the repository or download the source code.

shell
Copy code
git clone https://github.com/your/repository.git
Navigate to the project directory.

shell
Copy code
cd forum-application
Install dependencies using Composer.

shell
Copy code
composer install
Copy the example environment file and generate an application key.

shell
Copy code
cp .env.example .env
php artisan key: generate
Edit the .env file and set the database connection details.

shell
Copy code
DB_CONNECTION=mysql![Uploading Capture.PNG…]()

DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
Create the database tables and seed with initial data.

shell
Copy code
php artisan migrate --seed
Start the Apache and MySQL servers in XAMPP.

Open your web browser and visit http://localhost/ to access the forum application.

Usage
Register: Click on the "Register" link to create a new user account.
Login: Use your registered email and password to login to the forum.
View Approved Posts: Browse the homepage to view all approved posts.
Create Post: Click on the "Post Something" button to create a new post for admin approval.
Delete Post: If you are the author of a post, you can delete it by clicking the "Delete" button.
Admin Approval: Admin users can approve or reject posts in the admin panel.
Comment on Posts: (To be implemented)
Search for Posts: Use the search bar to find posts by matching text or user.


Known Issues

Comment functionality is not yet implemented.



