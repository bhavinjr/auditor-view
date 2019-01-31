# Auditor view

Auditor view provides a dashboard for [msonowal/laravel-auditor](https://github.com/msonowal/laravel-auditor) package which is used for an activity log(Mongo DB)

Auditor view is created using Vue Component. Structure and theme from [(laravel/horizon)](https://github.com/laravel/horizon) 

## Installation


```bash
composer require bhavinjr/auditor-view
```

After installing Auditor view, publish its assets using the `vendor:publish` Artisan command:


## Dashboard Authorization
Auditor view exposes a dashboard at `/viewdit`. By default, you will only be able to access this dashboard in the local environment. To define a more specific access policy for the dashboard, you should use the `Viewdit::auth` method. The auth method accepts a callback which should return `true` or `false`, indicating whether the user should have access to the Viewdit dashboard:

```bash
use Bhavinjr\Viewdit\Viewdit;

Viewdit::auth(function ($request) {
    return //true or false
});

```

## Credits

[laravel/horizon](https://github.com/laravel/horizon) and [msonowal/laravel-auditor](https://github.com/msonowal/laravel-auditor)

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](https://choosealicense.com/licenses/mit/)