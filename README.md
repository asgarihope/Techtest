# TechTest Project

This is my test code challenge that named TechTest 

- [Requirements](#requirements)
- [Installation](#installation)
- [Usage](#usage)
- [Workflow](#workflow)
- [Challenges](#challenges)


## Requirements

- PHP >= 8.2
- Composer
- Node
- MySQL
- Popcorn (For enjoying reading)

## Installation

1. Clone the repository:

    ```bash
    git clone https://github.com/your-username/your-repo.git
    ```

2. Navigate to the project directory:

    ```bash
    cd your-repo
    ```

3. Install dependencies:

    ```bash
    composer install
    npm install
    ```

4. Copy the example environment file and set the environment variables:
    ```bash
    cp .env.example .env
    ```

5. Generate an application key:
    ```bash
    php artisan key:generate
    ``` 

6. Change these env keys for customize user of admin:
    ```
    ADMIN_EMAIL=
    ADMIN_PASSWORD=
    ``` 


7. Run the database migrations:

    ```bash
    php artisan migrate
    ```
   
8. Run the database Seeds (will add admin):

    ```bash
    php artisan db:seed
    ```

9. Run the below command to add fake articles (10 is the number of articles that will be generated):

    ```bash
    php artisan generate:articles 10
    ```
10. Run Test

    ```bash
    php artisan test
    ```

## Usage

1. Start the development server:

    ```bash
    npm run dev
    php artisan serve
    ```

2. Visit `http://localhost:8000` in your browser to view the application.
3. Logged In with defined the email and password
4. Visit the documentation of APIs at http://127.0.0.1:8000/api/documentation#/Article

## Workflow
1. Installed Laravel
2. Installed some packages in composer
   1. `laravel/ui` for Authenticate
   2. `darkaonline/l5-swagger` for Documentation
3. Installed some packages in node
   1. `scss` for compile scss files
   2. `bootstrap` for using UI components
   3. `toastr` for improve UI messages to clients
4. Generated `database\factories\UserFactory.php` for make user with faker and use in DatabaseSeeder with customize email and password for admins
5. Generated `database\factories\ArticleFactory.php` for build article
   1. Created A command for generate article with an argument for number of generate article at `Console/Commands/GenerateArticles.php` file
   2. Used transactional query pattern for show you my abilities about these challenges :D
       ```bash
       php artisan generate:articles 10
        ```
      
6. Layout
   1. Created layout blade  and using section/yield for remove duplicate code
   2. Seperated Views for auth and panel and pages
   
7. User
   1. Added UserRepository for make a connection between Model and application
   2. Added UserService for logic which is an abstract layer for using the repository
   3. Added Controller for Views
   4. Raise UserLoggedInEvent when a user logged in for the others listeners

8. Article
    1. Added ArticleRepository for make a connection between Model and application
    2. Added ArticleService for logic which is an abstract layer for using the repository
    3. Added Controller for Views
    4. Add DTO for being an object to transfer data between sections throughout the application
    5. Created Request for keeping safe and validation the inputs for api actions at controller
    6. Created Resources for APIs for add a output layer and **Monomorphic**
9. Fibonacci
    1. Added FibonacciService for calculate
    2. Added Controller for Views
10. SP (stored producer) for get article via ID, generated a migration to create this sp and use it on the `ArticleRepository` for fetch that article 
11. Documentation of API with input together with output at http://127.0.0.1:8000/api/documentation
12. Used `trans()` for showing labels help us to creating multi language website ASAP


## Challenges
1. Laravel 12 uses PHP v8.2 and had to install this version in my computer (I am using Win+Laragon + MacOS)
2. Created A Repository and Service provider pattern base on my test project
3. Add SCSS compiler to vite for developing
4. Build Authentication for keeping safe the panel routes for add article
5. Added throttle for keep safe the API routes (60 request per min)
6. Wrote Documentation in Swagger are really challenge
7. Principles: OOP, SOLID, KISS, Repository patterns, Factory pattern, Observer Pattern for login event ...
8. Wrote PHPUnit Test For Article Service 
