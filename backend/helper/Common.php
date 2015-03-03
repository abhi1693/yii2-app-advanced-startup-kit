<?php
	/**
	 * Created by PhpStorm.
	 * User: Abhimanyu
	 * Date: 20-02-2015
	 * Time: 13:12
	 */

	namespace backend\helper;

	use yii\helpers\Html;

	class Common
	{

		public static function getVersion()
		{
			return 'v0.0.4-dev';
		}

		public static function getCreator()
		{
			return Html::mailto('Abhimanyu Saharan', 'abhimanyu@teamvulcans.com');
		}
	}