# Laravel 5.1 Amazon S3 Hashed URL Generator

## Usage
1-)
```code
composer require phpuzem/linkify dev-master
```
2-)
```code 
config/app.php
``` 

```php
return [

    'providers' => [

        Phpuzem\Linkify\LinkifyServiceProvider::class,
    ],


    'aliases' => [
        'Linkify'   => Phpuzem\Linkify\Facades\Linkify::class,
    ],
];
```
3-) 
```code
php artisan vendor:publish
```
4-) 
```code
config/linkify.php
``` 
Edit your aws secret and access key

5-)
```php
$object = \Linkify::make()->bucketname("phpuzem")->expire(20)->objectpath("Demo.mp4")->get();
```
and this return :
```
"http://phpuzem.s3.amazonaws.com/Demo.mp4?AWSAccessKeyId=YOUR+AWS+ACCESS+ID&Expires=1435952627&Signature=k7M9VR%2FQzKxGW40V1%2Fed2aakWOQ%3D"
```


