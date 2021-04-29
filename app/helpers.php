<?php

use Illuminate\Support\Facades\Route;

if (!function_exists('currentRouteActive'))
{
    function currentRouteActive(...$routes)
    {
        foreach ($routes as $route) {
            if (Route::currentRouteName($route)) {
                return 'active';
            }
        }
    }
}

if (!function_exists('currentChildActive'))
{
    function currentChildActive($children)
    {
        foreach ($children as $child) {
            if (Route::currentRouteName($child['route'])) {
                return 'active';
            }
        }
    }
}

if (!function_exists('menuOpen'))
{
    function menuOpen($children)
    {
        foreach ($children as $child) {
            if (Route::currentRouteName($child['route'])) {
                return 'menu-open';
            }
        }
    }
}

if (!function_exists('isRole'))
{
    function isRole($role): string
    {
        return auth()->user()->role === $role;
    }
}
