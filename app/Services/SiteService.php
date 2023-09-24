<?php

namespace App\Services;

use App\Interfaces\Download;
use App\Models\Site;
use Illuminate\Support\Facades\Storage;

class SiteService
{
    private Site $site;
    private Download $provider;

    public function __construct(Site $site, Download $provider)
    {
        $this->site = $site;
        $this->provider = $provider;
    }

    public function save(): void
    {
        $content = $this->provider->getContent($this->site->getUrl());
        Storage::disk('local')->put('site_content.txt', $content);
    }

}
