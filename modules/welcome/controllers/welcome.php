<?php

Class Welcome extends Controller {
    
    function __construct()
    {           
        parent::__construct();
    }
    
    public function index()
    {          
        set_var('variable', 'and generated by ') ;
        
        view('view_welcome', '', false);
    }
    
    function hmvc()
    {
        loader::helper('ob/request');

        $data = array();
        $data['response_a'] = request('welcome/test/1/2/3')->exec();
        $data['response_b'] = request('backend/hello/test/1/2/3')->exec();
        
        view('view_hmvc', $data, false);
    }
    
    function test($arg1 = '', $arg2 = '', $arg3 = '')
    {
        echo '<pre>Response: '.$arg1 .' - '.$arg2. ' - '.$arg3.'</pre>';
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
        echo "argument when you go LIVE server ! .".br().".e.g. task_run('module/controller/method', false);";
        echo br().anchor('welcome/task/help', 'Click Here to Help !');
        echo "<font>";
        
        if($mode == 'help')
        {
            $output = task_run('start/help', $output = true);  // use without true when you go live.
            echo '<pre>'.$output.'</pre>';
        }
        else
        {
            $output = task_run('start/index', $output = true); // use without true when you go live.
            echo '<pre>'.$output.'</pre>';
        }
    }
    
}

/* End of file start.php */
/* Location: .modules/welcome/controllers/welcome.php */