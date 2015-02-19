<?php
	/**
	 * Created by PhpStorm.
	 * User: Abhimanyu
	 * Date: 18-02-2015
	 * Time: 22:07
	 */

	namespace backend\models;

	use yii\base\Model;

	class BasicSettingForm extends Model
	{
		public $appName;
		public $appBackendTheme;
		public $appFrontendTheme;
		public $cacheClass;

		public function rules()
		{
			return [
				// Application Name
				['appName', 'required'],
				['appName', 'string', 'max' => 150],

				// Application Backend Theme
				['appBackendTheme', 'required'],

				// Application Frontend Theme
				['appFrontendTheme', 'required'],

				// Cache Class
				['cacheClass', 'required'],
				['cacheClass', 'string', 'max' => 128]
			];
		}

		public function attributeLabels()
		{
			return [
				'appName'          => 'Application Name',
				'appFrontendTheme' => 'Frontend Theme',
				'appBackendTheme'  => 'Backend Theme',
				'cacheClass'       => 'Cache Class'
			];
		}
	}