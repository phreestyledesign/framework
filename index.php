<?php

/**
|--------------------------------------------------------------------------
| APPLICATION ENVIRONMENT
|--------------------------------------------------------------------------
|
| You can load different configurations depending on your
| current environment. Setting the environment also influences
| things like logging and error reporting.
|
| This can be set to anything, but default usage is:
|
|     o DEV   - Development
|     o DEBUG - Debug Mode
|     o TEST  - Testing
|     o LIVE  - Production
|
| NOTE: If you change these, also change the error_reporting() code below
|
*/
define('ENV', 'DEV');

/**
|--------------------------------------------------------------------------
| Native PHP Error Handler (Default Off) 
|--------------------------------------------------------------------------
| For security reasons its default off.
| Default Obullo error handle active also you don't want to use Obullo
| development error handler you can *turn off it easily from 
| 
| "application/config.php" file.
|
*/              
if (defined('ENV'))
{
    switch(ENV)
    {
        case 'DEV':
            error_reporting(E_ALL | E_STRICT);
            ini_set('display_errors', '1');
            error_reporting(0); // Show errors using Obullo error handler
            break;
        
        case 'TEST':
            error_reporting(E_ALL | E_STRICT);
            error_reporting(0);
            break;
        
        case 'DEBUG':
            error_reporting(E_ALL | E_STRICT);
            ini_set('display_errors', '1');
            break;
        
        case 'LIVE':
            error_reporting(0);
            break;
        
        default:
        exit('The application environment is not set correctly.');
    }   
}

/**
|--------------------------------------------------------------------------
| DIRECTORY SEPERATOR
|--------------------------------------------------------------------------
| Friendly Directory Seperator Constant
|
*/
define('DS',   DIRECTORY_SEPARATOR);

/**
|--------------------------------------------------------------------------
| Set Default Time Zone Identifer.
|--------------------------------------------------------------------------
|                                                                 
| Set the default timezone identifier for date function ( Server Time )
| @see  http://www.php.net/manual/en/timezones.php
| 
*/
date_default_timezone_set('America/Chicago');

/**
|---------------------------------------------------------------
| FOLDER CONSTANTS
|---------------------------------------------------------------
|
| If you want this front controller to use a different "application"
| folder then the default one you can set its name here. The folder 
| can also be renamed or relocated anywhere on your server.
| It is same for "Modules" folder.
| @see
| User Guide: Chapters / General Topics / Managing Your Applications
|
*/
define('ROOT',  realpath(dirname(__FILE__)) . DS);
define('BASE', ROOT .'obullo'. DS);
define('APP',  ROOT .'application'. DS);
define('MODULES',  ROOT .'modules'. DS);

/**
|---------------------------------------------------------------
| UNDERSTANDING CONSTANTS
|---------------------------------------------------------------
| DS        - The DIRECTORY SEPERATOR
| EXT       - The file extension.  Typically ".php"
| SELF      - The name of THIS file (typically "index.php")
| FCPATH    - The full server path to THIS file
| PHP_PATH  - The full server path to THIS file
| FPATH     - The full server path without file
| ROOT      - The root path of your server
| BASE      - The full server path to the "obullo" folder
| APP       - The full server path to the "application" folder
| MODULES   - The full server path to the "modules" folder
| TASK_FILE - Set your task file name that we use it in task helper.
*/
define('EXT',  '.php');
define('FCPATH', __FILE__);
define('PHP_PATH', '/usr/bin/php'); 
define('FPATH', dirname(__FILE__));  
define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));
define('TASK_FILE', 'task.php');

/**
|--------------------------------------------------------------------------
| User Front Controller for Bootstrap.php file. 
|--------------------------------------------------------------------------
|
| User can create own Front Controller who want replace
| system methods by overriding to Bootstrap.php file.
| 
| @see User Guide: Chapters / General Topics / Control Your Application Boot
|
*/                                     
if(defined('CMD'))
{
    // Obullo Command Line Bootstrap file.
    //--------------------------------------------------------------- 
    require(APP  .'core'. DS .'Cli_Bootstrap'. EXT); 
} 
else 
{
    // Obullo Standart Bootstrap file.
    //--------------------------------------------------------------- 
    require(APP  .'core'. DS .'Bootstrap'. EXT); 
}

require(BASE .'core'. DS .'Bootstrap'. EXT);
  

ob_include_files();
ob_set_headers();

ob_system_run();
ob_system_close();