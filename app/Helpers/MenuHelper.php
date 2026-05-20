<?php

namespace App\Helpers;

class MenuHelper
{
    public static function isActive(?string $routeName): bool
    {
        if (!$routeName) {
            return false;
        }

        return request()->routeIs($routeName);
    }

    public static function hasActiveChild(array $children = []): bool
    {
        foreach ($children as $child) {
            if (isset($child['route']) && self::isActive($child['route'])) {
                return true;
            }
        }

        return false;
    }
}