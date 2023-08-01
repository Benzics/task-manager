## Simple Task Management system by Benzics
This is a simple task management system where we can create projects and assign them multiple tasks.
Built with Laravel 10

### Requirements
- PHP 8.1 and above
- MySQL database

### Installation
- Rename the .env.example file to .env
- Edit the DB_DATABASE, DB_USERNAME and DB_PASSWORD fields to your mysql database credentials in the .env file
- Open a console at the root dir, and run these commands consecutively
  ```
  php artisan migrate
  php artisan serve
  ```
- Open local server at http://127.0.0.1:8000

### Usage
- Create a project by clicking the new project button
- Then select view project to see project details and add tasks
- You can add a task by filling the task name field and submitting
- Added tasks' priority can be reordered by dragging them up/down the list
- Edit/delete a task by clicking the edit/delete buttons
- Projects can also be edited
- When you delete a project, all associated task gets deleted

### Technologies
- Laravel
- Jquery
- Bootstrap
- Jquery UI Sortable

This task was fun!