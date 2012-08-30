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

use GoogleMaps\Resources\LatLng;

class LatLngParameter implements ParameterInterface
{
	/**
	 * Latitude/longitude
	 * 
	 * @var LatLng
	 */
	protected $latLng;
	
	/**
	 * Constructor
	 * 
	 * @param LatLng $latLng
	 * @throws Exception\InvalidArgumentException
	 */
	public function __construct(LatLng $latLng)
	{
		if (null === $latLng) {
			throw new Exception\InvalidArgumentException('latLng');
		}
		$this->latLng = $latLng;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see \GoogleMaps\Parameters\ParameterInterface::toString()
	 */
	public function toString() 
	{
		return $this->latLng->getLat() . ',' . $this->latLng->getLng();
	}
}