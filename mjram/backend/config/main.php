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
                    'controller' => 'api/auth',
                    'pluralize' => false,
                    'tokens' => [
                        '{id}' => '<id:\\d[\\d,]*>',
                    ],
                    'extraPatterns' => [
                        'GET login'=>'login',
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
                        'GET {id}/utilizador' => 'getutilizador',
                        'GET {id}/utilizador/user' => 'getuser',
                        'GET {id}/role' => 'getrole',
                        'GET {id}/nib' => 'getnib'
                    ] ,

                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/recurso',
                    'pluralize' => false,
                    'tokens' => [
                        '{id}' => '<id:\\d[\\d,]*>',
                        //'{uni}' => '<uni:\\w+>',
                    ],
                    'extraPatterns' => [

                        'GET {id}/categoria'=>'getcategoria',
                        'GET {id}/unidade'=>'getunidade',
                        //'PUT {id}/atuninade/{uni}'=>'atualizarunidade'
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
                        'GET {id}/labelaviao' => 'getaviaolabel',
                        'GET {id}/aviao' => 'getaviao',
                        'GET {id}/companhia' => 'getcompanhia',
                        'GET {id}/ocupacoes' => 'getclasses',
                        'GET {id}/bilhete' => 'getbilhetes',
                        'GET /allvoo' => 'allvoo',
                    ] ,

                ],
            ],
        ],
    ],
    'params' => $params,
];
