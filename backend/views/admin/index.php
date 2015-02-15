<?php
	/**
	 * Created by PhpStorm.
	 * User: Abhimanyu
	 * Date: 15-02-2015
	 * Time: 10:51
	 */

	use trntv\systeminfo\SI;

	/** @var $this \yii\web\View */

	$this->title = 'Admin Panel - ' . Yii::$app->name;
	$this->registerJsFile('/js/system-information/index.js',
	                      [
		                      'depends' =>
			                      [
				                      \yii\web\JqueryAsset::className(),
				                      \backend\assets_b\Flot::className(),
			                      ]
	                      ]);
?>

<div id="system-information">
	<div class="row">
		<div class="col-lg-6 col-xs-12">
			<div class="box box-primary">
				<div class="box-header">
					<i class="glyphicon glyphicon-hdd"></i>

					<h3 class="box-title">Processor</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<dl class="dl-horizontal">
						<dt>Processor</dt>
						<dd><?= SI::getCpuinfo('model name') ?></dd>

						<dt>Processor Architecture</dt>
						<dd><?= SI::getArchitecture() ?></dd>

						<dt>Number of cores</dt>
						<dd><?= SI::getCpuCores() ?></dd>
					</dl>
				</div>
				<!-- /.box-body -->
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12">
			<div class="box box-primary">
				<div class="box-header">
					<i class="glyphicon glyphicon-hdd"></i>

					<h3 class="box-title">Operating System</h3>
				</div>

				<div class="box-body">
					<dl class="dl-horizontal">
						<dt>OS</dt>
						<dd><?= SI::getOS() ?></dd>

						<dt>OS Release</dt>
						<dd><?= SI::getOSRelease() ?></dd>

						<dt>Kernel version</dt>
						<dd><?= SI::getKernelVersion() ?></dd>
					</dl>
				</div>
			</div>
		</div>

		<div class="col-lg-4 col-md-6 col-sm-12">
			<div class="box box-primary">
				<div class="box-header">
					<i class="glyphicon glyphicon-time"></i>

					<h3 class="box-title">Time</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<dl class="dl-horizontal">
						<dt>System Date</dt>
						<dd><?= Yii::$app->formatter->asDate(time()) ?></dd>

						<dt>System Time</dt>
						<dd><?= Yii::$app->formatter->asTime(time()) ?></dd>

						<dt>Timezone</dt>
						<dd><?= date_default_timezone_get() ?></dd>
					</dl>
				</div>
				<!-- /.box-body -->
			</div>
		</div>

		<div class="col-lg-4 col-md-6 col-sm-12">
			<div class="box box-primary">
				<div class="box-header">
					<i class="fa fa-hdd-o"></i>

					<h3 class="box-title">Network</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<dl class="dl-horizontal">
						<dt>Hostname</dt>
						<dd><?= SI::getHostname() ?></dd>

						<dt>Internal IP</dt>
						<dd><?= SI::getServerIP() ?></dd>

						<dt>External IP</dt>
						<dd><?= SI::getExternalIP() ?></dd>
					</dl>
				</div>
				<!-- /.box-body -->
			</div>
		</div>

		<div class="col-lg-4 col-md-6 col-sm-12">
			<div class="box box-primary">
				<div class="box-header">
					<i class="fa fa-hdd-o"></i>

					<h3 class="box-title">Software</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<dl class="dl-horizontal">
						<dt>Web Server</dt>
						<dd><?= SI::getServerSoftware() ?></dd>

						<dt>PHP Version</dt>
						<dd><?= SI::getPhpVersion() ?></dd>
					</dl>
				</div>
				<!-- /.box-body -->
			</div>
		</div>
	</div>
</div>