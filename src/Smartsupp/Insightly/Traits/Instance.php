<?php namespace Smartsupp\PhpInsightly\Traits;

/**
 * TODO: DON'T USE WITHOUT TEST ALL FUNCTIONS - THIS IS ONLY CONCEPT
 */
trait Instance
{

	/**
	 * Gets the instance
	 *
	 * @return object
	 */
	public function getInstance()
	{
		return $this->call('get', 'Instance');
	}

}
