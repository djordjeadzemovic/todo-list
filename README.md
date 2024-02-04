# todos

Steps to reporduce:

1. Clone this repo
2. cd into project folder
3. execute `composer install`
4. Create database
5. Create if not present .env file and enter Database url inside (just change username and password and database name - use name given in step 4):
    `DATABASE_URL=mysql://user:password@127.0.0.1:3306/todos`
6. Execute `php bin/console doctrine:migrations:migrate` to execute existing migrations and create a table in database