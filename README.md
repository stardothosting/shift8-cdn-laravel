# Laravel package for a free CDN by Shift8

## Overview
This is a Laravel package for [Shift8 CDN](https://shift8cdn.com) which is a free CDN service that utilizes endpoints all across the globe in order to quickly deliver your static assets and media to your end users.

Essentially you register for an account with the service, create a "pull zone" and install / configure the package in your Laravel (5.5+) project.

### File extensions that will be served through the CDN

The following file extensions can be configured via the package config file to be served through the worldwide CDN service, operated by Shift8 :

- CSS
- JS
- EOT
- WOFF
- TTF
- JPG/JPEG
- PNG
- GIF
- SVG

## Installation

### Step 1 : register for a Shift8 CDN account

You should register for an account on our service first and foremost. Head on over to [Shift8 CDN](https://shift8cdn.com/register) to register.

### Step 2 : add your site as a pull zone

Once registered and your account is validated, you can visit the dashboard and add your site by clicking the "Add Pull Zone" button. The URL should be exactly how it would need to be in order for us to fetch & serve the static assets across the CDN. Note the CDN URL that is generated for future reference.

### Step 3 : install the composer package

You can install `shift8/shift8cdn` via Composer by executing `composer require shift8web/shift8cdn` in your Laravel project's root folder. Alternatively you could add `"shift8web/shift8cdn": "^0.1.1"` as a requirement to your composer.json. 

### Step 4 : service provider

If you are using Laravel 5.5 or higher, the package will automatically register itself as a service provider. Otherwise you would have to add `Shift8Web\Shift8Cdn\Shift8CdnServiceProvider` to your [providers](https://laravel.com/docs/master/providers#registering-providers "Visit Laravel Documentation") array.

### Step 5 : public config file

This package has a configuration file which can be configured to your needs. Deploy the Shift8CDN config file to add your configuration for the CDN url and file extensions :

```bash
$ php artisan vendor:publish
```

This will create a config file in the `/config` folder of your laravel project called *shift8cdn.php*. In that file you can see an array with a URL and file extensions pre-defined :

```
    'Shift8CDN' => [
            "replace-me.wpcdn.shift8cdn.com" => "css|js|eot|woff|ttf|jpg|jpeg|png|gif|svg",
    ]
```

Take the CDN URL that you saved in *Step 2* and replace it in the configuration above. If you wanted to remove file extensions, thats fine but you cant add new ones. 

### Step 6 : Update your blade templates to serve the static assets through the CDN

You need to replace the points in your template that load the static assets to go through the Shift8Cdn function instead.

So this :

```php
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
```

Becomes :

```php
  <link href="{{ Shift8Cdn('css/app.css') }}" rel="stylesheet">
```

## Support

- Community forum will soon be deployed
- Ask on github

## Contribute

Please feel free to fork and extend existing or add new plugins and send a pull request with your changes!
To establish a consistent code quality, please provide unit tests for all your changes and may adapt the documentation.

## License

Released under the [GPLv3](LICENSE.md).
