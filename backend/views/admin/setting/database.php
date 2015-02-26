<?php
	/**
	 * Created by PhpStorm.
	 * User: Abhimanyu
	 * Date: 26-02-2015
	 * Time: 23:39
	 */

	use yii\widgets\ActiveForm;

	/** @var $this \yii\web\View */
	/** @var $model \backend\models\DatabaseSettingForm */

	$this->title = 'Database Settings - ' . Yii::$app->name;
?>

<?= $this->render('/alert') ?>

<div id="database-form" class="panel panel-default">
	<div class="panel-heading">Database Setting</div>
	<div class="panel-body">

		<?php
			$form = ActiveForm::begin([
				                          'enableAjaxValidation' => FALSE,
			                          ]);
		?>

		<hr/>

		<div class="form-group">
			<?=
				$form->field($model, 'hostname')->textInput([
					                                            'autofocus'    => 'on',
					                                            'autocomplete' => 'off',
					                                            'class'        => 'form-control'
				                                            ])->hint('You should be able to get this info from your web host, if localhost does not work.') ?>
		</div>

		<hr/>

		<div class="form-group">
			<?=
				$form->field($model, 'username')->textInput([
					                                            'autocomplete' => 'off',
					                                            'class'        => 'form-control'
				                                            ])->hint('Your MySQL username') ?>
		</div>

		<hr/>

		<div class="form-group">
			<?=
				$form->field($model, 'password')->passwordInput([
					                                                'class' => 'form-control'
				                                                ])->hint('Your MySQL password') ?>
		</div>

		<hr/>

		<div class="form-group">
			<?=
				$form->field($model, 'database')->textInput([
					                                            'autocomplete' => 'off',
					                                            'class'        => 'form-control'
				                                            ])->hint('The name of the database you want to run your application in.') ?>
		</div>

		<hr/>

		<?= \yii\helpers\Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>

		<?php \yii\widgets\ActiveForm::end(); ?>
	</div>
</div>