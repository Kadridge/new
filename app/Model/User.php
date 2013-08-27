<?php
class User extends AppModel {
    
    public $hasMany = 'Post';
    public $belongsTo = 'Group';
    
    public $actsAs = array(
        'Media.Media' => array(
          'extensions' => array('jpg', 'jpeg', 'png', 'gif'),
          'path' => '/uploads/User/%id/%f'
        ));
    
    public $validate = array(
        'username' => array(
            array(
            'rule' => 'alphanumeric',
            'required' => true,
            'allowEmpty' => false,
            'message' => "Wrong username"  
            ),
            array(
            'rule' => 'isUnique',
            'message' => 'This username is not available'
            )
        ),
          'mail' => array(
            array(
            'rule' => 'email',
            'required' => true,
            'allowEmpty' => false,
            'message' => "Email is not valid"  
            ),
            array(
            'rule' => 'isUnique',
            'message' => 'This email is not available'
            )
        ),
         'password' => array(
            'rule' => 'notEmpty',
            'allowEmpty' => false,
            'message' => "Wrong password"
        )
    );
    
}