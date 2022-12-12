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
                    'controller' => 'api/default',
                    'pluralize' => false,
                    'tokens' => [
                        '{limite}'=>'<limite:\\w+>',
                    ],
                    'extraPatterns' => [
                        /*'GET total' => 'total',   // 'total' é 'actionTotal'
                        'GET {id}/morada' => 'morada', // 'morada' é 'actionMorada'
                        'GET set/{limite}' => 'set',   // 'set' é 'actionSet‘*/

                    ] ,
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/utilizador',
                    'pluralize' => false,
                    'tokens' => [

                    ],
                    'extraPatterns' => [
                        'GET list' => 'list',   // actionList
                    ] ,
                ],
            ],
        ],
    ],
    'params' => $params,
];
