<?php

	namespace backend\controllers\installer;

	use backend\helpers\Configuration;
	use backend\helpers\Database;
	use backend\helpers\enums\Configuration as Enum;
	use backend\models\installer\config\ConfigBasicForm;
	use Yii;
	use yii\bootstrap\ActiveForm;
	use yii\web\Controller;
	use yii\web\Response;

	/**
	 * ConfigController allows initial configuration of your application.
	 * E.g. Name of Network, Root User
	 *
	 * ConfigController can only run after SetupController wrote the initial
	 * configuration.
	 *
	 * @author Abhimanyu Saharan
	 */
	class ConfigController extends Controller
	{
		public $layout = 'setup';

		/**
		 * Before each config controller action check if
		 *  - Database Connection works
		 *  - Database Migrated Up
		 *  - Not already configured (e.g. update)
		 *
		 * @param $action
		 *
		 * @return bool
		 */
		public function beforeAction($action)
		{
			// Flush caches
			if (Yii::$app->cache) {
				Yii::$app->cache->flush();
			}

			// Check DB Connection
			if (!Database::checkConnection()) {
				return $this->redirect(Yii::$app->urlManager->createUrl('//installer/setup/'));
			}

			// When not at index action, verify that database is not already configured
			if ($action->id != 'finished') {
				if (Configuration::isConfigured()) {
					return $this->redirect(Yii::$app->urlManager->createUrl('finished'));
				}
			}

			return TRUE;
		}

		/**
		 * Index is only called on fresh databases, when there are already settings
		 * in database, the user will directly redirected to actionFinished()
		 */
		public function actionIndex()
		{
			if (Database::checkConnection()) {
				$this->setupInitialData();

				return $this->redirect(Yii::$app->urlManager->createUrl('//installer/config/basic'));
			}

			return $this->redirect(Yii::$app->urlManager->createUrl('//installer/setup/database'));
		}

		public function actionBasic()
		{
			$form       = new ConfigBasicForm();
			$form->name = Yii::$app->config->get(Enum::APP_NAME);

			if ($form->load(Yii::$app->request->post())) {
				if (Yii::$app->request->isAjax) {
					Yii::$app->response->format = Response::FORMAT_JSON;

					return ActiveForm::validate($form);
				}

				if ($form->validate()) {
					// Set some default settings
					Yii::$app->config->set([
						                       Enum::APP_NAME    => $form->name,
						                       Enum::ADMIN_EMAIL => $form->email
					                       ]);

					return $this->redirect(Yii::$app->urlManager->createUrl('//installer/config/admin'));
				}
			}

			return $this->render('basic', ['model' => $form]);
		}

		/**
		 * Setup Administrative User
		 *
		 * This should be the last step, before the user is created also the
		 * application secret will created.
		 */
		public function actionAdmin()
		{
			//return $this->render('admin');
			return $this->redirect(Yii::$app->urlManager->createUrl('//installer/config/finished'));
		}

		/**
		 * Last Step, finish up the installation
		 */
		public function actionFinished()
		{
			// Rewrite whole configuration file, also sets application
			// in installed state.
			Configuration::rewriteConfiguration();

			// Set to installed
			Configuration::setInstalled();

			return $this->render('finished');
		}

		/**
		 * Setup some initial database settings.
		 *
		 * This will be done at the first step.
		 */
		private function setupInitialData()
		{
			// Application Title
			Yii::$app->config->set(Enum::APP_NAME, 'Starter Kit');

			// Caching
			Yii::$app->config->set(Enum::CACHE_CLASS, 'yii\caching\DbCache');
			Yii::$app->config->set(Enum::CACHE_EXPIRE_TIME, '3600');

			// Admin
			Yii::$app->config->set(Enum::ADMIN_INSTALL_ID, md5(uniqid('', TRUE)));

			// Basic
			Yii::$app->config->set(Enum::APP_TOUR, '1');
		}
	}