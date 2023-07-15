<?php

// return [
//     'api_key' => 'bPLTNTOvT_6ILMxCiEhfVg',
//     'api_secret' => 'aU742jC9MTQd0SBhEeUASQ4kf5zYgHXDcrpf',
//     'base_url' => 'https://api.zoom.us/v2/',
//     'token_life' => 60 * 60 * 24 * 7,
//     'authentication_method' => 'jwt',
//     'max_api_calls_per_request' => '5',
//     'ZOOM_SDK_CLIENT_KEY' => 'jzKFfA57USRaCNnyFkUV88UR0kaBBJcFEXc1',
//     'ZOOM_SDK_CLIENT_SECRET' => 'd9xb4XS3JkzE4eZjZfcm6citm1Bgph9MIoag'
// ];


return [
    'api_key' => '1V7rE-yTRQOvjbVrQAk6qg',
    'api_secret' => 'tcE57cO8Rzi2nN2TialonGjXCMJ1d2DR9Xwa',
    'base_url' => 'https://api.zoom.us/v2/',
    'token_life' => 60 * 60 * 24 * 7, // In seconds, default 1 week
    'authentication_method' => 'jwt', // Only jwt compatible at present but will add OAuth2
    'max_api_calls_per_request' => '5', // how many times can we hit the api to return results for an all() request
    'ZOOM_SDK_CLIENT_KEY' => 'SdBtb94qRNWNB6oRAmq7dw',
    'ZOOM_SDK_CLIENT_SECRET' => 'p6ExAARp30e2OfVUKkXRz5pZXrvjxyvU'
];


