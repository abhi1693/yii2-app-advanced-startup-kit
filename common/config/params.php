<?php

	use abhimanyu\installer\helpers\enums\Configuration as Enum;

	return [
		Enum::CONFIG_FILE  => dirname(__FILE__) . '/main-local.php',
		Enum::MODULES_FILE => dirname(__FILE__) . '/main.php'
	];
