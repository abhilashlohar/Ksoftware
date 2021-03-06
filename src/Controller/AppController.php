<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\I18n\FrozenDate;
use Cake\I18n\FrozenTime;
/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

		FrozenTime::setToStringFormat('dd-MM-yyyy hh:mm a');  // For any immutable DateTime
		FrozenDate::setToStringFormat('dd-MM-yyyy');  // For any immutable Date
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
		$this->loadComponent('Auth', [
		 'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'email',
                        'password' => 'password'
                    ],
                      'userModel' => 'Users'
                ]
            ],
            'logoutRedirect' => [
                'controller' => 'Users',
                'action' => 'login'
            ],
			'unauthorizedRedirect' => $this->referer(),
        ]);
		
		$controller = $this->request->params['controller'];
		$action = $this->request->params['action'];
		$location=$controller.$action;
		if($this->Auth->User('id')){
			$allowedLocations=['Usersregistration','Userslogin','Userslogout','Companiesadd'];
			if(!in_array($location,$allowedLocations)){
				$this->loadModel('Companies');
				$IsCompany = $this->Companies->exists(['user_id' => $this->Auth->User('id')]);
				if((!$IsCompany)){
					$this->response = $this->redirect(['controller' => 'Companies','action' => 'add']) ;
					$this->response->send () ;
					die ();
				}
			}
		}
		
		if(@$this->Auth->User('company')->id){
			$coreVariable = [
				'company_name' => $this->Auth->User('company')->name,
				'fyValidFrom' => $this->Auth->User('fyValidFrom'),
				'fyValidTo' => $this->Auth->User('fyValidTo'),
			];
			$this->coreVariable = $coreVariable;
			$this->set(compact('coreVariable'));
		}
		$this->viewBuilder()->layout('index_layout');
        /*
         * Enable the following components for recommended CakePHP security settings.
         * see http://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
        //$this->loadComponent('Csrf');
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return \Cake\Network\Response|null|void
     */
    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }
}
