<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class PostsController extends AppController {
    
    public function index() {
        
        $posts = $this->Post->find('all', array(
            'contain' => array('Thumb')
        ));
        
        $this->set('posts', $posts);
    }
    
    public function admin_index() {
        
        $posts = $this->Post->find('all');
        
        $this->set('posts', $posts);
    }

    
    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'), 'flash_error');
        }

        $post = $this->Post->find('first', array(
            'conditions' => array('Post.id ='=> $id),
            'fields' => array('Post.id', 'Post.title', 'Post.body', 'Post.created', 'Post.user_id','Thumb.file'),
            'contain' => array('Thumb', 'Media'),
        ));
        $user = $this->Post->User->find('first', array(
            'contain' => array('Post', 'Thumb', 'User'),
            'fields' => array('Thumb.file','User.username'),
            'conditions' => array('User.id' => $post['Post']['user_id'])
        ));
        if (!$post) {
            throw new NotFoundException(__('Invalid post'), 'flash_error');
        }
        //debug($user);
        $this->set(array('post', 'user'), array($post, $user));
    }
    
        public function edit($id = null){
            if($this->request->is('put') || $this->request->is('post')){
                if(empty($this->data['Post']['body'])){
                    $this->Session->setFlash("Please correct your errors", 'flash_error');
                }
                elseif($this->Post->saveAssociated($this->request->data)){
                     $this->Session->setFlash("Content updated !", 'flash_success');
                    $this->redirect(array('action'=>'index'));   
                }else{
                    $this->Session->setFlash("Please correct your errors", 'flash_error');
                }
            } else if ($id){
                $this->Post->id =$id;
                $this->request->data = $this->Post->read();
            } else {
                $this->request->data = $this->Post->getDraft('post');
            }
            
    }
    
        public function admin_edit($id = null){
            //debug($this); die();
            if($this->request->is('put') || $this->request->is('post')){
                $this->request->data['Post']['user_id'] = $this->Auth->user('id');
                if(empty($this->data['Post']['body'])){
                    $this->Session->setFlash("Please correct your errors", 'flash_error');
                }
                elseif($this->Post->saveAssociated($this->request->data)){
                     $this->Session->setFlash("Content updated !", 'flash_success');
                    $this->redirect(array('action'=>'index'));   
                }else{
                    $this->Session->setFlash("Please correct your errors", 'flash_error');
                }
            } else if ($id){
                $this->Post->id =$id;
                $this->request->data = $this->Post->read();
            } else {
                $userid = $this->Auth->user('id');
                $this->request->data = $this->Post->getDraft('post', $userid);
            }
            
    }
    
        public function admin_delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->Post->delete($id)) {
            $this->Session->setFlash(__('The post with id: %s has been deleted.', h($id)), 'flash_success');
            return $this->redirect($this->referer());
        }
    }
    
    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->Post->delete($id)) {
            $this->Session->setFlash(__('The post with id: %s has been deleted.', h($id)), 'flash_success');
            return $this->redirect($this->referer());
        }
    }
}

?>
