<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'api' => [
            'class' => 'backend\modules\api\ModuleAPI',
        ],
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => \yii\log\FileTarget::class,
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/user',
                    'pluralize' => false,
                    'tokens' => [
                        '{id}' => '<id:\\d[\\d,]*>',
                    ],
                    'extraPatterns' => [
                    ] ,

                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/utilizador',
                    'pluralize' => false,
                    'tokens' => [
                        '{id}' => '<id:\\d[\\d,]*>',
                    ],
                    'extraPatterns' => [
                    ] ,

                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/funcionario',
                    'pluralize' => false,
                    'tokens' => [
                        '{id}' => '<id:\\d[\\d,]*>',
                    ],
                    'extraPatterns' => [
                    ] ,

                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/unidademedida',
                    'pluralize' => false,
                    'tokens' => [
                        '{id}' => '<id:\\d[\\d,]*>',
                    ],
                    'extraPatterns' => [
                    ] ,

                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/aviao',
                    'pluralize' => false,
                    'tokens' => [
                        '{id}' => '<id:\\d[\\d,]*>',
                    ],
                    'extraPatterns' => [
                    ] ,

                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/recurso',
                    'pluralize' => false,
                    'tokens' => [
                        '{id}' => '<id:\\d[\\d,]*>',
                    ],
                    'extraPatterns' => [
                    ] ,

                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/categoriarecurso',
                    'pluralize' => false,
                    'tokens' => [
                        '{id}' => '<id:\\d[\\d,]*>',
                    ],
                    'extraPatterns' => [
                    ] ,

                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/classe',
                    'pluralize' => false,
                    'tokens' => [
                        '{id}' => '<id:\\d[\\d,]*>',
                    ],
                    'extraPatterns' => [
                        '{id}/designacao'=>'designacao',
                    ] ,

                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/companhia',
                    'pluralize' => false,
                    'tokens' => [
                        '{id}' => '<id:\\d[\\d,]*>',
                    ],
                    'extraPatterns' => [
                    ] ,

                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/hangar',
                    'pluralize' => false,
                    'tokens' => [
                        '{id}' => '<id:\\d[\\d,]*>',
                    ],
                    'extraPatterns' => [
                    ] ,

                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/ocupacao',
                    'pluralize' => false,
                    'tokens' => [
                        '{id}' => '<id:\\d[\\d,]*>',
                    ],
                    'extraPatterns' => [
                    ] ,

                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/pedidorecurso',
                    'pluralize' => false,
                    'tokens' => [
                        '{id}' => '<id:\\d[\\d,]*>',
                    ],
                    'extraPatterns' => [
                    ] ,

                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/pista',
                    'pluralize' => false,
                    'tokens' => [
                        '{id}' => '<id:\\d[\\d,]*>',
                    ],
                    'extraPatterns' => [
                    ] ,

                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/tarefa',
                    'pluralize' => false,
                    'tokens' => [
                        '{id}' => '<id:\\d[\\d,]*>',
                    ],
                    'extraPatterns' => [
                    ] ,

                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/voo',
                    'pluralize' => false,
                    'tokens' => [
                        '{id}' => '<id:\\d[\\d,]*>',
                    ],
                    'extraPatterns' => [
                    ] ,

                ],
            ],
        ],
    ],
    'params' => $params,
];
