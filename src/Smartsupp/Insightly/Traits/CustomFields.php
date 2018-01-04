<?php namespace Smartsupp\PhpInsightly\Traits;

/**
 * TODO: DON'T USE WITHOUT TEST ALL FUNCTIONS - THIS IS ONLY CONCEPT
 */
trait CustomFields
{

	/**
	 * Get all custom fields
	 *
	 * @return object
	 */
	public function getCustomFields()
	{
		return $this->call('get', 'CustomFields');
	}

}
