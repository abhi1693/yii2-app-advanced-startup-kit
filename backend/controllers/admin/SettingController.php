<?php
/**
 * Created by PhpStorm.
 * User: Abhimanyu
 * Date: 18-02-2015
 * Time: 16:48
 */

namespace backend\controllers\admin;

use abhimanyu\installer\helpers\Configuration;
use abhimanyu\installer\helpers\enums\Configuration as Enum;
use abhimanyu\installer\helpers\SystemCheck;
use abhimanyu\installer\InstallerModule;
use backend\models\BasicSettingForm;
use backend\models\DatabaseSettingForm;
use backend\models\InstallerForm;
use backend\models\MailFormSetting;
use Yii;
use yii\db\Connection;
use yii\db\Exception;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;

class SettingController extends Controller
{
	public $layout = 'admin';

	public static function getMenuItems()
	{
		$menuItems = NULL;
		$menuItemPresets = [
			'user' => [
				'label' => 'Users',
				'icon'  => 'user',
				'items' => [
					['label' => 'Manage', 'url' => ['/user/admin'], 'icon' => 'user'],
					['label' => 'Settings', 'icon' => 'cog', 'items' => [
						[
							'label' => 'Basic',
							'url'   => ['/user/settings/index']
						],
						[
							'label' => 'Auth Clients',
							'url' => ['/user/settings/auth-client']
						]
					]]
				]
			],
		];
		$autoMenuItems = [
			[
				'url'   => ['/admin/index'],
				'label' => 'Home',
				'icon'  => 'home'
			],
			[
				'url'   => ['/admin/about'],
				'label' => 'About',
				'icon'  => 'info-sign'
			],
			[
				'label' => 'Website Settings',
				'icon'  => 'cog',
				'items' => [
					[
						'url'   => ['/admin/setting/index'],
						'label' => 'Basic',
					],
					[
						'url'   => ['/admin/setting/database'],
						'label' => 'Database'
					],
					[
						'url'   => ['/admin/setting/mail'],
						'label' => 'Mail'
					],
					[
						'url'   => ['/admin/setting/install'],
						'label' => 'Installer'
					],
					[
						'url'   => ['/admin/setting/self-test'],
						'label' => 'Self Test'
					]
				]
			]
		];

		foreach (Yii::$app->getModules() as $name => $m) {
			switch ($name) {
				case 'user':
					$menuItems[] = $menuItemPresets[$name];
					break;
			}
		}

		if (Yii::$app->user->isGuest)
			$menuItems = [];
		else
			$menuItems = ArrayHelper::merge($autoMenuItems, $menuItems);

		return $menuItems;
	}

	public function behaviors()
	{
		return [
			'access' => [
				'class' => AccessControl::className(),
				'rules' => [
					[
						'actions' => ['index', 'database', 'mail', 'install', 'self-test'],
						'allow'   => TRUE,
						'roles'   => ['@'],
					],
				],
			],
		];
	}

	public function actionIndex()
	{
		$model = new BasicSettingForm();
		$themes = SettingController::getThemes();
		$model->appTour = Yii::$app->config->get(Enum::APP_TOUR, '1');

		if ($model->load(Yii::$app->request->post())) {
			if ($model->validate()) {
				Yii::$app->config->set(Enum::APP_NAME, $model->appName);
				Yii::$app->config->set(Enum::ADMIN_EMAIL, $model->adminMail);
				Yii::$app->config->set(Enum::APP_BACKEND_THEME, $model->appBackendTheme);
				Yii::$app->config->set(Enum::APP_FRONTEND_THEME, $model->appFrontendTheme);
				Yii::$app->config->set(Enum::CACHE_CLASS, $model->cacheClass);
				Yii::$app->config->set(Enum::APP_TOUR, $model->appTour);

				$config = Configuration::get();
				$config['components']['cache'] = $model->cacheClass;
				Configuration::set($config);

				Yii::$app->session->setFlash('success', 'Settings Saved');
			}
		}

		return $this->render('index', ['model' => $model, 'themes' => $themes]);
	}

	private static function getThemes()
	{
		return [
			'cerulean'  => 'Cerulean',
			'cosmo'     => 'Cosmo',
			'cyborg'    => 'Cyborg',
			'darkly'    => 'Darkly',
			'flatly'    => 'Flatly',
			'journal'   => 'Journal',
			'lumen'     => 'Lumen',
			'paper'     => 'Paper',
			'readable'  => 'Readable',
			'sandstone' => 'Sandstone',
			'simplex'   => 'Simplex',
			'slate'     => 'Slate',
			'spacelab'  => 'Spacelab',
			'superhero' => 'Superhero',
			'united'    => 'United',
			'yeti'      => 'Yeti'
		];
	}

