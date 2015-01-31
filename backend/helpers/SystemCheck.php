<?php

	namespace backend\helpers;

	use Yii;

	/**
	 * SelfTest is a helper class which checks all dependencies of the application.
	 *
	 * @since  1.0
	 * @author Abhimanyu Saharan
	 */
	class SystemCheck
	{
		/**
		 * Get Results of the Application SystemCheck.
		 *
		 * Fields
		 *  - title
		 *  - state (OK, WARNING or ERROR)
		 *  - hint
		 *
		 * @return Array
		 */
		public static function getResults()
		{
			/**
			 * ['title']
			 * ['state']    = OK, WARNING, ERROR
			 * ['hint']
			 */
			$checks = array();

			// Checks PHP Version
			$title = 'PHP - Version - ' . PHP_VERSION;

			# && version_compare(PHP_VERSION, '5.9.0', '<')
			if (version_compare(PHP_VERSION, '5.4.0', '>=')) {
				$checks[] = array(
					'title' => $title,
					'state' => 'OK'
				);
			} elseif (version_compare(PHP_VERSION, '5.3.0', '<=')) {
				$checks[] = array(
					'title' => $title,
					'state' => 'ERROR',
					'hint'  => 'Minimum 5.4'
				);
			}

			// Checks GD Extension
			$title = 'PHP - GD Extension';
			if (function_exists('gd_info')) {
				$checks[] = array(
					'title' => $title,
					'state' => 'OK'
				);
			} else {
				$checks[] = array(
					'title' => $title,
					'state' => 'ERROR',
					'hint'  => 'Install GD Extension'
				);
			}

			// Checks Writable Config
			$title      = 'Permissions - Config';
			$configFile = dirname(Yii::$app->params['dynamicConfigFile']);
			if (is_writeable($configFile)) {
				$checks[] = array(
					'title' => $title,
					'state' => 'OK'
				);
			} else {
				$checks[] = array(
					'title' => $title,
					'state' => 'ERROR',
					'hint'  => 'Make ' . $configFile . " writable"
				);
			}

			// Check Runtime Directory
			$title = 'Permissions - Runtime';
			if (is_writable(Yii::$app->runtimePath)) {
				$checks[] = array(
					'title' => $title,
					'state' => 'OK'
				);
			} else {
				$checks[] = array(
					'title' => $title,
					'state' => 'ERROR',
					'hint'  => 'Make ' . Yii::$app->runtimePath . ' writable'
				);
			}

			return $checks;
		}
	}