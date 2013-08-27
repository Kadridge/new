<?php
class Group extends AppModel {
    
    public $hasMany = 'User';
    
    public $validate = array(
        'name' => array(
            array(
            'rule' => 'alphanumeric',
            'required' => true,
            'allowEmpty' => false,
            'message' => "Wrong role name"  
            ),
            array(
            'rule' => 'isUnique',
            'message' => 'This role is not available'
            )
          )
    );
    
}