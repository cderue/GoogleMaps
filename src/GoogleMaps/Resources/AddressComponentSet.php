<?php
/**
 * This file is part of Geoxygen
 *
 * (c) 2012 Cédric DERUE <cedric.derue@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace GoogleMaps\Resources;

use GoogleMaps\GenericCollection;

class AddressComponentSet extends GenericCollection
{
	/**
	 * Constructor
	 */
	public function __construct() 
	{
		parent::__construct('GoogleMaps\\Resources\\AddressComponent');	
	}
}