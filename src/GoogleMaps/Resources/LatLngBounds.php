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

use Zend\Stdlib\Parameters;

use Zend\Stdlib\ArraySerializableInterface;

class LatLngBounds implements ArraySerializableInterface
{
	/**
	 * @var LatLng SouthWest coordinates
	 */
	protected $southwest;
	
	/**
	 * 
	 * @var LatLng NorthEast coordinates
	 */
	protected $northeast;
	
	/**
	 * Constructor
	 * 
	 * @param array $data
	 * @throws Exception\InvalidArgumentException
	 */
	public function __construct(array $data)
	{
		$this->exchangeArray($data);
	}
	
	/**
	 * @return the $southwest
	 */
	public function getSouthwest()
	{
		if (null === $this->southwest) {
			$this->southwest = new LatLng();
		}
		return $this->southwest;
	}

	/**
	 * @return the $northeast
	 */
	public function getNortheast() 
	{
		if (null === $this->northeast) {
			$this->northeast = new LatLng();
		}
		return $this->northeast;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see \Zend\Stdlib\ArraySerializableInterface::exchangeArray()
	 * @throws Exception\InvalidArgumentException
	 */
	public function exchangeArray(array $data) 
	{
		if (isset($data['southwest']) && is_array($data['southwest'])) {
			$southwest = new LatLng($data['southwest']);
			$this->southwest = $southwest;
		}
		if (isset($data['northeast']) && is_array($data['northeast'])) {
			$northeast = new LatLng($data['northeast']);
			$this->northeast = $northeast;	
		}
	}

	/* (non-PHPdoc)
	 * @see \Zend\Stdlib\ArraySerializableInterface::getArrayCopy()
	 */
	public function getArrayCopy() 
	{
		return array(
			'southwest' => $this->southwest->getArrayCopy(),
			'northeast' => $this->northeast->getArrayCopy(),
		);
	}
}