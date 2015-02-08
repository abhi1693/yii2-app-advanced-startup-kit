<?php

	return [
		'components' => [
			'db' => [
				'class' => \yii\db\Connection::className(),
				'dsn'   => 'mysql:host=localhost;dbname='
			],
		],
		'params'     => [
			'installed' => FALSE
		]
	];