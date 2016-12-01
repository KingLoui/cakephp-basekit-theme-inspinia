<?php

$config = [
  'BaseKit' => [
      'Menu' => [
        'AdminMenu' => [
            'Theme' => [['uri' => '#', 'extras' => ['icon' => 'fa fa-paint-brush']],
              'Settings' => ['uri' => ['plugin' => 'KingLoui/BaseKit', "controller" => "Pages","action" => "display","theme_settings"]],
              'Documentation' => [['uri' => ['plugin' => 'KingLoui/BaseKit', "controller" => "Pages","action" => "display","theme_documentation"]],
                // 'Widgets' => ['uri' => ['plugin' => 'KingLoui/BaseKit', "controller" => "Pages","action" => "display","themeexamples","widgets"]],
                // 'Other Pages' => [['uri' => '#'],
                //   'Search results' => ['uri' => ['plugin' => 'KingLoui/BaseKit', "controller" => "Pages","action" => "display","themeexamples","otherpages","searchresults"]],
                //   'Lockscreen' => ['uri' => ['plugin' => 'KingLoui/BaseKit', "controller" => "Pages","action" => "display","themeexamples","otherpages","lockscreen"]]
                // ],
                // 'Forms' => [['uri' => ['plugin' => 'KingLoui/BaseKit', "controller" => "Pages","action" => "display","themeexamples","forms","basic"]],
                //   'Basic' => ['uri' => ['plugin' => 'KingLoui/BaseKit', "controller" => "Pages","action" => "display","themeexamples","forms","basic"]],
                //   'Advanced' => ['uri' => ['plugin' => 'KingLoui/BaseKit', "controller" => "Pages","action" => "display","themeexamples","forms","advanced"]]
                // ],
             ]
           ]
        ]
      ]
  ]
];
return $config;
  


