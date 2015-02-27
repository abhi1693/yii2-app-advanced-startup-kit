FAQ
---

### How to re-install the application?

* All the configurable options are stored generally either stored in the `database` or `common/main-local.php`.
* To reset the application's installer, set `installer` to `FALSE`. You can find `installer` under `params`.
* Then go to either `http://yourhost/your-app/` or `http://yourhost/your-app/backend` and the application will start 
the installer again.
