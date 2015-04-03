<?php
/**
 * Created by PhpStorm.
 * User: Abhimanyu
 * Date: 18-02-2015
 * Time: 16:47
 */

use abhimanyu\installer\helpers\enums\Configuration as Enum;
use kartik\alert\AlertBlock;
use yii\caching\DbCache;
use yii\caching\FileCache;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var $this \yii\web\View */
/** @var $model \backend\models\BasicSettingForm */
/** @var $themes */

$this->title = 'Basic Settings - ' . Yii::$app->name;

echo AlertBlock::widget([
	'delay'           => 5000,
	'useSessionFlash' => TRUE
]);
?>

<div class="panel panel-default">
	<div class="panel-heading">Basic Settings</div>

	<div class="panel-body">
		<?php $form = ActiveForm::begin([
			'id'                   => 'basic-setting-form',
			'enableAjaxValidation' => FALSE,
		]); ?>

		<h4>Application Settings</h4>

		<div class="form-group">
			<?= $form->field($model, 'appName')->textInput([
				'value'        => Yii::$app->config->get(
					Enum::APP_NAME, 'Starter Kit'),
				'autofocus'    => TRUE,
				'autocomplete' => 'off'
			])
			?>
		</div>

		<div class="form-group">
			<?= $form->field($model, 'adminMail')->textInput([
				'value'        => Yii::$app->config->get(
					Enum::ADMIN_EMAIL, 'no@reply.com'),
				'autocomplete' => 'off'
			]) ?>
		</div>

		<hr/>

		<h4>Theme Settings</h4>

		<div class="form-group">
			<?= $form->field($model, 'appBackendTheme')->dropDownList($themes, [
				'class'   => 'form-control',
				'options' => [
					Yii::$app->config->get(Enum::APP_BACKEND_THEME, 'yeti') => ['selected ' => TRUE]
				]
			]) ?>
		</div>

		<div class="form-group">
			<?= $form->field($model, 'appFrontendTheme')->dropDownList($themes, [
				'class'   => 'form-control',
				'options' => [
					Yii::$app->config->get(Enum::APP_FRONTEND_THEME, 'readable') => ['selected ' => TRUE]
				]
			]) ?>
		</div>

		<hr/>

		<h4>Cache Setting</h4>

		<div class="form-group">
			<?= $form->field($model, 'cacheClass')->dropDownList(
				[
					FileCache::className() => 'File Cache',
					DbCache::className()   => 'Db Cache'
				],
				[
					'class'   => 'form-control',
					'options' => [
						Yii::$app->config->get(Enum::CACHE_CLASS, FileCache::className()) => ['selected ' => TRUE]
					]
				]) ?>
		</div>

		<hr/>

		<h4>Introduction Tour</h4>

		<div class="form-group">
			<div class="checkbox">
				<?= $form->field($model, 'appTour')->checkbox() ?>
			</div>
		</div>

		<?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>

		<?php $form::end(); ?>
	</div>
</div>