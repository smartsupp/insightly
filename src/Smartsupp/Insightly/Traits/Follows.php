<?php namespace Smartsupp\PhpInsightly\Traits;

/**
 * TODO: DON'T USE WITHOUT TEST ALL FUNCTIONS - THIS IS ONLY CONCEPT
 */
trait Follows
{

	/**
	 * Get all followed records for user (API key owner)
	 *
	 * @return object
	 */
	public function getFollows()
	{
		return $this->call('get', 'Follows');
	}

}
