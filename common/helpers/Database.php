<?php

	namespace common\helpers;

	use Yii;
	use yii\db\Exception;

	/**
	 * Class Database - Performs checks and database related operations
	 *
	 * @package common\helpers
	 */
	class Database
	{
		/**
		 * Checks whether the connection exists. If not, then opens up a
		 * new connection.
		 *
		 * @return bool
		 * @throws \yii\base\InvalidConfigException
		 * @throws \yii\db\Exception
		 */
		public static function checkConnection()
		{
			// Check is open
			if (Yii::$app->db->getIsActive())
				return TRUE;

			// Open connection
			else {
				try {
					Yii::$app->db->open();

					return TRUE;
				} catch (Exception $e) {
					print_r($e->getMessage());
				}
			}

			// Error occurred
			return FALSE;
		}
	}