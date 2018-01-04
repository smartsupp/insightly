<?php namespace Smartsupp\PhpInsightly\Traits;

/**
 * TODO: DON'T USE WITHOUT TEST ALL FUNCTIONS - THIS IS ONLY CONCEPT
 */
trait CustomFieldGroups
{

	/**
	 * Get all custom field groups
	 *
	 * @return object
	 */
	public function getCustomFieldGroups()
	{
		return $this->call('get', 'CustomFieldGroups');
	}

}
