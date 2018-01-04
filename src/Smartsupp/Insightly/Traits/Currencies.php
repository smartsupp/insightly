<?php namespace Smartsupp\PhpInsightly\Traits;

/**
 * TODO: DON'T USE WITHOUT TEST ALL FUNCTIONS - THIS IS ONLY CONCEPT
 */
trait Currencies
{

	/**
	 * Get all currencies used by Insightly
	 *
	 * @return object
	 */
	public function getCurrencies()
	{
		return $this->call('get', 'Currencies');
	}

}
