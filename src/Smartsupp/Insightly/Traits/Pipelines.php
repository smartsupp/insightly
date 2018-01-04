<?php namespace Smartsupp\PhpInsightly\Traits;

/**
 * TODO: DON'T USE WITHOUT TEST ALL FUNCTIONS - THIS IS ONLY CONCEPT
 */
trait Pipelines
{

	/**
	 * Get pipelines (if $id - single pipeline)
	 *
	 * @return object
	 */
	public function getPipelines($id = null)
	{
		return !$id ? $this->call('get', 'Pipelines') : $this->call('get', 'Pipelines/' . $id);
	}

}
