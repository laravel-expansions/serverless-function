# serverless-function
Lambda Function 

## Setup

Please insttall in an existing Laravel project.
```
composer require laravel-expansions/serverless-function
```

Then let's create a ```handler``` file:
```
php artisan vendor:publish --tag=expantion-function
```

## Create Function

Create function and check ```/app/Functions``` directory.
```
php artisan make:function {FunctionName}
```

## Publish function stub file

Publish and check ```/stubs``` directory. Then modify ```function.stub``` template file.
```
php artisan vendor:publish --tag=expantion-function-stub
```