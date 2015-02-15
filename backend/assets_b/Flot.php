<?php
	/**
	 * Created by PhpStorm.
	 * User: zein
	 * Date: 7/3/14
	 * Time: 8:16 PM
	 */

	namespace backend\assets_b;


	use yii\web\AssetBundle;

	class Flot extends AssetBundle
	{
		public $sourcePath = '@bower/flot';
		public $js         = [
			'js/jquery.flot.js'
		];

		public $depends = [
			'\yii\web\JqueryAsset'
		];
	}