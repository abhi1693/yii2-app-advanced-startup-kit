<?php

	/**
	 * Created by PhpStorm.
	 * User: Abhimanyu
	 * Date: 01-03-2015
	 * Time: 18:49
	 */

	namespace backend\models;

	class InstallerForm extends \yii\base\Model
	{
		public $install;

		public function rules()
		{
			return [
				['install', 'boolean']
			];
		}

		public function attributeLabels()
		{
			return [
				'install' => 'Re-install Application'
			];
		}
	}