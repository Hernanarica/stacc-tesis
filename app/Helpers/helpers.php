<?php

function createDirectoryIfNotExist(string $dir = ''): string
{
    if (! is_dir($dir)) {
        mkdir($dir, 0777, true);
    }

    return $dir;
}

function isActiveLink(string $link = ''): string
{
    $currentRoute = Route::currentRouteName();

    return $currentRoute === $link ? 'bg-gray-50' : '';
}
