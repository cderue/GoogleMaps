<?php
/**
 * This file is part of Geoxygen
 *
 * (c) 2012 Cédric DERUE <cedric.derue@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace GoogleMaps\Parameters;

use GoogleMaps\GenericCollection;

class ComponentSetParameter extends GenericCollection implements ParameterInterface
{
	/**
	 * Constructor
	 */
	public function __construct()
	{
		parent::__construct('GoogleMaps\\Parameters\\ComponentParameter');
	}
	
	/**
	 * (non-PHPdoc)
	 * @see \GoogleMaps\Parameters\ParameterInterface::toString()
	 */
	public function toString() 
	{
		$components = null;
		foreach ($this->collection as $element) {
			$components .= $element->toString();
		}
		return $components;
	}
}