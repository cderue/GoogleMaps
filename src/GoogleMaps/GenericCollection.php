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

abstract class GenericCollection implements  \Countable, \Iterator, \ArrayAccess
{
	/**
	 * @var array
	 */
	protected $collection = array();
	
	/**
	 * @var string 
	 */
	protected $class;
	
	/**
	 * @var int
	*/
	protected $iteratorIndex = 0;

	/**
	 * Constructor
	 *
	 * @param mixed $class
	 * @throws Exception\InvalidArgumentException
	 */
	public function __construct($class)
	{
		if (!class_exists($class)) {
			throw new Exception\InvalidArgumentException('class');
		}
		$this->class = $class;
	}
	
	/**
	 * Parse a list to construct
	 *
	 * @param  array|Traversable $list
	 * @return void
	 */
	public function initializeFromArray($list)
	{
		foreach ($list as $element) {
			$this->addElement($element);
		}
	}
	
	/**
	 * Add an element
	 *
	 * @param  mixed $element
	 * @return GenericCollection
	 */
	public  function addElement($element)
	{
		if (!$element instanceof $this->class) {
			throw new Exception\InvalidArgumentException('element');
		}
		$this->collection[] = $element;
		return $this;
	}
	
	/**
	 * Return the number of elements
	 * 
	 * Implement Countable::count()
	 * 
	 * @return int
	 */
	public function count()
	{
		return count($this->collection);
	}
	
	/**
	 * Return the current element
	 *
	 * Implement Iterator::current()
	 *
	 * @return mixed
	 */
	public function current()
	{
		return $this->collection[$this->iteratorIndex];
	}
	
	/**
	 * Return the key of the current element
	 *
	 * Implement Iterator::key()
	 *
	 * @return int
	 */
	public function key()
	{
		return $this->iteratorIndex;
	}
	
	/**
	 * Move forward to next element
	 *
	 * Implement Iterator::next()
	 *
	 * @return void
	 */
	public function next()
	{
		$this->iteratorIndex += 1;
	}
	
	/**
	 * Rewind the Iterator to the first element
	 *
	 * Implement Iterator::rewind()
	 *
	 * @return void
	 */
	public function rewind()
	{
		$this->iteratorIndex = 0;
	}
	
	/**
	 * Check if there is a current element after calls to rewind() or next()
	 *
	 * Implement Iterator::valid()
	 *
	 * @return bool
	 */
	public function valid()
	{
		$count = $this->count();
		if ($count > 0 && $this->iteratorIndex < $count) {
			return true;
		}
		return false;
	}
	
	/**
	 * Whether the offset exists
	 *
	 * Implement ArrayAccess::offsetExists()
	 *
	 * @param   int     $offset
	 * @return  bool
	 */
	public function offsetExists($offset)
	{
		return ($offset < $this->count());
	}
	
	/**
	 * Return value at given offset
	 *
	 * Implement ArrayAccess::offsetGet()
	 *
	 * @param  int $offset
	 * @throws Exception\OutOfBoundsException
	 * @return mixed
	 */
	public function offsetGet($offset)
	{
		if (!$this->offsetExists($offset)) {
			throw new Exception\OutOfBoundsException('Out of bounds index');
		}
		return $this->collection[$offset];
	}
	
	/**
	 * Set value at given offset
	 *
	 * Implement ArrayAccess::offsetSet()
	 *
	 * @param  int   $offset
	 * @param  mixed $value
	 * @throws Exception\RuntimeException
	 */
	public function offsetSet($offset, $value)
	{
		if (!$this->offsetExists($offset)) {
			throw new Exception\OutOfBoundsException('Out of bounds index');
		}
		$this->collection[$offset] = $value;
	}
	
	/**
	 * Unset value at given offset
	 *
	 * Implement ArrayAccess::offsetUnset()
	 *
	 * @param  int $offset
	 * @throws Exception\RuntimeException
	 */
	public function offsetUnset($offset)
	{
		if (!$this->offsetExists($offset)) {
			throw new Exception\OutOfBoundsException('Out of bounds index');
		}
		unset($this->collection[$offset]);
	}
}