<?php

// config for SolutionForest/FilamentUnlayer
return [

    /*
    |--------------------------------------------------------------------------
    |  Unlayer Configuration
    |--------------------------------------------------------------------------
    |
    |
    |
    */

    'display-mode' => 'web', // Default display mode
    'locale' => 'en-US', // Default locale
    'appearance' => [
        // appearance options to change the look and feel of the editor
    ],
    'user' => [
        // info of the user who is using the editor
    ],
    'mergeTags' => [
        // merge tags to display in the editor
    ],
    'designTags' => [
        // design tags
    ],
    'specialLinks' => [
        // special links
    ],
    'tools' => [
        // options for tools and custom tools
    ],
    'blocks' => [
        // custom blocks
    ],
    'editor' => [
        // editor options for different functions
    ],
    'fonts' => [
        // custom fonts
    ],
    'safeHtml' => false, // Sanitizes HTML output to prevent executable JavaScript
    'customJs' => [
        // custom JavaScript URL or source
    ],
    'customCss' => [
        // custom CSS URL or source
    ],
    'textDirection' => 'ltr', // text direction


    /*
    |--------------------------------------------------------------------------
    |  File Upload Configuration
    |--------------------------------------------------------------------------
    |
    |
    |
    */

    'customUpload' => true, // When set to false, it will use default unlayer file storage support built-in with Amazon S3


    'upload' => [
        'url' => '/filament-unlayer-upload',
        'class' => \SolutionForest\FilamentUnlayer\Services\UploadImage::class,
        'disk' => 'public',
        'path' => 'unlayer',
        'visibility' => 'public',
        'validation' => 'required|image',
        'middlewares' => [],
    ],
];
