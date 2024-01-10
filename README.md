

## Laravel Test

Create a very simple Laravel web application for task management:

Create task (info to save: task name, priority, timestamps)
Edit task
Delete task
Reorder tasks with drag and drop in the browser. Priority should automatically be updated based on this. #1 priority goes at top, #2 next down and so on.
Tasks should be saved to a mysql table.
BONUS POINT: add project functionality to the tasks. User should be able to select a project from a dropdown and only view tasks associated with that project.

You will be graded on how well-written & readable your code is, if it works, and if you did it the Laravel way.

Include any instructions on how to set up & deploy the web application in your Readme.md file in the project directory (delete the default readme).

Zip up the folder with your web application when you are finished and upload it here.

## Setting up

- Extract the project laravel_test-master
- Using the terminal enter into the root folder `cd laravel_test-master`
- Install dependencies using composer `composer install`
- Make a copy of `.env.example` and update the name to `.env`
- Update your MySQL database configs in the config file
- Run migration: `php artisan migrate`
- (Optional) Install test data: `php artisan db:seed`
- Run the project: `php artisan serve` and access the project on the browser

Thank you!
