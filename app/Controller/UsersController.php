<?php

class UsersController extends AppController {
    
    public function signup() {
        if($this->request->is('post')){
            $d = $this->request->data;
            $d['User']['id'] = null;
            $d['User']['lastlogin'] = '2013-01-01 12:11:10';
            if(!empty($d['User']['password'])){
                $d['User']['password'] = Security::hash($d['User']['password'], null, true);
            }
            if($this->User->save($d, true, array('username', 'password', 'mail'))){
                $link = array('controller' => 'users', 'action' => 'activate', $this->User->id.'-'.md5($d['User']['password']));   
                App::uses('CakeEmail', 'Network/email');
                $mail = new CakeEmail('gmail');
                $mail->from('noreply@gmail.com')
                     ->to($d['User']['mail'])
                     ->subject('Test :: inscription')
                     ->emailFormat('html')
                     ->template('signup')
                     ->viewVars(array('username'=>$d['User']['username'], 'link' => $link))
                     ->send();
                        
                $this->Session->setFlash('Your Account has been created, we have sent an email, to activate your account please click on the link', 'flash_success');
                $this->redirect('/');
            }else{
                $this->Session->setFlash('Please correct these errors', 'flash_error');
            }
        }
    }
    
    public function login(){
        if($this->request->is('post')){
            if($this->Auth->login()){
                $this->User->id = $this->Auth->user('id');
                $this->User->saveField('lastlogin', date('Y-m-d H:i:s'));
                $this->Session->setFlash('You are now connected', 'flash_success');
                $this->redirect('/');
            }else{
                $this->Session->setFlash('Informations incorrect', 'flash_error');
            }
        }
    }
    
    public function logout(){
        $this->Auth->logout();
        $this->Session->setFlash('You have been disconnected', 'flash_success');
        $this->redirect($this->referer());
    }


    public function activate($token){
        $token = explode('-', $token);
        $user = $this->User->find('first',array(
            'conditions' => array(
                'id' => $token[0],
                'MD5(User.password)' => $token[1],
                'active' => 0
            )
        ));
        if(!empty($user)){
            $this->User->id = $user['User']['id'];
            $this->User->saveField('active', 1);
            $this->Session->setFlash("Your account has been activated, you can now login", 'flash_success');
            //$this->Auth->login($user['User']);
        }else{
            $this->Session->setFlash("Error, your account can't be activated", 'flash_error');
        }
        $this->redirect('/');
    }
    
    public function password(){
        if(!empty($this->request->params['named']['token'])){
            $token = $this->request->params['named']['token'];
            $token = explode('-', $token);
            
            $user = $this->User->find('first',array(
            'conditions' => array(
                'id' => $token[0],
                'MD5(User.password)' => $token[1],
                'active' => 1
            )
            ));
            
            if($user){
                //debug($user); die();
                $this->User->id = $user['User']['id'];
                $password = substr(md5(uniqid(rand(),true)),0, 8);
                $this->User->saveField('password', Security::hash($password,null,true));
                $this->Session->setFlash("Your password has been reset, here is the new one: $password", 'flash_success');
            }else{
                $this->Session->setFlash('User not found', 'flash_error');
            }
            
        }
        
        if($this->request->is('post')){
            $user = $this->User->find('first', array(
                'conditions' => array(
                    'User.mail' => $this->request->data['User']['mail'],
                    'active' => 1
                )
            ));
            if(empty($user)){
                $this->Session->setFlash('No user found associate to this email', 'flash_error');
            }else{
                //debug($user); die();
                App::uses('CakeEmail', 'Network/Email');
                $mail = new CakeEmail('gmail');
                $link = array('controller' => 'users', 'action' => 'password', 'token' => $user['User']['id'].'-'.md5($user['User']['password'])); 
                $mail->from('noreply@gmail.com')
                     ->to($user['User']['mail'])
                     ->subject('Test :: forgotten password')
                     ->emailFormat('html')
                     ->template('password')
                     ->viewVars(array('username'=>$user['User']['username'], 'link' => $link))
                     ->send();
                $this->Session->setFlash('An mail has been sent to the associate email', 'flash_success');
            }
        }
    }


    public function edit(){
       $user_id = $this->Auth->user('id');
       if(!$user_id){
           $this->Session->setFlash("You don't have permission to edit this page", 'flash_error');
           $this->redirect($this->referer());
       }
       $this->User->id = $user_id;
       $passError = false;
       if($this->request->is('put') || $this->request->is('post')){
           $d = $this->request->data;
           $d['User']['id'] = $user_id;
           if(!empty($d['User']['pass1'])){
               if($d['User']['pass1'] == $d['User']['pass2']){
                   $d['User']['password'] = Security::hash($d['User']['pass1'], null, true);
               }else{
                   $passError = true;
               }
           }
           if($this->User->save($d, true, array('firstname', 'lastname', 'password'))){
               $this->Session->setFlash('Profil updated', 'flash_success');
           }else{
               $this->Session->setFlash('Impossible to update your profile', 'flash_error');
           }
           if($passError){
               $this->Session->setFlash('Please correct', 'flash_error');
               $this->User->validationErrors['pass2'] = array("Password don't match");
           }
       }else{
            $this->request->data = $this->User->read();   
       }
       $this->request->data['User']['pass1'] = $this->request->data['User']['pass2'] = ''; 
   }
   
   public function admin_edit($id){
       $this->User->id = $id;
       if($this->request->is('put') || $this->request->is('post')){
           $d = $this->request->data;
           $d['User']['id'] = $id; 

           if(!empty($d['User']['pass1'])){
               if($d['User']['pass1'] == $d['User']['pass2']){
                   $d['User']['password'] = Security::hash($d['User']['pass1'], null, true);
               }
           }
           if($this->User->save($d, true, array('firstname', 'lastname', 'password', 'group_id'))){
               $this->Session->setFlash('Profil updated', 'flash_success');
           }else{
               $this->Session->setFlash('Impossible to update your profile', 'flash_error');
           }
       }else{
            $this->request->data = $this->User->read();
       }
       
       $this->request->data['User']['pass1'] = $this->request->data['User']['pass2'] = ''; 
       $d['groups'] = $this->User->Group->find('list', array('fields'=>'name'));
       $d['userid'] = $id;
       $this->set(array('groups', 'userid'),array($d['groups'], $d['userid']));
   }
   
   public function admin_index(){
       
        $users = $this->User->find('all', array(
            'contain' => array('Group'),
            'fields' => array('User.id', 'User.username', 'User.created', 'User.active','Group.name')
        ));
        $this->set('users', $users);
   }

   public function user_index(){
       
   }
   public function admin_delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->User->delete($id)) {
            $this->Session->setFlash(__('The post with id: %s has been deleted.', h($id)), 'flash_success');
            return $this->redirect($this->referer());
        }
    }
}
?>
