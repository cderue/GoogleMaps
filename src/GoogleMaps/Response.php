<?php

namespace GoogleMaps;

class Response 
{
	const ERROR 			= 'error';
	const INVALID_REQUEST 	= 'invalid_request';
	const OK 				= 'ok';
	const OVER_QUERY_LIMIT 	= 'over_query_limit';
	const REQUEST_DENIED 	= 'request_denied';
	const UNKNOWN_ERROR 	= 'unknown_error';
	const ZERO_RESULTS 		= 'zero_results';
	
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