<?php namespace Smartsupp\PhpInsightly\Traits;

trait Countries
{

	/**
	 * Get all countries used by Insightly
	 *
	 * @return object
	 */
	public function getCountries()
	{
		return $this->call('get', 'Countries');
	}

}
