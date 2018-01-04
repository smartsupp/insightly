<?php

namespace Smartsupp\Insightly\Traits;

/**
 * TODO: DON'T USE WITHOUT TEST ALL FUNCTIONS - THIS IS ONLY CONCEPT
 */
trait Relationships
{

	/**
	 * Get list of relationships
	 *
	 * @return object
	 */
	public function getRelationships()
	{
		return $this->call('get', 'Relationships');
	}

}
