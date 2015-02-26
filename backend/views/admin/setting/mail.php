<?php
	/**
	 * Created by PhpStorm.
	 * User: Abhimanyu
	 * Date: 19-02-2015
	 * Time: 21:35
	 */

	use abhimanyu\installer\helpers\enums\Configuration as Enum;
	use kartik\alert\AlertBlock;
	use yii\helpers\Html;
	use yii\widgets\ActiveForm;

	/** @var $this \yii\web\View */
	/** @var $model \backend\models\MailFormSetting */

	$this->title = 'Mail Settings - ' . Yii::$app->name;

	echo AlertBlock::widget([
		                        'delay'           => 5000,
		                        'useSessionFlash' => TRUE
	                        ]);
?>

<div class="panel panel-default">
	<div class="panel-heading">Mail Settings</div>

	<div class="panel-body">
		<?php $form = ActiveForm::begin([
			                                'id'                   => 'mail-form',
			                                'enableAjaxValidation' => FALSE
		                                ]); ?>

		<div class="form-group">
			<?= $form->field($model, 'mailHost')->textInput([
				                                                'value'        => Yii::$app->config->get(Enum::MAILER_HOST),
				                                                'autofocus'    => TRUE,
				                                                'autocomplete' => 'off'
			                                                ]) ?>
		</div>

		<hr/>

		<div class="form-group">
			<?= $form->field($model, 'mailUsername')->textInput([
				                                                    'value'        => Yii::$app->config->get
				                                                    (Enum::MAILER_USERNAME),
				                                                    'autocomplete' => 'off'
			                                                    ]) ?>
		</div>

		<div class="form-group">
			<?= $form->field($model, 'mailPassword')->textInput([
				                                                    'value'        => Yii::$app->config->get
				                                                    (Enum::MAILER_PASSWORD),
				                                                    'autocomplete' => 'off'
			                                                    ]) ?>
		</div>

		<hr/>

		<div class="form-group">
			<?= $form->field($model, 'mailPort')->textInput([
				                                                'value'        => Yii::$app->config->get(Enum::MAILER_PORT),
				                                                'autocomplete' => 'off'
			                                                ]) ?>
		</div>

		<div class="form-group">
			<?= $form->field($model, 'mailEncryption')->dropDownList(
				[
					''    => 'Default',
					'ssl' => 'SSL',
					'tls' => 'TLS'
				],
				[
					'class'   => 'form-control',
					'options' =>
						[
							Yii::$app->config->get(Enum::MAILER_ENCRYPTION, NULL) =>
								[
									'selected ' => TRUE
								]
						]
				]) ?>
		</div>

		<div class="form-group">
			<div class="checkbox">
				<?= $form->field($model, 'mailUseTransport')->checkbox() ?>
			</div>
		</div>

		<hr/>

		<?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>

		<?php $form::end(); ?>
	</div>
</div>