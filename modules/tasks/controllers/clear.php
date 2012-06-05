<?php
defined('CMD') or exit('Access Denied!');

/**
 * ( Clear all Temporary and Log files using this command )
 * 
 * Open your terminal and type > php task.php clear
 */

Class Clear extends Controller {
    
    function __construct()
    {   
        parent::__construct();
    }         
    
    public function index()
    {
        $this->config->set_item('log_threshold', 0); // disable log writing
        
        # delete application and module directory log files.
        
        $CAPTCHA_DIR = MODULES .'captcha'. DS .config_item('public_folder'). DS .'images'. DS;
        $APP_LOG_DIR = APP. 'core'. DS . 'logs' . DS;
        $MOD_LOG_DIR = MODULES;
        
        shell_exec("find $APP_LOG_DIR -name 'log-*.php' -exec rm -rf {} \;"); # help https://help.ubuntu.com/community/find
        shell_exec("find $MOD_LOG_DIR -name 'log-*.php' -exec rm -rf {} \;");
        shell_exec("find $CAPTCHA_DIR -name '*.jpg' -exec rm -rf {} \;"); # force delete captcha images.
        
        echo '*** Temporary files removed succesfully !'."\n";
    }
}

/* End of file start.php */
/* Location: .modules/tasks/clear.php */