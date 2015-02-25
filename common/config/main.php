<?php
	return [
		'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
		'modules'    => [
			'user'      => [
				'class' => \abhimanyu\user\UserModule::className()
			],
			'installer' => [
				'class' => \abhimanyu\installer\InstallerModule::className()
			],
			'gridview'  => [
				'class' => \kartik\grid\Module::className()
			]
		],
		'components' => [
			'user' => [
				'identityClass' => \abhimanyu\user\models\UserIdentity::className(),
				'loginUrl'      => ['/user/auth/login'],
			],
			'config'     => [
				'class' => \abhimanyu\config\components\Config::className()
			],
			'urlManager' => [
				'enablePrettyUrl' => TRUE,
				'showScriptName'  => FALSE,
			]
		],
	];