	public function actionDatabase()
	{
		$config = Configuration::get();
		$param = Configuration::getParam();

		$form = new DatabaseSettingForm();

		if ($form->load(Yii::$app->request->post())) {
			if ($form->validate()) {
				$dsn = "mysql:host=" . $form->hostname . ";dbname=" . $form->database;
				// Create Test DB Connection
				Yii::$app->set('db', [
					'class'    => Connection::className(),
					'dsn'      => $dsn,
					'username' => $form->username,
					'password' => $form->password,
					'charset'  => 'utf8'
				]);

				try {
					Yii::$app->db->open();
					// Check DB Connection
					if (InstallerModule::checkDbConnection()) {
						// Write Config
						$config['components']['db']['class'] = Connection::className();
						$config['components']['db']['dsn'] = $dsn;
						$config['components']['db']['username'] = $form->username;
						$config['components']['db']['password'] = $form->password;
						$config['components']['db']['charset'] = 'utf8';

						// Write config for future use
						$param['installer']['db']['installer_hostname'] = $form->hostname;
						$param['installer']['db']['installer_database'] = $form->database;
						$param['installer']['db']['installer_username'] = $form->username;

						Configuration::set($config);
						Configuration::setParam($param);

						Yii::$app->getSession()->setFlash('success', 'Database settings saved');
					} else {
						Yii::$app->getSession()->setFlash('danger', 'Incorrect configuration');
					}
				} catch (Exception $e) {
					Yii::$app->getSession()->setFlash('danger', $e->getMessage());
				}
			}
		} else {
			if (isset($param['installer']['db']['installer_hostname']))
				$form->hostname = $param['installer']['db']['installer_hostname'];

			if (isset($param['installer']['db']['installer_database']))
				$form->database = $param['installer']['db']['installer_database'];

			if (isset($param['installer']['db']['installer_username']))
				$form->username = $param['installer']['db']['installer_username'];
		}

		return $this->render('database', ['model' => $form]);
	}

	public function actionMail()
	{
		$model = new MailFormSetting();
		$model->mailUseTransport = Yii::$app->config->get(Enum::MAILER_USE_TRANSPORT) === 'true' ? '1' : '0';

		if ($model->load(Yii::$app->request->post())) {
			if ($model->validate()) {
				if ($model->mailUseTransport === '0')
					$model->mailUseTransport = FALSE;
				else
					$model->mailUseTransport = TRUE;

				Yii::$app->config->set(Enum::MAILER_HOST, $model->mailHost);
				Yii::$app->config->set(Enum::MAILER_USERNAME, $model->mailUsername);
				Yii::$app->config->set(Enum::MAILER_PASSWORD, $model->mailPassword);
				Yii::$app->config->set(Enum::MAILER_PORT, $model->mailPort);
				Yii::$app->config->set(Enum::MAILER_ENCRYPTION, $model->mailEncryption);
				Yii::$app->config->set(Enum::MAILER_USE_TRANSPORT, $model->mailUseTransport ? 'true' : 'false');

				$config = Configuration::get();
				$param = Configuration::getParam();

				$config['components']['mail']['useTransport'] = $model->mailUseTransport;
				$config['components']['mail']['transport']['host'] = $model->mailHost;
				$config['components']['mail']['transport']['username'] = $model->mailUsername;
				$config['components']['mail']['transport']['password'] = $model->mailPassword;
				$config['components']['mail']['transport']['port'] = $model->mailPort;
				$config['components']['mail']['transport']['encryption'] = $model->mailEncryption;

				// Write config for future use
				$param['installer']['mail']['useTransport'] = $model->mailUseTransport;
				$param['installer']['mail']['transport']['host'] = $model->mailHost;
				$param['installer']['mail']['transport']['username'] = $model->mailUsername;
				$param['installer']['mail']['transport']['password'] = $model->mailPassword;
				$param['installer']['mail']['transport']['port'] = $model->mailPort;
				$param['installer']['mail']['transport']['encryption'] = $model->mailEncryption;

				Configuration::set($config);
				Configuration::setParam($param);

				Yii::$app->session->setFlash('success', 'Mail Settings Saved');
			}
		}

		return $this->render('mail', ['model' => $model]);
	}

	public function actionInstall()
	{
		$model = new InstallerForm();
		$param = Configuration::getParam();

		if ($model->load(Yii::$app->request->post())) {
			$model->install = $model->install === '0' ? TRUE : FALSE;
			$param['installed'] = $model->install;

			Configuration::setParam($param);
		}

		return $this->render('install', ['model' => $model]);
	}

	public function actionSelfTest()
	{
		$checks = SystemCheck::getResults();

		$hasError = FALSE;
		foreach ($checks as $check) {
			if ($check['state'] == 'ERROR')
				$hasError = TRUE;
		}

		// todo make migration better
		$data = file_get_contents((dirname(__DIR__) . '/../../vendor/abhi1693/yii2-installer/migrations/data.sql'));
		Yii::$app->db->createCommand($data)->execute();

		return $this->render('self-test', ['checks' => $checks, 'hasError' => $hasError]);
	}
}