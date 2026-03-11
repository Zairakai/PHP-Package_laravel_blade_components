<?php

declare(strict_types=1);

namespace Zairakai\LaravelBladeComponents;

class BladeHelpers
{
    /**
     * Retrieve the old input value for a form field, falling back to the given default.
     */
    public static function getOldValue(?string $name, mixed $value): mixed
    {
        if (is_null($name)) {
            return $value;
        }

        return old($name) ?? $value;
    }

    /**
     * Determine if the given string is a valid MIME type (e.g. "text/html", "image/png").
     */
    public static function isValidMimeType(string $type): bool
    {
        return (bool) preg_match('/^[a-z][\w!#$&\-^]*\/[a-z0-9][\w!#$&\-^.+]*$/i', $type);
    }

    /**
     * Determine if the current route name matches the given pattern.
     */
    public static function routeIs(string $route): bool
    {
        return request()->routeIs($route);
    }
}
