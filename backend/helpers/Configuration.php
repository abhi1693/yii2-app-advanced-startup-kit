<?php

	namespace backend\helpers;

	use backend\helpers\enums\Configuration as Enum;
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
			$config     = require($configFile);

			if (!is_array($config))
				return [];

			return $config;
		}

		public static function setConfig($config = [])
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

		/**
		 * Checks if the application is already configured.
		 */
		public static function isConfigured()
		{
			if (Yii::$app->config->get('secret') != '')
				return TRUE;

			return FALSE;
		}

		/**
		 * Rewrites the configuration file
		 */
		public static function rewriteConfiguration()
		{
			// Get Current Configuration
			$config = Configuration::getConfig();

			// Add Application Name to Configuration
			$config['name'] = Yii::$app->config->get(Enum::APP_NAME);

			// Add Caching
			$cacheClass = Yii::$app->config->get(Enum::CACHE_CLASS);
			if (!$cacheClass) {
				$cacheClass = 'yii\caching\FileCache';
			}
			$config['components']['cache'] = [
				'class' => $cacheClass
			];

			Configuration::setConfig($config);
		}

		/**
		 * Sets application in installed state (disables installer)
		 */
		public static function setInstalled()
		{
			// Set App secret
			Yii::$app->config->set(Enum::APP_SECRET, md5(uniqid(time(), TRUE)));

			// Set `installed` param to `true`
			$config                        = Configuration::getConfig();
			$config['params']['installed'] = TRUE;
			Configuration::setConfig($config);
		}
	}