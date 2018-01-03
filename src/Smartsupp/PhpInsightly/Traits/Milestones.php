<?php namespace Smartsupp\PhpInsightly\Traits;

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
