<?php
  
Class User extends Vmodel
{
    function __construct()
    {
        parent::__construct();
        
        $this->settings['fields']['captcha_answer'] = array(
          'label' => 'Security Image',
          'type'  => 'string',
          'rules' => 'trim|required|integer|min_lenght[1]|max_length[5]|callback_request[post][captcha/check]'
        );
        
        // !! WHAT IS THE CALLBACK REQUEST : callback_request[post][/captcha/check/] is a rule that is do a hmvc request
        // to /captcha module. Look at the captcha module for more details.
    }
    
    public $settings = array(
    'database' => 'db',
    'table'    => 'users',
    'primary_key' => 'usr_id',
    'fields' => array
     (
        'usr_id' => array(
          'label' => 'ID',
          'type'  => 'int',
          'rules' => 'trim|required|integer'
        ),
        'usr_username' => array(
         'label'  => 'Username',  // you can use lang:username
         'type'   => 'string',
         'rules'  => 'required|trim|unique|min_lenght[3]|max_length[100]|xss_clean'
        ),
        'usr_password' => array(
          'label' => 'Password',
          'type'  => 'string',
          'rules' => 'required|trim|min_lenght[6]|encrypt',
          'func'  => 'md5'
        ),
        'usr_confirm_password' => array(
          'label' => 'Confirm Password',
          'type'  => 'string',
          'rules' => 'required|encrypt|matches[usr_password]'
        ),
        'usr_email' => array(
          'label' => 'Email Address',
          'type'  => 'string',
          'rules' => 'required|trim|valid_emails'
        )
        
    ));
    
    function before_save(){}
    function after_save(){}
    
    /**
    * Update / Insert
    * 
    * @param mixed $val
    */
    function save()
    {   
        return parent::save();
    }

    /**
    * Do Validate and Delete
    *
    */
    function delete()
    {
        return parent::save();
    }
    
}


/* End of file start.php */
/* Location: .modules/test/controllers/vm/start.php */