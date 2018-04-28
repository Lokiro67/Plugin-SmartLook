<?php
/**
 * Kenshimdev : Développeur web et administrateur système (https://kenshimdev.fr/)
 * @author        Kenshimdev - https://kenshimdev.fr
 * @copyright     Kenshimdev - All rights reserved
 * @link          http://mineweb.org/market
 * @since         03.11.2016
 */

Router::connect('/admin/smartlook', ['controller' => 'Smartlook', 'action' => 'index', 'plugin' => 'SmartLook', 'admin' => true]);