<?php 

return  [

	'api_host' 							=> env('API_HOST', 'http://api4.oleks.id'),
 
    'client_id' 						=> env('CLIENT_ID', '23'),
    'client_secret' 					=> env('CLIENT_SECRET', '69d3299cc6cc45ad14898d216a64f424'),

    'partner_id'						=> env('PARTNER_ID', '12'),
    'partner_code'						=> env('PARTNER_CODE', 'ajakteman_dev'),
    'partner_secret'					=> env('PARTNER_SECRET', 'f71ce2af8ac732fba9e0a0a564b52083'),

    'social_client_id' 					=> env('SOCIAL_CLIENT_ID', '9'),
    'social_client_secret' 				=> env('SOCIAL_CLIENT_SECRET', 'klg28h7guki809klnjb45b6hjlnmb23451'),

    'must_registered_from_ajakteman' 	=> env('MUST_REGISTERED_FROM_AJAKTEMAN', true),
    'email_must_same_as_invited'        => env('EMAIL_MUST_SAME_AS_INVITED', true),
    'anyone_can_post_advert'            => env('ANYONE_CAN_POST_ADVERT', true),
];