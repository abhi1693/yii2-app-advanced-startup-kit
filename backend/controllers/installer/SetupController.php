<?php

	namespace backend\controllers\installer;

	use backend\helpers\Configuration;
	use backend\helpers\SystemCheck;
	use backend\models\installer\setup\DatabaseForm;
	use yii\db\Exception;
	use yii\web\Controller;
	use yii\web\Response;
	use yii\widgets\ActiveForm;
	use Yii;

	class SetupController extends Controller
	{
		public function actionIndex()
		{
			$this->redirect(Yii::$app->urlManager->createUrl('prerequisites'));
		}

		/**
		 * Prerequisites action checks application requirement using the SystemCheck
		 * Library
		 *
		 * (Step 2)
		 */
		public function actionPrerequisites()
		{
			$checks = SystemCheck::getResults();

			$hasError = FALSE;
			foreach ($checks as $check) {
				if ($check['state'] == 'ERROR')
					$hasError = TRUE;
			}

			// Render template
			return $this->render('prerequisites', ['checks' => $checks, 'hasError' => $hasError]);
		}

		/**
		 * Database action is responsible for all database related stuff.
		 * Checking given database settings, writing them into a config file.
		 *
		 * (Step 3)
		 */
		public function actionDatabase()
		{
			$success  = FALSE;
			$errorMsg = '';

			$config = Configuration::getConfig();
			$form   = new DatabaseForm();

			if ($form->load(Yii::$app->request->post())) {
				if (Yii::$app->request->isAjax) {
					Yii::$app->response->format = Response::FORMAT_JSON;

					return ActiveForm::validate($form);
				}


				if ($form->validate()) {
					$dsn = "mysql:host=" . $form->hostname . ";dbname=" . $form->database;
					// Create Test DB Connection
					Yii::$app->set('db', [
						'class'    => 'yii\db\Connection',
						'dsn'      => $dsn,
						'username' => $form->username,
						'password' => $form->password,
						'charset'  => 'utf8'
					]);

					try {
						Yii::$app->db->open();
						// Check DB Connection
						if (Yii::$app->db->getIsActive()) {
							// Write Config
							$config['components']['db']['class']    = 'yii\db\Connection';
							$config['components']['db']['dsn']      = $dsn;
							$config['components']['db']['username'] = $form->username;
							$config['components']['db']['password'] = $form->password;
							$config['components']['db']['charset']  = 'utf8';

							Configuration::setConfig($config);
							$success = TRUE;

							return $this->redirect(['init']);
						} else {
							$errorMsg = 'Incorrect configuration';
						}
					} catch (Exception $e) {
						$errorMsg = $e->getMessage();
					}
				}
			}

			return $this->render('database', ['model' => $form, 'success' => $success, 'errorMsg' => $errorMsg]);
		}

		/**
		 * The init action imports the database structure & initial data
		 */
		public function actionInit()
		{
			Yii::$app->db->open();
			if (!Yii::$app->db->getIsActive())
				return $this->redirect(Yii::$app->urlManager->createUrl('//installer/setup/database'));

			// Flush the caches
			Yii::$app->cache->flush();

			//todo Migrate Up the Database

			return $this->redirect(Yii::$app->urlManager->createUrl('//installer/config/index'));
		}
	}