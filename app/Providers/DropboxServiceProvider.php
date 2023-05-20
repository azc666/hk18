<?php

namespace App\Providers;

use League\Flysystem\Filesystem;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;
use Spatie\Dropbox\Client as DropboxClient;
use Spatie\FlysystemDropbox\DropboxAdapter;
use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Contracts\Foundation\Application;

class DropboxServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Storage::extend('dropbox', function (Application $app, array $config) {
        //     $adapter = new DropboxAdapter(new DropboxClient(
        //         $config['authorization_token']
        //     ));

        //     return new FilesystemAdapter(
        //         new Filesystem($adapter, $config),
        //         $adapter,
        //         $config
        //     );
        // });
        $newToken = cache()->remember('dropbox_token', 13000, function () {
            return Http::asForm()
                ->post('https://api.dropbox.com/oauth2/token', [
                    'refresh_token' => config('services.dropbox.refresh_token'),
                    'client_secret' => config('services.dropbox.app_secret'),
                    'client_id' => config('services.dropbox.app_key'),
                    'grant_type' => 'refresh_token',
                ])
                ->json()['access_token'];
        });

        Storage::extend('dropbox', function ($app, $config) use($newToken) {
            $adapter = new DropboxAdapter(new DropboxClient($newToken));

            return new FilesystemAdapter(
                new Filesystem($adapter, $config),
                $adapter,
                $config
            );
        });
    }
}