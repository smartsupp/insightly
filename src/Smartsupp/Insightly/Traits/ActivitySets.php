<?php

namespace Smartsupp\Insightly\Traits;

/**
 * TODO: DON'T USE WITHOUT TEST ALL FUNCTIONS - THIS IS ONLY CONCEPT
 */
trait ActivitySets
{

	/**
	 * Get activity sets
	 *
	 * @param int $id Activity set ID
	 * @return object
	 */
	public function getActivitySets($id = null)
	{
		return !$id ? $this->call('get', 'ActivitySets') : $this->call('get', 'ActivitySets/' . $id);
	}

}
