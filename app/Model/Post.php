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
    
    public $hasMany = array('PostTag');
    public $hasAndBelongsToMany = array('Tag');
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
    
    public function afterSave($created) {
        if(!empty($this->data['Post']['tags'])){
            $tags = explode(';', $this->data['Post']['tags']);
            foreach ($tags as $tag) {
                $tag = trim($tag);
                if(!empty($tag)){
                    $d = $this->Tag->findByName($tag);
                    if(!empty($d)){
                        $this->Tag->id = $d['Tag']['id'];
                    }else{
                        $this->Tag->create();
                        $this->Tag->save(array(
                            'name' => $tag
                        ));
                    }
                    $this->PostTag->create();
                    $this->PostTag->save(array(
                        'post_id' => $this->id,
                        'tag_id' => $this->Tag->id
                    ));
                }
            }
        }
        return true;
    }
    
}
?>
