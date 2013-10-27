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

class Geometry implements ArraySerializableInterface
{
	const APPROXIMATE 		 = 'approximate';
	const GEOMETRIC_CENTER 	 = 'geometric_center';
	const RANGE_INTERPOLATED = 'range_interpolated';
	const ROOFTOP 			 = 'rooftop';
	
	protected $bounds = null;
	protected $location;
	protected $locationType;
	protected $viewport;
	
	public function __construct(array $data)
	{
		$this->exchangeArray($data);
	}
	
	/**
	 * @return the $bounds
	 */
	public function getBounds() 
	{
		return $this->bounds;
	}

	/**
	 * @return the $location
	 */
	public function getLocation() 
	{
		return $this->location;
	}

	/**
	 * @return the $locationType
	 */
	public function getLocationType() 
	{
		return $this->locationType;
	}

	/**
	 * @return the $viewport
	 */
	public function getViewport() 
	{
		return $this->viewport;
	}


	/**
	 * (non-PHPdoc)
	 * @see \Zend\Stdlib\ArraySerializableInterface::exchangeArray()
	 */
	public function exchangeArray(array $data) 
	{
		if (isset($data['location']) && is_array($data['location'])) {
			$location = new LatLng($data['location']);
			$this->location = $location;
		}
		if (isset($data['viewport']) && is_array($data['viewport'])) {
			$viewport = new LatLngBounds($data['viewport']);
			$this->viewport = $viewport;
		}
		if (isset($data['bounds']) && is_array($data['bounds'])) {
			$bounds = new LatLngBounds($data['bounds']);
			$this->bounds = $bounds;
		}
		if (isset($data['location_type']) && is_string($data['location_type'])) {
			$this->locationType = $data['location_type'];
		}
	}

	/**
	 * (non-PHPdoc)
	 * @see \Zend\Stdlib\ArraySerializableInterface::getArrayCopy()
	 */
	public function getArrayCopy() 
	{
		$return = array(
			'location' => $this->location->getArrayCopy(),
			'location_type' => $this->locationType,
			'viewport' => $this->viewport->getArrayCopy(),
		); 

		if($this->bounds !== null){
			$return['bounds'] = $this->bounds->getArrayCopy();
		}

		return $return;
	}
}