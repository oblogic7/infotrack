<?php

return array(
    'providers' => array(
        'google' => array(
            'id' => '752006722661-o68o3mmotj3pe4fu7qagq0tt940aob82.apps.googleusercontent.com',
            'secret' => 'jitwzCsuiVYT3vEI7UGzMXou',
            'redirect' => URL::to('/google/login'),
            'scope' => array(
                'https://www.googleapis.com/auth/userinfo.profile',
                'https://www.googleapis.com/auth/userinfo.email',
            ),
        )
    )
);
