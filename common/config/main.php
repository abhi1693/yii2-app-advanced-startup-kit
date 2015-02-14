<?php
	return [
		'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
		'components' => [
			'config'     => [
				'class' => \abhimanyu\config\components\Config::className()
			],
			'urlManager' => [
				'enablePrettyUrl' => TRUE,
				'showScriptName'  => FALSE,
			]
		],
	];
