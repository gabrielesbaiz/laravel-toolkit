<?php

namespace Gabrielesbaiz\LaravelToolkit;

use Spatie\LaravelPackageTools\Package;
use Gabrielesbaiz\LaravelToolkit\Helpers\WebHelper;
use Gabrielesbaiz\LaravelToolkit\Helpers\TimeHelper;
use Gabrielesbaiz\LaravelToolkit\Helpers\NumberHelper;
use Gabrielesbaiz\LaravelToolkit\Helpers\StringHelper;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Gabrielesbaiz\LaravelToolkit\Helpers\PhoneNumberHelper;

class LaravelToolkitServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('laravel-toolkit');
    }

    public function register(): void
    {
        parent::register();

        $this->app->singleton('laravel-toolkit-string', function () {
            return new StringHelper();
        });

        $this->app->singleton('laravel-toolkit-number', function () {
            return new NumberHelper();
        });

        $this->app->singleton('laravel-toolkit-time', function () {
            return new TimeHelper();
        });

        $this->app->singleton('laravel-toolkit-web', function () {
            return new WebHelper();
        });

        $this->app->singleton('laravel-toolkit-phone', function () {
            return new PhoneNumberHelper();
        });
    }
}
