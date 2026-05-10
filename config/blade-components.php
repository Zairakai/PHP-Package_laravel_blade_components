<?php

declare(strict_types=1);

return [
    /*
    |--------------------------------------------------------------------------
    | Password component
    |--------------------------------------------------------------------------
    |
    | min_characters : minimum password length enforced via pattern attribute.
    | show_toggle    : whether to render the show/hide eye button by default.
    |
    */
    'password' => [
        'min_characters' => 8,
        'show_toggle'    => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Email component
    |--------------------------------------------------------------------------
    |
    | Regex pattern applied to the email input for browser-side validation.
    | Override to use a stricter pattern if needed.
    |
    */
    'email' => [
        'pattern' => '[^@]+@[^@]+\.[a-zA-Z]{2,}',
    ],

    /*
    |--------------------------------------------------------------------------
    | Select component
    |--------------------------------------------------------------------------
    |
    | Default icon displayed after the select element (Material Symbols name).
    | Set to null to disable the icon.
    |
    */
    'select' => [
        'icon_after' => 'keyboard_arrow_down',
    ],
];
