<?php

use abhimanyu\installer\helpers\enums\Configuration as Enum;
use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = Yii::$app->config->get(Enum::APP_NAME);
?>

<style>
	.circle {
		display: inline-block;
		border-radius: 50%;
		border: 2px solid #555;
		width: 200px;
		height: 200px;
		margin-left: auto;
		margin-right: auto;
		text-align: center;
		padding-top: 75px;
		margin: 0 30px;
		font-size: 18px;
		color: #555;
	}

	.circle:hover, .circle:focus {
		text-decoration: none;
		color: #7DB4B5;
		border-color: #7DB4B5;
	}

	.circle i {
		font-size: 30px;
		margin-bottom: 10px;
	}
</style>

<div class="site-index">

	<div class="jumbotron">
		<h1>Congratulations!</h1>

		<p class="lead">You have successfully created your Yii-powered application.</p>

		<p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>

		<br/>

		<div class="body-content">

			<?php if (!Yii::$app->params[Enum::APP_INSTALLED]): ?>
				<?= Html::a('<i class="glyphicon glyphicon-save"></i> Install Application', ['/backend/installer/install/index'], [
					'target' => '_blank',
					'class'  => 'circle'
				]) ?>

			<?php else: ?>
				<?= Html::a('<i class="glyphicon glyphicon-wrench"></i> Control Panel', ['/backend/'], [
					'target' => '_blank',
					'class'  => 'circle'
				]) ?>
			<?php endif; ?>

			<?= Html::a('<i class="glyphicon glyphicon-book"></i> Documentation', 'http://abhi1693.github.io/yii2-app-advanced-startup-kit/', [
				'target' => '_blank',
				'class'  => 'circle'
			]) ?>

			<hr/>

			<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
				<input type="hidden" name="cmd" value="_s-xclick">
				<input type="hidden" name="hosted_button_id" value="7PYYQRY3NHL6G">
				<input type="image" src="https://www.paypalobjects.com/en_GB/i/btn/btn_donate_SM.gif" border="0"
				       name="submit" alt="PayPal – The safer, easier way to pay online.">
				<img alt="" border="0" src="https://www.paypalobjects.com/en_GB/i/scr/pixel.gif" width="1" height="1">
			</form>

		</div>
	</div>
</div>
