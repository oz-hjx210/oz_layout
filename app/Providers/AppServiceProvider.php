<?php

namespace App\Providers;
use App\Filament\Resources\UserResource;
use App\Models\Newstp;
use App\Models\Sysset;
use App\Models\Prodtp;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;
use Filament\Facades\Filament;
use Filament\Navigation\NavigationItem;
use Filament\Navigation\UserMenuItem;
use Illuminate\Support\Facades\Validator;

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
        Model::unguard();
        Filament::serving(function () {
            Filament::registerNavigationItems([

               NavigationItem::make('元伸科技')
                ->url('https://ozchamp.com', shouldOpenInNewTab: true)
            ->icon('heroicon-o-presentation-chart-line')
                ->group('Suport')
                ->sort(3),
        ]);
        });
      //
            Filament::serving(function () {
                if(auth()->user()) {
                    Filament::registerUserMenuItems([
                        UserMenuItem::make()
                            ->label('修改資料')
                            ->url(UserResource::getUrl('edit', ['record' => auth()->user()]))
                            ->icon('heroicon-s-user'),

                    ]);
                }
            });

        $prodtps=Prodtp::orderBy('sort_order','desc')->get();
        $newstps=Newstp::orderBy('sort_order','desc')->get();
        view()->share('prodtps',  $prodtps);
        view()->share('newstps',  $newstps);

        Validator::extend('captcha', function ($attribute, $value, $parameters, $validator) {

             return strtolower($value) == strtolower(Session::get('captcha')) ;
        });

        $syssets=Sysset::get();
        foreach($syssets as $syset){
            config(['web.'.$syset['skey'] => $syset['sval']]);
        }


        config(['mail.mailers.smtp.host'=>Sysset::where('skey','smtp_host')->first()->sval]);
        config(['mail.mailers.smtp.username'=>Sysset::where('skey','smtp_user')->first()->sval]);
        config(['mail.mailers.smtp.password'=>Sysset::where('skey','smtp_pass')->first()->sval]);
        config(['mail.mailers.smtp.port'=>Sysset::where('skey','smtp_port')->first()->sval]);





    }
}
