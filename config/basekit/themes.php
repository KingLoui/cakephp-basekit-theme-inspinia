<?php

$config = [
	'BaseKitThemeInspinia' => [
		'Skin' => false,
		'Boxed' => false,
		'Sidebar' => [
			'HeaderElement' => 'userinfo',
			'ShowThemeExamples' => true,
			'ShowThemeSettings' => true,
			'HeaderLogo' => 'BK',
			'Collapse' => false,
			'Fixed' => true,
			'ShowHideEffect' => 'push'
		],
		'NavTop' => [
			'TopLinksElement' => 'toplinks',
			'Fixed' => true,
			'FixedFullWidth' => false
		]
	],
	// set auth flash element to use bootstrap ui helper
	'Auth' => [
        'flash' => [
            'element' => 'error',
            'key' => 'auth'
        ]
    ]
];
return $config;
