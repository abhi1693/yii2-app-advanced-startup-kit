<?php
	/**
	 * Created by PhpStorm.
	 * User: Abhimanyu
	 * Date: 01-03-2015
	 * Time: 21:33
	 */

	use abhimanyu\installer\helpers\enums\Configuration as Enum;
	use yii\helpers\Html;

?>

<footer class="footer">
	<div class="container">
		<p class="pull-left">&copy; <?= Yii::$app->config->get(Enum::APP_NAME) ?> <?= date('Y') ?></p>

		<p class="pull-right">Maintained By <?= Html::mailto('Admin', Yii::$app->config->get(Enum::ADMIN_EMAIL)) ?></p>
	</div>
</footer>