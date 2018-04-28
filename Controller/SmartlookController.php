<?php
/**
 * Kenshimdev : Développeur web et administrateur système (https://kenshimdev.fr/)
 * @author        Kenshimdev - https://kenshimdev.fr
 * @copyright     Kenshimdev - All rights reserved
 * @link          http://mineweb.org/market
 * @since         03.11.2016
 *
 *
 * UPDATE         14.10.2017
 */

class SmartlookController extends AppController{

	/**
	 * Called when the route /admin/smartlook is called.
	 * Used to retrieve the tracking code if it already exists.
	 */
    public function admin_index(){
        if($this->isConnected && $this->User->isAdmin()){
            $this->layout = 'admin';

            $this->loadModel('SmartLook.SLConfiguration');
           	$tracking = $this->SLConfiguration->find('first')['SLConfiguration'];
            $tracking_code = (isset($tracking['tracking_code'])) ? $tracking['tracking_code'] : '';
            $tracking_admin = $tracking['tracking_admin'];

            if ($this->request->is('post')) {                
                $data_tracking_code = $this->request->data["tracking_code"];
                $data_tracking_admin = (isset($this->request->data["tracking_admin"])) ? 1 : 0;

                //Form validation
                if(strlen($data_tracking_code) < 40 || strlen($data_tracking_code) > 40){
                    $this->Session->setFlash($this->Lang->get('TRACKING_FORM_LENGTH_ERROR'), 'default.error');
                    return $this->redirect($this->referer());
                }

                //Look if a configuration already exists
                if(empty($tracking_code)){
                    //Add new tracking code
                    $this->SLConfiguration->create();
                    if ($this->SLConfiguration->save($this->request->data)) {
                        $this->Session->setFlash($this->Lang->get('TRACKING_FORM_ADD_SUCCESS'), 'default.success');
                        return $this->redirect($this->referer());
                    }
                }else{
                    //edit current tracking code
                    $this->SLConfiguration->read(null, $tracking['id']);
                    $this->SLConfiguration->set('tracking_code', $this->request->data['tracking_code']);
                    $this->SLConfiguration->set('tracking_admin', $data_tracking_admin);
                    if ($this->SLConfiguration->save()){
                        $this->Session->setFlash($this->Lang->get('TRACKING_FORM_EDIT_SUCCESS'), 'default.success');
                        return $this->redirect($this->referer());
                    }
                }

                //error occurred
                $this->Session->setFlash($this->Lang->get('TRACKING_FORM_EDIT_ERROR'), 'default.error');
                return $this->redirect($this->referer());
            }

            return $this->set(compact("tracking_code", "tracking_admin"));
        }else{
            return $this->redirect('/');
        }
    }

}