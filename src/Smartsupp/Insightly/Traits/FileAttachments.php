<?php

namespace Smartsupp\Insightly\Traits;

/**
 * TODO: DON'T USE WITHOUT TEST ALL FUNCTIONS - THIS IS ONLY CONCEPT
 */
trait FileAttachments
{

	/**
	 * Get attachment
	 *
	 * @param int $id Attachment ID
	 * @return object
	 */
	public function getAttachment($id)
	{
		return $this->call('get', 'FileAttachments/' . $id);
	}


	/**
	 * Delete attachment
	 *
	 * @param int $id Attachment ID
	 * @return object
	 */
	public function deleteAttachment($id)
	{
		return $this->call('delete', 'FileAttachments/' . $id);
	}

}
