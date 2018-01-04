<?php

namespace Smartsupp\Insightly\Traits;

/**
 * TODO: DON'T USE WITHOUT TEST ALL FUNCTIONS - THIS IS ONLY CONCEPT
 */
trait Milestones
{

	/**
	 * Get all milestones
	 *
	 * @return object
	 */
	public function getMilestones()
	{
		return $this->call('get', 'Milestones');
	}

}
