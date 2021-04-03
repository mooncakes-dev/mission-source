## Local Setup

1. Run `composer update` in your directory to install all of the dependencies.

2. Run `php artisan passport:client --personal` this will create a personal access client, so this app can issue personal access tokens.

3. Change the `.env.example` file into `.env` and update the following fields to fit your environment.

Change the following variables:

```bash
DB_CONNECTION=sqlite
DB_USERNAME=root
DB_PASSWORD=root
```

3. Under `database` directory create your local database `database.sqlite`

4. Add a database route in your `.env` file. For the database route you need to put ABSOLUTE PATH to the database file.

```bash
DB_DATABASE= /your/user/file/structure/database.sqlite
```

5. Run all migrations `php artisan migrate`

6. Run `php artisan serve` to serve your application.
