<?php

namespace App\Http\Controllers;

use App\Models\Site;
use App\Providers\LaravelHttpProvider;
use App\Providers\StandardHttpProvider;
use App\Services\SiteService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function savePage()
    {
        $providerName = request()->query('provider', 'laravel');

        $site = new Site('https://google.com');
        if ($providerName == 'laravel') {
            $provider = new LaravelHttpProvider();
        } else {
            $provider = new StandardHttpProvider();
        }
        $siteService = new SiteService($site, $provider);
        $siteService->save();

        return view('done');
    }
}
