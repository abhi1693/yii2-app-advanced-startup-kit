<?php

	namespace backend\models\installer\setup;

	use yii\base\Model;

	/**
	 * DatabaseForm holds all required database settings.
	 */
	class DatabaseForm extends Model
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