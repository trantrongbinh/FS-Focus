<?php

namespace App\Providers;

use App\Article;
use App\Discussion;
use App\Tools\FileManager\BaseManager;
use App\Tools\FileManager\UpyunManager;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Http\ViewComposers\CategoryComposer;
use App\Http\ViewComposers\TagComposer;
use App\Http\ViewComposers\HotPostComposer;
use App\Http\ViewComposers\UserComposer;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $lang = config('app.locale') != 'zh_cn' ? config('app.locale') : 'zh';
        \Carbon\Carbon::setLocale($lang);

        Relation::morphMap([
            'discussions' => Discussion::class,
            'articles'    => Article::class,
        ]);

        Schema::defaultStringLength(191);

        view()->composer('*', CategoryComposer::class);
        view()->composer('*', TagComposer::class);
        view()->composer('*', HotPostComposer::class);
        view()->composer('*', UserComposer::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('uploader', function ($app) {
            $config = config('filesystems.default', 'public');

            if ($config == 'upyun') {
                return new UpyunManager();
            }

            return new BaseManager();
        });
    }
}
