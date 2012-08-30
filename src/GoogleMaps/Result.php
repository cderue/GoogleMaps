<?php
/**
 * This file is part of Geoxygen
 *
 * (c) 2012 Cédric DERUE <cedric.derue@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace GoogleMaps;

use GoogleMaps\Resources\AddressComponent;

use GoogleMaps\Resources\Geometry;

use GoogleMaps\Resources\AddressComponentSet;

use Zend\Stdlib\ArraySerializableInterface;

class Result implements ArraySerializableInterface
{
	/**
	 * 
	 * @var AddressComponentSet
	 */
	protected $addressComponents;
	
	/**
	 * 
	 * @var string
	 */
	protected $formattedAddress = '';
	
	/**
	 * 
	 * @var Geometry
	 */
	protected $geometry;
	
	/**
	 * 
	 * @var array
	 */
	protected $types = array();
	
	/**
	 * 
	 * @var boolean
	 */
	protected $partialMatch;
	
	public function __construct($data = array())
	{
		$this->exchangeArray($data);
	}
	
	/**
	 * @return the $addressComponents
	 */
	public function getAddressComponents() 
	{
		return $this->addressComponents;
	}

	/**
	 * @return the $formattedAddress
	 */
	public function getFormattedAddress() 
	{
		return $this->formattedAddress;
	}

	/**
	 * @return the $geometry
	 */
	public function getGeometry() 
	{
		return $this->geometry;
	}

	/**
	 * @return the $types
	 */
	public function getTypes() 
	{
		return $this->types;
	}
	
	/**
	 * @return the $partialMatch
	 */
	public function getPartialMatch() 
	{
		return $this->partialMatch;
	}
	
	public function addAddressComponent(AddressComponent $addressComponent)
	{
		if (null === $addressComponent) {
			throw new Exception\InvalidArgumentException('addressComponent');
		}
		if (null === $this->addressComponents) {
			$this->addressComponents = new AddressComponentSet();
		}
		$this->addressComponents->addElement($addressComponent);
	}
	
	/**
	 * (non-PHPdoc)
	 * @see \Zend\Stdlib\ArraySerializableInterface::exchangeArray()
	 */
	public function exchangeArray(array $data) 
	{
		if (isset($data['address_components']) && is_array($data['address_components'])) {
			foreach ($data['address_components'] as $address) {
				if (is_array($address)) {
					$this->addAddressComponent(new AddressComponent($address));
				}
			}
		}
		if (isset($data['types']) && is_array($data['types'])) {
			$this->types = $data['types'];
		}
		if (isset($data['formatted_address']) && is_string($data['formatted_address'])) {
			$this->formattedAddress = $data['formatted_address'];
		}
		if (isset($data['geometry']) && is_array($data['geometry'])) {
			$this->geometry = new Geometry($data['geometry']); 
		}
	}

	/**
	 * (non-PHPdoc)
	 * @see \Zend\Stdlib\ArraySerializableInterface::getArrayCopy()
	 */
	public function getArrayCopy() 
	{
		$addressComponents = array();
		foreach ($this->getAddressComponents() as $addressComponent) {
			$addressComponents[] = $addressComponent->getArrayCopy();
		}
		// Partial match ?
		return array(
			'address_components' => $addressComponents,
			'formatted_address'  => $this->getFormattedAddress(),
			'geometry' 			 => $this->getGeometry()->getArrayCopy(),
			'types' 			 => $this->getTypes(),
		);
	}
}