<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class PostsController extends AppController {
    
    public function index() {
        
        $posts = $this->Post->find('all', array(
            'contain' => array('Thumb', 'User', 'User.Thumb'),
            'fields' => array('Post.title', 'Post.body', 'Post.id', 'Post.user_id','Thumb.*', 'User.*')
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
            'contain' => array('Thumb', 'User', 'User.Thumb', 'Media', 'Tag'),
            'fields' => array('Post.title', 'Post.created','Post.body', 'Post.id', 'Post.user_id','Thumb.*', 'User.*'),
            'conditions' => array('Post.id' => $id)
        ));
        //debug($post);
        if (!$post) {
            throw new NotFoundException(__('Invalid post'), 'flash_error');
        }
        //debug($user);
        $this->set('post', $post);
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
            $d['tags'] = $this->Post->PostTag->find('all',array(
                'contain' => array('Tag'),
                'conditions' => array('PostTag.post_id' => $id)
            ));
            $this->set($d);
    }
    
    /* create the search by tag page */
    public function tag($name){
        $this->loadModel('PostTag');
        $this->PostTag->recursive = 0;
        $this->PostTag->contain('Tag');
        $posts = $this->Paginate('PostTag', array('Tag.name'=>$name));
        $posts_ids = Set::combine($posts, '{n}.PostTag.post_id', '{n}.PostTag.post_id');
        $d['posts'] = $this->Post->find('all', array(
            'contain' => array('Thumb', 'User', 'User.Thumb'),
            'conditions' => array('Post.id'=> $posts_ids),
            'fields' => array('Post.title', 'Post.body', 'Post.id', 'Post.user_id','Thumb.*', 'User.username', 'User.media_id')
        ));
        $d['name'] = $name;
        $this->set($d);
    }


    public function admin_delTag($id = null){
        $this->Post->PostTag->delete($id);
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
