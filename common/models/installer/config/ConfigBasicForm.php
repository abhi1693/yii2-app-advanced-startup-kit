<?php

	namespace common\models\installer\config;

	use yii\base\Model;

	class ConfigBasicForm extends Model
	{
		public $name;
		public $email;

		/**
		 * Declares the validation rules.
		 */
		public function rules()
		{
			return [
				[['name', 'email'], 'required'],
				['email', 'email']
			];
		}

		/**
		 * Declares customized attribute labels.
		 * If not declared here, an attribute would have a label that is
		 * the same as its name with the first letter in upper case.
		 */
		public function attributeLabels()
		{
			return [
				'name'  => 'Name of your application',
				'email' => 'Administrator Email'
			];
		}
	}