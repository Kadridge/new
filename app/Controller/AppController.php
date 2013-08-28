<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
ini_set('memory_limit', '-1');

class AppController extends Controller {
    
    public $helpers = array('Html', 'Form', 'Session', 'Media.Media');

    public $components = array(
        'DebugKit.Toolbar',
        'Session',
        'Cookie',
        'Auth' => array(
            'authenticate' => array(
                'Form' => array(
                    'scope' => array('User.active' => 1)
                )
            )
        )
    );
    
    public function beforeFilter() {
        //debug($this->request->params); die();
        $this->Auth->loginAction = array('controller'=>'users', 'action'=>'login', 'user'=>false, 'admin'=>false);
        $this->Auth->logoutAction = array('controller'=>'users', 'action'=>'logout', 'user'=>false, 'admin'=>false);
        $this->Auth->authorize = array('Controller');
        
        /*if(isset($this->request->params['prefix']) && $this->request->params['prefix'] == 'admin'){
            $this->layout = 'admin';
        }*/
        
        if(!isset($this->request->params['prefix'])){
            $this->Auth->allow();
        }
        return true;
    }
    
    public function isAuthorized($user){
        $this->loadModel('Group');
        if(!isset($this->request->params['prefix'])){
            return true;
        }
        
        $groups = $this->Group->find('all');
        $roles = array();
        foreach ($groups as $k => $v) {
            $roles[$v['Group']['name']] = intval($v['Group']['level']);
        }

    //debug($roles); die();
        if(isset($roles[$this->request->params['prefix']])){
            $lvlAction = $roles[$this->request->params['prefix']];
            $lvlUser = $roles[$user['Group']['name']];
            if($lvlUser >= $lvlAction){
                return true;
            }else{
                $this->Session->setFlash("You don't have the permission to access at this page", 'flash_error');
                return false;
            }
        }
        return false;
    }


    public function canUploadMedias($model, $id){
        return true;
    }
}
