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

/**
 * @author cderue
 *
 */
class AddressComponent implements ArraySerializableInterface
{
	const STREET_ADDRESS 			 = 'street_address';
	const ROUTE 					 = 'route';
	const INTERSECTION 				 = 'intersection';
	const POLITICAL 				 = 'political';
	const COUNTRY 					 = 'country';
	const ADMINISTRATIVE_AREA_LEVEL1 = 'administrative_area_level_1';
	const ADMINISTRATIVE_AREA_LEVEL2 = 'administrative_area_level_2';
	const ADMINISTRATIVE_AREA_LEVEL3 = 'administrative_area_level_3';
	const COLLOQUIAL_AREA 			 = 'colloquial_area';
	const LOCALITY 					 = 'locality';
	const SUBLOCALITY 				 = 'sublocality';
	const NEIGHBORHOOD 				 = 'neighborhood';
	const PREMISE 					 = 'premise';
	const SUBPREMISE 				 = 'subpremise';
	const POSTAL_CODE 				 = 'postal_code';
	const NATURAL_FEATURE 			 = 'natural_feature';
	const AIRPORT 					 = 'airport';
	const PARK 						 = 'park';
	const POINT_OF_INTEREST 		 = 'point_of_interest';
	const POST_BOX 					 = 'post_box';
	const STREET_NUMBER 			 = 'street_number';
	const FLOOR 				 	 = 'floor';
	const ROOM 						 = 'room';
	
	/**
	 * 
	 * @var string
	 */
	protected $longName = '';
	
	/**
	 * 
	 * @var string
	 */
	protected $shortName = '';
	
	/**
	 * 
	 * @var array
	 */
	protected $types = array();
	
	/**
	 * Contructor
	 * 
	 * @param array $data
	 */
	public function __construct(array $data)
	{
		$this->exchangeArray($data);
	}
	
	/**
	 * @return the $longName
	 */
	public function getLongName() 
	{
		return $this->longName;
	}

	/**
	 * @return the $shortName
	 */
	public function getShortName() 
	{
		return $this->shortName;
	}

	/**
	 * @return the $types
	 */
	public function getTypes() 
	{
		return $this->types;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see \Zend\Stdlib\ArraySerializableInterface::exchangeArray()
	 */
	public function exchangeArray(array $data) 
	{
		if (isset($data['long_name']) && is_string($data['long_name'])) {
			$this->longName = $data['long_name'];
		}
		if (isset($data['short_name']) && is_string($data['short_name'])) {
			$this->shortName = $data['short_name'];
		}
		if (isset($data['types']) && is_array($data['types'])) {
			$this->types = $data['types'];
		}
	}

	/**
	 * (non-PHPdoc)
	 * @see \Zend\Stdlib\ArraySerializableInterface::getArrayCopy()
	 */
	public function getArrayCopy() 
	{
		return array(
			'long_name' => $this->longName,
			'short_name' => $this->shortName,
			'types' => $this->types,
		);
	}
}