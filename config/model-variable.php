<?php

use App\Models\User;
use App\Models\Blog;


return [
    'models' =>[
        /*
        *User Table and Model
        */
        'user' =>[
            'table' => 'users',
            'class' => User::class,
        ],

          /*
        *Blog Table and Model
        */
        'blog' =>[
            'table' => 'blogs',
            'class' => Blog::class,
        ],
    ]
]
?>