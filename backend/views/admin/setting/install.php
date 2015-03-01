<?php
	/**
	 * Created by PhpStorm.
	 * User: Abhimanyu
	 * Date: 01-03-2015
	 * Time: 18:44
	 */

	use yii\helpers\Html;
	use yii\widgets\ActiveForm;

	/** @var $this \yii\web\View */
	/** @var $model \backend\models\InstallerForm */

	$this->title = 'Application Installer - ' . Yii::$app->name;
?>
<div class="panel panel-danger">
	<div class="panel-heading">Restart Installer</div>

	<div class="panel-body">
		<?php $form = ActiveForm::begin([
			                                'enableAjaxValidation' => FALSE
		                                ]) ?>

		<div class="checkbox">
			<?= $form->field($model, 'install')->checkbox()->hint('Logout in order to invoke application installer') ?>
		</div>

		<?= Html::submitButton('Save', ['class' => 'btn btn-danger']) ?>

		<?php $form::end(); ?>
	</div>
</div>