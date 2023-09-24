<?php

namespace App\Providers;

use App\Interfaces\Download;
use Illuminate\Support\Facades\Http;

class LaravelHttpProvider implements Download
{
    public function getContent($url): string
    {
        return Http::get($url);
    }
}
