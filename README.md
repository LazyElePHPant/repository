# Laravel Implementation of Repository Pattern

Laravel package to facilitate repository design pattern implementation across multiple projects.

## Installation

```
composer require lazyelephpant/repository
```

## Plain Repository Class

To generate a repository class without a specific model simply run the following command:

```
php artisan make:repository
```

## Model Repository Class

To generate a repository class for a specific model you may specify by defining the `--model`:

```
php artisan make:repository --model=User
```
