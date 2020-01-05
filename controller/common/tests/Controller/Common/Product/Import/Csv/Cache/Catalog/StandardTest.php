<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Aimeos (aimeos.org), 2015-2018
 */


namespace Aimeos\Controller\Common\Product\Import\Csv\Cache\Catalog;


class StandardTest extends \PHPUnit\Framework\TestCase
{
	private $object;


	protected function setUp() : void
	{
		\Aimeos\MShop::cache( true );

		$context = \TestHelperCntl::getContext();
		$this->object = new \Aimeos\Controller\Common\Product\Import\Csv\Cache\Catalog\Standard( $context );
	}


	protected function tearDown() : void
	{
		\Aimeos\MShop::cache( false );
	}


	public function testGet()
	{
		$result = $this->object->get( 'root' );

		$this->assertNotEquals( null, $result );
		$this->assertIsInt( $result );
	}


	public function testGetUnknown()
	{
		$this->assertEquals( null, $this->object->get( 'cache-test' ) );
	}


	public function testSet()
	{
		$item = \Aimeos\MShop::create( \TestHelperCntl::getContext(), 'catalog' )->createItem();
		$item->setCode( 'cache-test' );
		$item->setId( 1 );

		$this->object->set( $item );
		$id = $this->object->get( 'cache-test' );

		$this->assertEquals( $item->getId(), $id );
	}
}
