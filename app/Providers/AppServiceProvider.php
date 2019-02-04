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
use App\Http\ViewComposers\TeamComposer;

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
            'articles' => Article::class,
        ]);

        Schema::defaultStringLength(191);

        view()->composer([
            'article.create',
            'modules.left',
            'user.index'
        ], CategoryComposer::class);

        view()->composer([
            'modules.left',
            'article.create',
            'discussion.index'
        ], TagComposer::class);

        view()->composer('modules.hot-post', HotPostComposer::class);
        view()->composer('modules.right', UserComposer::class);
        view()->composer('modules.right', TeamComposer::class);
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
