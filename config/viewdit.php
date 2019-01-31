<?php

return [

	/*
    |--------------------------------------------------------------------------
    | Viewdit Route Middleware
    |--------------------------------------------------------------------------
    |
    | These middleware will get attached onto each Viewdit route, giving you
    | the chance to add your own middleware to this list or change any of
    | the existing middleware. Or, you can simply stick with this list.
    |
    */
    'middleware' => ['web'],

    /*
    |--------------------------------------------------------------------------
    | List resources
    |--------------------------------------------------------------------------
    | Paginate for the list resources with number of items per page
    */
    'paginate_limit' => 25,

];