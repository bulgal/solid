<?php

namespace App\Interfaces;

interface Download
{
    public function getContent($url): string;
}
