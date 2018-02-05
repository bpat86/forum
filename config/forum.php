<?php

return [
    'administrators' => [
        'admin@example.com',
        'john@example.com',
        'b.patterson0486@gmail.com'
    ],
    'reputation' => [
        'thread_published' => 10,
        'reply_posted' => 2,
        'best_reply_awarded' => 50,
        'reply_favorited' => 5
    ],
    'support' => [
        'suspension' => empty(env('FORUM_SUPPORT_SUSPENSION_EMAIL')) ?
            env('FORUM_SUPPORT_EMAIL') :
            env('FORUM_SUPPORT_SUSPENSION_EMAIL')
    ]
];
