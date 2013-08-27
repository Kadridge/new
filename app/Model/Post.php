<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Post extends AppModel {

    public $actsAs = array(
        'Media.Media' => array(
          'extensions' => array('jpg', 'jpeg', 'png', 'gif', 'pdf'),
          'path' => '/uploads/Posts/%id/%f'
        )); 

    public $hasMany = 'Tag';
    public $belongsTo = 'User';

    public $validate = array(
        'title' => array(
            'rule' => 'notEmpty'
        )
    );
    
    public function getDraft($text, $userid) {
        $elem = $this->find('first', array(
            'conditions' => array('active' => -1,'user_id' => $userid)
        ));
        if (empty($elem)) {
            $this->save(array('active' => -1, 'user_id' => $userid), false);
            $elem = $this->read();
        }
        $elem[$this->alias]['active'] = 0;
        return $elem;
    }
    
}
?>
