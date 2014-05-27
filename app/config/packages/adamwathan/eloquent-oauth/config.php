<?php

return array(
    'providers' => array(
        'google' => array(
            'id' => '357939817484.apps.googleusercontent.com',
            'secret' => '_c706IH88rSFHpevi5w49dbx',
            'redirect' => URL::to('/google/login'),
            'scope' => array(
                'https://www.googleapis.com/auth/userinfo.profile',
                'https://www.googleapis.com/auth/userinfo.email',
            ),
        )
    )
);
