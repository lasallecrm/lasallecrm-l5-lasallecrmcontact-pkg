# INSTALLATION

## Summary 
Optional LaSalleCRM package. 


## composer.json:

```
{
    "require": {
        "lasallecrm/lasallecrmcontact": "1.*",
    }
}
```


## Service Provider

In config/app.php:
```
Lasallecrm\Lasallecrmcontact\LasallecrmcontactServiceProvider::class,
```


## Facade Alias

* none


## Dependencies
* none


## Publish the Package's Config

With Artisan:
```
php artisan vendor:publish
```

## Migration

With Artisan:
```
php artisan migrate
```

## Notes

* view files will be published to the main app's view folder
* you should install all your packages first, then run "vendor:publish" and "migrate"
* run "vendor:publish" first; then, run "migrate" second


## Serious Caveat 

This package is designed to run specifically with LaSalle Customer Relationship Management. See my README.md for the full shpiel. 