<?php

/**
 * Obullo ODM
 */
Class UserSchema {
    function __construct(array('fields' => array())){
        $this->config['table'] = ''; 
        $this->config['primary_key'] = ''; 
        $this->user_id = array(
             'label' => 'ID',
             'type'  => 'int',
             'rules' => 'trim|integer'
           );
        $this->user_password = array(
             'label' => 'ID',
             'type'  => 'int',
             'rules' => 'trim|integer'
           );
    }
}
Class User extends ODM
{
    function __construct($schema)
    {
        parent::__construct($schema);
    }
    
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

loader::model('user', false);

$schema = new UserSchema();
$user   = new User($schema); // array içine fields gelecek.

/* End of file User.php */
/* Location: .modules/welcome/models/user.php */