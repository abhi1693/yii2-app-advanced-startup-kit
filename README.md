Yii2 Practical Application Advanced Template Startup-kit
========================================================

[![Gratipay User](https://img.shields.io/gratipay/user/abhi1693.svg?style=flat-square)](https://gratipay.com/~abhi1693)
[![Dependency Status](https://www.versioneye.com/user/projects/54e1e4630a910b08650001c6/badge.svg?style=flat)](https://www.versioneye.com/user/projects/54e1e4630a910b08650001c6)
[![Code Climate](https://codeclimate.com/github/abhi1693/yii2-app-advanced-startup-kit/badges/gpa.svg)](https://codeclimate.com/github/abhi1693/yii2-app-advanced-startup-kit)
[![Latest Stable Version](https://poser.pugx.org/abhi1693/yii2-app-advanced-startup-kit/v/stable.svg)](https://packagist.org/packages/abhi1693/yii2-app-advanced-startup-kit) [![Total Downloads](https://poser.pugx.org/abhi1693/yii2-app-advanced-startup-kit/downloads)](https://packagist.org/packages/abhi1693/yii2-app-advanced-startup-kit)

This is Yii2 start application template.
It was created and developing as a fast start for building an advanced sites based on Yii2.
It covers typical use cases for a new project and will help you not to waste your time doing the same work in every project

**Note: The application is still under development. Use it at your own risk**

DONATE
------

Any contribution helps us to improve [Yii2 Startup Kit](https://github.com/abhi1693/yii2-app-advanced-startup-kit), if you want to help us too but don't want to get into coding, we won't say no to PayPal

[![paypal](https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif)](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=EHXMKZ3NLKR7W)

FEATURES
--------
> Note: Some features are still under development. Please use it at your own risk

- Application Auto Installer includes:
  - Application Basic Setup such as Application Name, Cache type, backend/frontend theme etc.
  - Admin Account setup
  - Mailer Component setup
  - Auto migrate required tables required by the the application
- Based on yii2-advanced application template
- Beautiful and open source dashboard theme for backend
- Sign in, Sign up, profile(avatar, locale, personal data) etc
- OAuth authorization
- User management: CRUD
- RBAC
- Yii2 log web interface
- Application events component
- System information web interface
- many other features coming soon

REQUIREMENTS
------------

The minimum requirement by this application template that your Web server supports PHP 5.4.0.


INSTALLATION
------------

### Install via Composer

If you do not have [Composer](http://getcomposer.org/), you may install it by following the instructions
at [getcomposer.org](http://getcomposer.org/doc/00-intro.md#installation-nix).

You can then install the application using the following command:

```bash
composer global require "fxp/composer-asset-plugin:1.0.0"
composer create-project --prefer-dist --stability=dev abhi1693/yii2-app-advanced-startup-kit demo-app
```

### Install from GitHub

Extract the github archive file or clone this repository.

```bash
git clone https://github.com/abhi1693/yii2-app-advanced-startup-kit.git
```

After extraction run

```bash 
php composer.phar install
```

GETTING STARTED
---------------

After you install the application, just run `init` command (without altering anything in the `environment` folder) 
and select your environment then go to `http://yourhost/your-app/` and the application will help you setup everything else.

FAQ
---

See [FAQ](FAQ.md) for more details.

TESTING
-------

Install additional composer packages:
* `php composer.phar require --dev "codeception/codeception: 1.8.*@dev" "codeception/specify: *" "codeception/verify: *"`

This application boilerplate use database in testing, so you should create three databases that are used in tests:
* `yii2_practical_unit` - database for unit tests;
* `yii2_practical_functional` - database for functional tests;
* `yii2_practical_acceptance` - database for acceptance tests.

To make your database up to date, you can run in needed test folder `yii migrate`, for example
if you are starting from `frontend` tests then you should run `yii migrate` in each suite folder `acceptance`, `functional`, `unit`
it will upgrade your database to the last state according migrations.

To be able to run acceptance tests you need a running webserver. For this you can use the php builtin server and run it in the directory where your main project folder is located. For example if your application is located in `/www/practical` all you need to is:
`cd /www` and then `php -S 127.0.0.1:8080` because the default configuration of acceptance tests expects the url of the application to be `/practical/`.
If you already have a server configured or your application is not located in a folder called `practical`, you may need to adjust the `TEST_ENTRY_URL` in `frontend/tests/_bootstrap.php` and `backend/tests/_bootstrap.php`.

After that is done you should be able to run your tests, for example to run `frontend` tests do:

* `cd frontend`
* `../vendor/bin/codecept build`
* `../vendor/bin/codecept run`

In similar way you can run tests for other application tiers - `backend`, `console`, `common`.

You also can adjust you application suite configs and `_bootstrap.php` settings to use other urls and files, as it is can be done in `yii2-basic`.

## Dependencies

- [Yii2-Config](https://github.com/abhi1693/yii2-config)
- [Yii2-User](https://github.com/abhi1693/yii2-user)
- [Yii2-Installer](https://github.com/abhi1693/yii2-installer)
- [Yii2-System-Info](https://github.com/abhi1693/yii2-system-info)
- [Yii2-Rbac](https://github.com/abhi1693/yii2-rbac)

# Donate

Any contribution helps us to improve [Yii2 Startup Kit](https://github.com/abhi1693/yii2-app-advanced-startup-kit), if you want to help us too but don't want to get into coding, we won't say no to PayPal

[![paypal](https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif)](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=EHXMKZ3NLKR7W)
