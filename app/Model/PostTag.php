<?php

class PostTag extends AppModel{
    
    public $useTable = "posts_tags";
    public $belongsTo = array(
        'Post',
        'Tag' => array(
            'counterCache' => 'count'
        ));
    
   public function afterDelete() {
       $this->Tag->deleteAll(array(
           'count' => 0
       ));
   }
}