<?php namespace Smartsupp\PhpInsightly\Traits;

/**
 * TODO: DON'T USE WITHOUT TEST ALL FUNCTIONS - THIS IS ONLY CONCEPT
 */
trait Tags
{

	/**
	 * Get list of tags
	 *
	 * @param string $type - Optional, returns tags associated with record type - contacts|leads|opportunities|organisations|projects|emails
	 * @return object
	 */
	public function getTags($type = null)
	{
		return !$type ? $this->call('get', 'Tags') : $this->call('get', 'Tags?record_type=' . $type);
	}

}
