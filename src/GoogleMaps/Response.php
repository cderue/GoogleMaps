<?php

namespace GoogleMaps;

class Response 
{
	const ERROR 			= 'ERROR';
	const INVALID_REQUEST 	= 'INVALID_REQUEST';
	const OK 				= 'OK';
	const OVER_QUERY_LIMIT 	= 'OVER_QUERY_LIMIT';
	const REQUEST_DENIED 	= 'REQUEST_DENIED';
	const UNKNOWN_ERROR 	= 'UNKNOWN_ERROR';
	const ZERO_RESULTS 		= 'ZERO_RESULTS';
	
	/**
	 * Response status
	 * 
	 * @var string
	 */
	protected $status;
	
	/**
	 * Response results
	 * 
	 * @var ResultSet
	 */
	protected $results;
	
	/**
	 * 
	 * @var string
	 */
	protected $rawBody;
	
	/**
	 * @return the $status
	 */
	public function getStatus() 
	{
		return $this->status;
	}

	/**
	 * @param string $status
	 */
	public function setStatus($status) 
	{
		$this->status = $status;
	}

	/**
	 * @return the $results
	 */
	public function getResults() 
	{
		return $this->results;
	}

	/**
	 * @param ResultSet $results
	 */
	public function setResults(ResultSet $results) 
	{
		$this->results = $results;
	}
	
	/**
	 * 
	 * @return the $rawBody
	 */
	public function getRawBody() 
	{
		return $this->rawBody;
	}
	
	/**
	 * 
	 * @param string $rawBody
	 */
	public function setRawBody($rawBody) 
	{
		$this->rawBody = $rawBody;
	}

}