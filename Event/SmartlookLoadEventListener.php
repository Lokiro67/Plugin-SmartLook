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
 
App::uses('CakeEventListener', 'Event');

class SmartlookLoadEventListener implements CakeEventListener {

  private $controller;

  public function __construct($request, $response, $controller) {
    $this->controller = $controller;
  }

  //Listen events and excute method on it
  public function implementedEvents() {
    return [
      'Controller.shutdown' => 'add_smartlook_tracking_code'];
  }

  public function add_smartlook_tracking_code($event){
    //Recovering the smartlook tracking code
    $this->controller->loadModel('SmartLook.SLConfiguration');
    $SL_conf = $this->controller->SLConfiguration->find('first')['SLConfiguration'];
    $tracking_code = $SL_conf['tracking_code'];
    $tracking_admin = $SL_conf['tracking_admin'];

    if($this->controller->isConnected && $this->controller->User->isAdmin() && $tracking_admin){
      return;
    }

    $body = $event->subject->response->body();
    
    if (!is_string($body)) {
      return;
    }

    //Modify body response to insert the tracking code
    $tracking_js = "\n<script type=\"text/javascript\">
                      window.smartlook||(function(d) {
                      var o=smartlook=function(){ o.api.push(arguments)},h=d.getElementsByTagName('head')[0];
                      var c=d.createElement('script');o.api=new Array();c.async=true;c.type='text/javascript';
                      c.charset='utf-8';c.src='//rec.smartlook.com/recorder.js';h.appendChild(c);
                      })(document);
                      smartlook('init', '" . $tracking_code . "');
                  </script>\n";

    $body = str_replace("</head>", $tracking_js."</head>", $body);

    return $event->subject->response->body($body);
  }

}