<?php

namespace App\Providers;

use App\SocialNetworkBadge;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Validator::extend('snb', function ($attribute, $value, $parameters,  $validator) {
            $data = $validator->getData();
            $badge = SocialNetworkBadge::whereId($data['social_network_badge_id'])->select('pattern')->first();
            $v = Validator::make($data, [
                'link' =>  'required|regex:'.$badge->pattern
            ]);
            return $v->passes();
        });
    }
}
