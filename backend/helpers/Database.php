<?php

	namespace backend\helpers;

	use Yii;
	use yii\db\Exception;

	class Database
	{
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