<?php

namespace App\Providers;

use App\Interfaces\Download;

class StandardHttpProvider implements Download
{
    public function getContent($url): string
    {
        return file_get_contents($url);
    }
}
