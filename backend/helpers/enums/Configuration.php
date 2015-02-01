<?php

	namespace backend\helpers\enums;

	use abhimanyu\enum\helpers\BaseEnum;

	class Configuration extends BaseEnum
	{
		// Basic Configs
		const APP_NAME = 'app.name';
		const APP_TOUR = 'tour';
		const APP_SECRET = 'secret';

		// Cache
		const CACHE_CLASS = 'cache.class';
		const CACHE_EXPIRE_TIME = 'cache.expireTime';

		// Admin
		const ADMIN_INSTALL_ID = 'admin.installationId';
		const ADMIN_EMAIL = 'admin.email';
	}