<?php
	/**
	 * Created by PhpStorm.
	 * User: Abhimanyu
	 * Date: 19-02-2015
	 * Time: 00:58
	 */

	namespace backend\models;

	use yii\base\Model;

	class MailFormSetting extends Model
	{
		public $mailHost;
		public $mailUsername;
		public $mailPassword;
		public $mailPort;
		public $mailEncryption;
		public $mailUseTransport;

		public function rules()
		{
			return [
				// Host
				['mailHost', 'required'],
				['mailHost', 'string', 'max' => 255],

				// Username
				['mailUsername', 'required'],
				['mailUsername', 'string', 'max' => 255],

				// Password
				['mailPassword', 'required'],
				['mailPassword', 'string', 'max' => 255],

				// Port
				['mailPort', 'required'],
				['mailPort', 'integer'],

				// Encryption
				['mailEncryption', 'string', 'max' => 10],

				// Use Transport
				['mailUseTransport', 'boolean']
			];
		}

		public function attributeLabels()
		{
			return [
				'mailHost'         => 'Host',
				'mailUsername'     => 'Username',
				'mailPassword'     => 'Password',
				'mailPort'         => 'Port',
				'mailEncryption'   => 'Encryption',
				'mailUseTransport' => 'Use Transport'
			];
		}
	}