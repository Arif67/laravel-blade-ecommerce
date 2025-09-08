<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\GeneralSetting;
use App\Models\Category;
use App\Models\Brand;
use App\Models\SocialMedia;
use App\Models\Contact;
use App\Models\CreatePage;
use App\Models\OrderStatus;
use App\Models\EcomPixel;
use App\Models\GoogleTagManager;
use App\Models\Order;
use App\Models\PaymentGateway;
use Config;
use Session;
use Illuminate\Support\Facades\Cache;

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
        //Cache shurjopay credentials separately (config set, not shared in view)
        $shurjopay = Cache::remember('payment_shurjopay', 3600, function () {
            return PaymentGateway::where(['status' => 1, 'type' => 'shurjopay'])->first();
        });

        if ($shurjopay) {
            Config::set('shurjopay.apiCredentials.username', $shurjopay->username);
            Config::set('shurjopay.apiCredentials.password', $shurjopay->password);
            Config::set('shurjopay.apiCredentials.prefix', $shurjopay->prefix);
            Config::set('shurjopay.apiCredentials.return_url', $shurjopay->success_url);
            Config::set('shurjopay.apiCredentials.cancel_url', $shurjopay->return_url);
            Config::set('shurjopay.apiCredentials.base_url', $shurjopay->base_url);
        }

        // Group all shared frontend data into one cached array
        $sharedData = Cache::remember('shared_view_data', 3600, function () {
            return [
                'generalsetting' => GeneralSetting::where('status', 1)->first(),
                'sidecategories' => Category::where('parent_id', 0)->where('status', 1)->select('id', 'name', 'slug', 'status', 'image')->get(),
                'menucategories' => Category::where('status', 1)->select('id', 'name', 'slug', 'status', 'image')->get(),
                'contact' => Contact::where('status', 1)->first(),
                'socialicons' => SocialMedia::where('status', 1)->get(),
                'cmnmenu' => CreatePage::where('status', 1)->get(),
                'brands' => Brand::where('status', 1)->get(),
                'orderstatus' => OrderStatus::get(),
                'pixels' => EcomPixel::where('status', 1)->get(),
                'gtm_code' => GoogleTagManager::where('status', 1)->get(),
            ];
        });

        // Destructure and share
        foreach ($sharedData as $key => $value) {
            view()->share($key, $value);
        }

        // Fresh order data (cached for 10 seconds)
        view()->share('neworder', Cache::remember('neworder_count', 10, function () {
            return Order::where('order_status', 1)->count();
        }));
        view()->share('pendingorder', Cache::remember('pendingorder_list', 10, function () {
            return Order::where('order_status', 1)->latest()->limit(9)->get();
        }));
    }

}