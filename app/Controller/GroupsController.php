<?php

class GroupsController extends AppController {

    public function admin_edit($id){
        
            if($this->request->is('put') || $this->request->is('post')){
                if($this->Group->saveAssociated($this->request->data)){
                     $this->Session->setFlash("Group updated !", 'flash_success');
                    $this->redirect(array('action'=>'index'));   
                }else{
                    $this->Session->setFlash("Please correct your errors", 'flash_error');
                }
            } else if ($id){
                $this->Group->id =$id;
                $this->request->data = $this->Group->read();
            }
   }
   
   public function admin_index(){
       
        $groups = $this->Group->find('all');
        
        $this->set('groups', $groups);
   }
}
?>
