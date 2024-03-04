<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Project

The game is like "Who Wants to Be a Millionaire?"
• During each game, the player is asked 5 questions randomly selected from the base and
not repeated during one game. For each question there are possible answer options (n
number) with multiple correct options. When the player chooses one of the answer
options, the system informs about the problem being right or wrong.
• Each question has its corresponding point. (for example, according to its complexity). If
the answer is correct, the point for the given question is added to the points calculated for
the given game, and each question can have 5-20 points. In case of multiple correct
answers these points will be divided among number of correct answers. In case of an
incorrect answer, thepoints are not added and the player is notified about the correct
answer.
• At the end of the game, the player is shown the number of points he has collected. This is
the main problem where you need to manually add data to the Database; the content of the
questions, of course, is not essential.
• After completing this part, send it to us and continue working on the rest. Add Login
Admin who can add / delete / modify questions, options for answering those questions and
the right option, as well as the point for each question. Create a sign-in and log-in
possibility (Name, Surname, Password). Playing is possible only after logging in. The best
result is calculated for each user and the top ten is displayed on the screen (names and the
highest score) based on the users’ best results.

## Deploy

1- composer install

2- cp .env.example .env

3- vi .env

4- run `php artisan migrate:fresh` command

5- run `php artisan db:seed` command

6- run `php artisan key:generate` command 

7- run `php artisan serve` command

## Admin
after deploy project, you can login with flowing information:

url: `{base_url}/admin/login`

email: `admin@amin.org`

password: `12345678`

## Admin
after deploy project, you can register/login as player:

register_url: `{base_url}/player/register`

login_url: `{base_url}/player/login`
