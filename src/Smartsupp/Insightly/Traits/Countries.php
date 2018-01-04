<?php

namespace Smartsupp\Insightly\Traits;

/**
 * TODO: DON'T USE WITHOUT TEST ALL FUNCTIONS - THIS IS ONLY CONCEPT
 */
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
