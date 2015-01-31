<?php

	namespace backend\helpers;

	use Yii;

	class Configuration
	{
		/**
		 * Returns the dynamic configuration file as array
		 *
		 * @return Array Configuration file
		 */
		public static function getConfig()
		{
			$configFile = Yii::$app->params['dynamicConfigFile'];
			$config = require($configFile);

			if (!is_array($config))
				return [];

			return $config;
		}

		public static function setConfig($config = array())
		{

			$configFile = Yii::$app->params['dynamicConfigFile'];

			$content = "<" . "?php return ";
			$content .= var_export($config, TRUE);
			$content .= "; ?" . ">";

			file_put_contents($configFile, $content);

			if (function_exists('opcache_reset')) {
				opcache_invalidate($configFile);
			}
		}
	}