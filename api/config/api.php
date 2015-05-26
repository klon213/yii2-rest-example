<?php

//$db
//$params = require(__DIR__ . '/params.php');
$config = [
	'id' => 'basic',
	'name' => 'TimeTracker',
	// Need to get one level up:
	'basePath' => dirname(__DIR__).'/..',
	'bootstrap' => ['log'],
	'components' => [
		'user' => [
			'identityClass' => 'common\models\User',
			'enableAutoLogin' => true,
		],
		'request' => [
			// Enable JSON Input:
			'parsers' => [
				'application/json' => 'yii\web\JsonParser',
			]
		],
		'log' => [
			'traceLevel' => YII_DEBUG ? 3 : 0,
			'targets' => [
				[
					'class' => 'yii\log\FileTarget',
					'levels' => ['error', 'warning'],
					// Create API log in the standard log dir
					// But in file 'api.log':
					'logFile' => '@app/runtime/logs/api.log',
				],
			],
		],
		'urlManager' => [
			'enablePrettyUrl' => true,
			'enableStrictParsing' => true,
			'showScriptName' => false,
			'rules' => [
				['class' => 'yii\rest\UrlRule', 'controller' => ['v1/project','v1/time']],
			],
		],
		'db' => [
			'class' => 'yii\db\Connection',
			'dsn' => 'mysql:host=localhost;dbname=admin',
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		],
	],
	'modules' => [
		'v1' => [
			'class' => 'app\api\modules\v1\Module',
		],
	],
	//'params' => $params,
];

return $config;