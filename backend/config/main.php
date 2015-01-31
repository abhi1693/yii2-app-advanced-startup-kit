<?php
	$params = array_merge(
		require(__DIR__ . '/../../common/config/params.php'),
		require(__DIR__ . '/../../common/config/params-local.php'),
		require(__DIR__ . '/params.php'),
		require(__DIR__ . '/params-local.php'),
		require (__DIR__ . '/local/_settings.php')
	);

	return [
		'id'                  => 'app-practical-a-backend',
		'basePath'            => dirname(__DIR__),
		'controllerNamespace' => 'backend\controllers',
		'bootstrap'           => ['log'],
		'modules'             => [],
		'components'          => [
			'log'          => [
				'traceLevel' => YII_DEBUG ? 3 : 0,
				'targets'    => [
					[
						'class'  => 'yii\log\FileTarget',
						'levels' => ['error'],
					],
				],
			],
			'errorHandler' => [
				'errorAction' => 'site/error',
			],
		],
		'params'              => $params,
	];
