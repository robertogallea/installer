#### Sculptor Installer
Linux base installation utility.

#### Build
``` bash
composer install
php installer app:build
```

#### Usage
Command | Parameter | Description
------------ | ------------- | -------------
list-stages | None |List all stages 
run | None | Start a new installation
run-stage | --step="STEP NAME" | Run a single step, see list for names
config | --templates | Create a customizable installation.yml, with --templates will create a folder with all templates that can be customized.
  
#### Installation
``` bash
sudo sh ./bin/setup.sh
sudo ./builds/installer run
```

#### Notes
Machine must be empty before running, see installation log for detailed error information, the log file is placed in the user home.
