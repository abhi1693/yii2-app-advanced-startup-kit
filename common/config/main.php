<?php
	return [
		'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
		'modules'    => [
			'user'      => [
				'class'  => \abhimanyu\user\UserModule::className(),
				'layout' => '@backend/views/layouts/admin'
			],
			'installer' => [
				'class' => \abhimanyu\installer\InstallerModule::className()
			],
			'gridview'  => [
				'class' => \kartik\grid\Module::className()
			],
		],
		'components' => [
			'db'         => [
				'class' => \yii\db\Connection::className(),
				'dsn'   => 'mysql:host=localhost;dbname='
			],
			'user'       => [
				'identityClass' => \abhimanyu\user\models\UserIdentity::className(),
				'loginUrl'      => ['/user/auth/login'],
			],
			'config'     => [
				'class' => \abhimanyu\config\components\Config::className(),
			],
			'urlManager' => [
				'enablePrettyUrl' => TRUE,
				'showScriptName'  => FALSE,
			],
		],
		'params'     => [
			'installed' => FALSE
		]
	];
