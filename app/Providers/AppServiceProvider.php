<?php

namespace App\Providers;

use App\Models\Channel;
use App\Mixins\StrMixins;
use Illuminate\Support\Str;
use App\PostCardSendingService;
use App\Billing\BankPaymentGateway;
use Illuminate\Support\Facades\View;
use App\Billing\CreditPaymentGateway;
use App\Billing\PaymentGatewayContract;
use Illuminate\Routing\ResponseFactory;
use Illuminate\Support\ServiceProvider;
use App\Http\View\Composers\ChannelsComposer;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        app()->bind(PaymentGatewayContract::class, function($app)
        {
            if (request()->has('credit'))
                return new CreditPaymentGateway(500);

            return new BankPaymentGateway(500, $app);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Str::mixin(new StrMixins());

        ResponseFactory::macro('errorJson', function ($message = 'This is the error') {
            return [
                'message' => $message,
                'error_code' => 123
            ];
        });

        // Option 1
        // View::share('channels', Channel::orderBy('name')->get());

        // Option 2
        // View::composer(['post.*', 'channel.index'], function ($view)
        // {
        //     $view->with('channels', Channel::orderBy('name')->get());
        // });

        // Option 3
        View::composer('partials.channels.*', ChannelsComposer::class);

        app()->singleton('PostCard', function ($app)
        {
            return new PostCardSendingService('us', 4, 6);
        });
    }
}
