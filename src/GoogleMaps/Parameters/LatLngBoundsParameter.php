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

use GoogleMaps\Resources\LatLngBounds;

class LatLngBoundsParameter implements ParameterInterface
{
	/**
	 * Bound box
	 * 
	 * @var LatLngBounds
	 */
	protected $latLngBounds;
	
	/**
	 * Constructor
	 * 
	 * @param  LatLngBounds $latLngBounds
	 * @throws Exception\InvalidArgumentException
	 */
	public function __construct(LatLngBounds $latLngBounds) 
	{
		if (null === $latLngBounds) {
			throw new Exception\InvalidArgumentException('latLngBounds');
		}
		$this->latLngBounds = $latLngBounds;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see \GoogleMaps\Parameters\ParameterInterface::toString()
	 */
	public function toString() 
	{
		return $this->latLngBounds->getSouthwest()->toString() . '|' . $this->latLngBounds->getNortheast()->toString();
	}
}