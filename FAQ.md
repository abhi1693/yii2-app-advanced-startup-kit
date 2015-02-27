FAQ
---

### How to re-install the application?

* All the configurable options are generally either stored in the `database` or `common/main-local.php`.
* To reset the application's installer, set `installed` to `FALSE`. You can find `installed` under `params`.
* Then go to either `http://yourhost/your-app/` or `http://yourhost/your-app/backend` and the application will start 
the installer again.
