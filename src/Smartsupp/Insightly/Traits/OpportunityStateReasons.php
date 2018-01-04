<?php namespace Smartsupp\PhpInsightly\Traits;

/**
 * TODO: DON'T USE WITHOUT TEST ALL FUNCTIONS - THIS IS ONLY CONCEPT
 */
trait OpportunityStateReasons
{

	/**
	 * Get all Opportunity State Reasons
	 *
	 * @return object
	 */
	public function getOpportunityStateReasons()
	{
		return $this->call('get', 'OpportunityStateReasons');
	}

}
