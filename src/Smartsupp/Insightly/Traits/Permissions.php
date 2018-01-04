<?php

namespace Smartsupp\Insightly\Traits;

/**
 * TODO: DON'T USE WITHOUT TEST ALL FUNCTIONS - THIS IS ONLY CONCEPT
 */
trait Permissions
{

	/**
	 * Get user permissions
	 *
	 * @return object
	 */
	public function getPermissions()
	{
		return $this->call('get', 'Permissions');
	}
    
}
