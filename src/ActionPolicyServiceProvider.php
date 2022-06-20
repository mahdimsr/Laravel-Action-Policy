<?php

namespace Msr\ActionPolicy;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Msr\ActionPolicy\Commands\ActionPolicyCommand;

class ActionPolicyServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-action-policy')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-action-policy_table')
            ->hasCommand(ActionPolicyCommand::class);
    }
}