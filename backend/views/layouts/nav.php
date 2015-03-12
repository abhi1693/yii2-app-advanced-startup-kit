<?php
	/**
	 * Created by PhpStorm.
	 * User: Abhimanyu
	 * Date: 01-03-2015
	 * Time: 21:30
	 */

	use abhimanyu\installer\helpers\enums\Configuration as Enum;
	use abhimanyu\user\models\Profile;
	use yii\bootstrap\Nav;
	use yii\bootstrap\NavBar;

	NavBar::begin([
		              'brandLabel' => Yii::$app->config->get(Enum::APP_NAME),
		              'brandUrl'   => Yii::$app->homeUrl,
		              'options'    => [
			              'class' => 'navbar-inverse navbar-fixed-top',
		              ],
	              ]);
	if (Yii::$app->user->isGuest) {
		$menuItems = [
			['label' => 'Login', 'url' => ['/user/auth/login']]
		];
	} else {
		$menuItems = [
			['label' => 'Home', 'url' => ['/site/index']],
			['label' => 'Admin Panel', 'url' => ['/admin/index'], 'visible' =>
				Yii::$app->user->identity->isAdmin],
			[
				'label' => Profile::findOne(['uid' => Yii::$app->user->getId()])
				['name_first'] ?: Yii::$app->user->identity->username,
				'items' => [
					['label' => 'Account Settings', 'url' => ['/user/account/profile']],
					['label' => 'Logout', 'url' => ['/user/auth/logout'], 'linkOptions' => ['data-method' => 'post']]
				]
			]
		];
	}

	echo Nav::widget([
		                 'options' => ['class' => 'navbar-nav navbar-right'],
		                 'items'   => $menuItems,
	                 ]);
	NavBar::end();