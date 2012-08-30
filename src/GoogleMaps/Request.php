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

use GoogleMaps\Parameters\ComponentSetParameter;

use GoogleMaps\Parameters\LatLngBoundsParameter;

use GoogleMaps\Parameters\LatLngParameter;

class Request
{
	const SENSOR = 'true';
	const NO_SENSOR = 'false';
	
	/**
	 * Address to perform geocoding (required)
	 * 
	 * @var string
	 */
	protected $address;
	
	/**
	 * Latitude / longitude to perform reverse geocoding (required)
	 * 
	 * @var LatLng
	 */
	protected $latLng;
	
	/**
	 * Components filter to perform geocoding (optional if an address is provided else required)
	 * 
	 * @var array
	 */
	protected $components;
	
	/**
	 * Indicates if the request is provided by a device with a location sensor (required)
	 * 
	 * @var boolean
	 */
	protected $sensor;
	
	/**
	 * Bounding box to limit results within a given viewport (optional)
	 * 
	 * @var LatLngBounds
	 */
	protected $bounds;
	
	/**
	 * Region code (ccTLD or ISO-3166-1 value) to limit results within a particular region (optional)
	 *
	 * @var string
	 */
	protected $region;
	
	/**
	 * Specify the language in which to return results 
	 * 
	 * @var string
	 */
	protected $language;
	
	/**
	 * Contructor
	 * 
	 * @param boolean $sensor
	 */
	public function __construct($sensor = self::NO_SENSOR)
	{
		$this->sensor = $sensor;
	}
	
	/**
	 * @return the $address
	 */
	public function getAddress() 
	{
		return $this->address;
	}

	/**
	 * @param string $address
	 */
	public function setAddress($address) 
	{
		$this->address = $address;
	}

	/**
	 * @return the $latLng
	 */
	public function getLatLng() 
	{
		return $this->latLng;
	}

	/**
	 * @param LatLngParameter $latLng
	 */
	public function setLatLng(LatLngParameter $latLng) 
	{
		$this->latLng = $latLng;
	}

	/**
	 * @return the $bounds
	 */
	public function getBounds() 
	{
		return $this->bounds;
	}

	/**
	 * @param LatLngBoundsParameter $bounds
	 */
	public function setBounds(LatLngBoundsParameter $bounds) 
	{
		$this->bounds = $bounds;
	}

	/**
	 * @return the $language
	 */
	public function getLanguage() 
	{
		return $this->language;
	}

	/**
	 * @param string $language
	 */
	public function setLanguage($language) 
	{
		$this->language = $language;
	}

	/**
	 * @return the $region
	 */
	public function getRegion() 
	{
		return $this->region;
	}

	/**
	 * @param string $region
	 */
	public function setRegion($region) 
	{
		$this->region = $region;
	}
	
	/**
	 * @return the $components
	 */
	public function getComponents() 
	{
		return $this->components;
	}

	/**
	 * @param \GoogleMaps\unknown_type $componentsFilter
	 */
	public function setComponents(ComponentSetParameter $components) 
	{
		$this->components = $components;
	}

	/**
	 * @return the $sensor
	 */
	public function getSensor() 
	{
		return $this->sensor;
	}

	/**
	 * @param boolean $sensor
	 */
	public function setSensor($sensor) 
	{
		$this->sensor = $sensor;
	}
	
	/**
	 * Tranform request to URL parameters
	 *
	 * @return NULL|string
	 */
	public function getUrlParameters()
	{
		$requiredParameters = array('address', 'latlng', 'components', 'sensor');
		$optionalParameters = array('bounds', 'language', 'region', 'components');
	
		$url = '';
		foreach ($requiredParameters as $parameter) {
			$method = 'get' . $parameter;
			$requiredParam = $this->$method();
			if (isset($requiredParam)) {
				if ($url !== '') {
					$url .= '&';
				}
				if (is_object($requiredParam)) {
					$requiredParam = $requiredParam->toString();
				}
				$url .= $parameter . '=' . urlencode($requiredParam);
			}
		}
		if ($url === '') {
			return null;
		}
	
		foreach ($optionalParameters as $option) {
			$method = 'get' . $option;
			$optionParam = $this->$method();
			if (!empty($optionParam)) {
				if (is_object($optionParam)) {
					$optionParam = $optionParam->toString();
				}
				$url .= '&' . $option . '=' . urlencode($optionParam);
			}
		}
		return $url;
	}
}