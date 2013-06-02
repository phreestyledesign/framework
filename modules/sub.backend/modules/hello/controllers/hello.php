<?php

Class Hello extends Controller {
    
    function __construct()
    {   
        parent::__construct();
    }
    
    public function index()
    {
        view('view_hello', '', false);
    }
    
    function test($arg1 = '', $arg2 = '', $arg3 = '')
    {
        echo '<pre>Backend Sub Module Response: '.$arg1 .' - '.$arg2. ' - '.$arg3.'</pre>';
    }
    
    function task($mode = '')
    {
        if(PHP_OS != 'Linux')
        {
            exit('Please run task functionality under the linux platforms.');
        }
        
        loader::helper('ob/task');
        
        echo "<font size='2'>";
        echo "You should run this command with none true or 'false' ";
        echo "argument when you go LIVE server ! .".br().".e.g. task_run('backend/controller/method', false);";
        echo "<font>";

        $output = task_run('backend/start/index', $output = true); // use without true when you go live.
        echo '<pre>'.$output.'</pre>';
    }
    
}

/* End of file hello.php */
/* Location: .modules/sub.backend/modules/hello/controllers/hello.php */