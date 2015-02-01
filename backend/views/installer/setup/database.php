<div id="database-form" class="panel panel-default animated fadeIn">
	<!-- todo: change image url with php code -->
	<div class="install-header install-header-small" style="background-image: url('../../assets_b/img/install-header.jpg')">
		<h2 class="install-header-title"><strong>Database</strong> Configuration!</h2>
	</div>
	<div class="panel-body">
		<p>Below you have to enter your database connection details. If you’re not sure about these, please contact your
			administrator or web host.</p>

		<?php
			$form = \yii\widgets\ActiveForm::begin([
				                                       'id'                   => 'database-form',
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

		<?php if ($success) { ?>
			<div class="alert alert-success">
				Yes, database connection works!
			</div>
		<?php } elseif (!empty($errorMsg)) { ?>
			<div class="alert alert-danger">
				<strong><?= $errorMsg ?></strong>
			</div>
		<?php } ?>

		<?= \yii\helpers\Html::submitButton('Next', ['class' => 'btn btn-primary']) ?>

		<?php \yii\widgets\ActiveForm::end(); ?>
	</div>
</div>