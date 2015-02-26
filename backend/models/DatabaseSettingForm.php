<?php
	/**
	 * Created by PhpStorm.
	 * User: Abhimanyu
	 * Date: 26-02-2015
	 * Time: 23:38
	 */

	namespace backend\models;

	class DatabaseSettingForm extends \yii\base\Model
	{
		public $hostname;
		public $username;
		public $password;
		public $database;

		public function rules()
		{
			return [
				[['hostname', 'username', 'database'], 'required'],
				[['password'], 'safe']
			];
		}

		public function attributeLabels()
		{
			return [
				'hostname' => 'Hostname',
				'username' => 'Username',
				'password' => 'Password',
				'database' => 'Name of Database'
			];
		}
	}