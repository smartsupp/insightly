<?php namespace Smartsupp\PhpInsightly\Traits;

/**
 * TODO: DON'T USE WITHOUT TEST ALL FUNCTIONS - THIS IS ONLY CONCEPT
 */
trait PipelineStages
{

	/**
	 * Get pipeline stages (if $id - single stage)
	 *
	 * @return object
	 */
	public function getPipelineStages($id = null)
	{
		return !$id ? $this->call('get', 'PipelineStages') : $this->call('get', 'PipelineStages/' . $id);
	}

}
