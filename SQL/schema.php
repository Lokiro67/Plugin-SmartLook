<?php
/**
 * Kenshimdev : Développeur web et administrateur système (https://kenshimdev.fr/)
 * @author        Kenshimdev - https://kenshimdev.fr
 * @copyright     Kenshimdev - All rights reserved
 * @link          http://mineweb.org/market
 * @since         03.11.2016
 *
 *
 * UPDATE 				14.10.2017
 */
 
class SmartlookAppSchema extends CakeSchema {

	public function before($event = array()) {
		return true;
	}

	public function after($event = array()) {
	}

	public $smartlook__configurations = [
		'id' => [
			'type' => 'integer',
			'null' => false,
			'default' => null,
			'length' => 10,
			'unsigned' => false,
			'autoIncrement' => true,
			'key' => 'primary'],
			
		'tracking_code' => [
			'type' => 'string',
			'null' => false,
			'default' => null,
			'length' => 40],

		'tracking_admin' => [
			'type' => 'boolean',
			'null' => false,
			'default' => 0,
			'length' => 1],
			
		'tableParameters' => [
			'charset' => 'utf8', 
			'collate' => 'utf8_general_ci', 
			'engine' => 'InnoDB']
	];
}