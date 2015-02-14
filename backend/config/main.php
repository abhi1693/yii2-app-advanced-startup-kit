<?php
	$params = array_merge(
		require(__DIR__ . '/../../common/config/params.php'),
		require(__DIR__ . '/../../common/config/params-local.php'),
		require(__DIR__ . '/params.php'),
		require(__DIR__ . '/params-local.php')
	);

	return [
		'id'                  => 'app-backend',
		'basePath'            => dirname(__DIR__),
		'controllerNamespace' => 'backend\controllers',
		'bootstrap'           => ['log'],
		'modules'             => [
			'user'      => [
				'class' => \abhimanyu\user\UserModule::className()
			],
			'installer' => [
				'class' => \abhimanyu\installer\InstallerModule::className()
			]
		],
		'components'          => [
			'user'         => [
				'identityClass' => \abhimanyu\user\models\UserIdentity::className(),
				'loginUrl'      => ['/user/auth/login'],
			],
			'log'          => [
				'traceLevel' => YII_DEBUG ? 3 : 0,
				'targets'    => [
					[
						'class'  => \yii\log\FileTarget::className(),
						'levels' => ['error', 'warning'],
					],
				],
			],
			'errorHandler' => [
				'errorAction' => 'site/error',
			],
		],
		'params'              => $params,
	];
