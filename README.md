# Money-Saving-Wallet
![159](https://user-images.githubusercontent.com/71829355/106353034-47ba5900-62f0-11eb-9fa2-6f22c2445c27.png)


## Project Description

The project is a virtual wallet system built with [Laravel 7](https://laravel.com) The features of this project include

1. Registration of users.
2. Users Can be Create owns Categories.
3. Users can create Incomes/expenses and show list of it's details.
4. every route has middleware check for security.
5. Admin Can show the list of Users Table.

## adminlogin(Route)

/Money-Wallet/adminlogin

## admindetails (after dB::seed)

email : admin@admin.com
password : admin123


## Project Setup(Web Portal)

### Cloning the GitHub Repository.

Clone the repository to your local machine by running the terminal command below.

```bash
git clone https://github.com/MohYacoub/Money-Saving-Wallet.git
```

### Setup Database

Create your a MySQL database and note down the required connection parameters. (DB Host, Username, Password, Name)

### Install Composer Dependencies

Navigate to the project root directory via terminal and run the following command.

```bash
composer install
```

### Create a copy of your .env file

Run the following command

```bash
cp .env.example .env
```

This should create an exact copy of the .env.example file. Name the newly created file .env and update it with your local environment variables (database connection info and others).

### Generate an app encryption key

```bash
php artisan key:generate
```

### Migrate the database

```bash
php artisan migrate
```

### Send the seeds

```bash
php artisan db:seed
```

### Send the seeds-byclass

```bash
php artisan db:seed --class=category_type
php artisan db:seed --class=Wallet_Currency
php artisan db:seed --class=AdminSeeder

```

### Future Possible Updates

The following features are to be added in the next available upgrade of the system.

1. Addition of Edit/delete functions.
