<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Aimeos (aimeos.org), 2018
 * @package Controller
 * @subpackage Common
 */


namespace Aimeos\Controller\Common\Catalog\Import\Csv\Processor;


/**
 * Common interface for all CSV import processors
 *
 * @package Controller
 * @subpackage Common
 */
interface Iface
{
	/**
	 * Initializes the object
	 *
	 * @param \Aimeos\MShop\Context\Item\Iface $context Context object
	 * @param array $mapping Associative list of field position in CSV as key and domain item key as value
	 * @param \Aimeos\Controller\Common\Catalog\Import\Csv\Processor\Iface $processor Decorated processor
	 */
	public function __construct( \Aimeos\MShop\Context\Item\Iface $context, array $mapping,
		\Aimeos\Controller\Common\Catalog\Import\Csv\Processor\Iface $processor = null );


	/**
	 * Saves the catalog related data to the storage
	 *
	 * @param \Aimeos\MShop\Catalog\Item\Iface $catalog Catalog item with associated items
	 * @param array $data List of CSV fields with position as key and data as value
	 * @return array List of data which hasn't been imported
	 */
	public function process( \Aimeos\MShop\Catalog\Item\Iface $catalog, array $data );
}