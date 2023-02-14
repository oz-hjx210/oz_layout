<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Profiles
    |--------------------------------------------------------------------------
    |
    | You can add as many as you want of profiles to use it in your application.
    |
    */

    'profiles' => [

        'default' => [
            'plugins' => 'advlist autoresize codesample directionality emoticons fullscreen hr image imagetools link lists media table toc code wordcount',
            'toolbar' => 'code undo redo removeformat | formatselect fontsizeselect | bold italic | rtl ltr | alignjustify alignright aligncenter alignleft | numlist bullist | forecolor backcolor | image link media  | blockquote table toc hr  | wordcount fullscreen',
            'verify_html'=> false,
             'valid_elements'=> '*[*]',
            'valid_children'=> '*[*]',
            'paste_webkit_styles'=>true,
            'extended_valid_elements'=> 'button[*],i[*],img[class|src|border=0|alt|title|hspace|vspace|width|height|align|onmouseover|onmouseout|name]',

        ],

        'simple' => [
            'plugins' => 'autoresize directionality emoticons link wordcount image imagetools link lists media code' ,
            'toolbar' => '  image      |  code fullscreen',
            'verify_html'=>false,
        ],

        'template' => [
            'plugins' => 'autoresize template',
            'toolbar' => 'template',
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Templates
    |--------------------------------------------------------------------------
    |
    | You can add as many as you want of templates to use it in your application.
    |
    | https://www.tiny.cloud/docs/plugins/opensource/template/#templates
    |
    | ex: TinyEditor::make('content')->profiles('template')->templates('example')
    */

    'templates' => [

        'example' => [
            // content
            ['title' => 'Some title 1', 'description' => 'Some desc 1', 'content' => 'My content'],
            // url
            ['title' => 'Some title 2', 'description' => 'Some desc 2', 'url' =>  env('APP_URL', 'https://22i0260.works.tw/')],
        ],

    ],
];
