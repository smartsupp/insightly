<?php namespace Smartsupp\PhpInsightly\Traits;

use Smartsupp\PhpInsightly\InsightlyException;
/**
 * TODO: DON'T USE WITHOUT TEST ALL FUNCTIONS - THIS IS ONLY CONCEPT
 */
trait Comments
{


	/**
	 * Get comment
	 *
	 * @param int $id Comment ID
	 * @return object
	 */
	public function getComment($id)
	{
		return $this->call('get', 'Comments/' . $id);
	}


	/**
	 * Get comment attachment
	 *
	 * @param int $id Comment ID
	 * @return object
	 */
	public function getCommentAttachment($id)
	{
		return $this->call('get', 'Comments/' . $id . '/FileAttachments');
	}


	/**
	 * Update comment
	 *
	 * @param int $id Comment ID
	 * @param string $body Comment body
	 * @return object
	 * @throws InsightlyException
	 */
	public function updateComment($id , $body = null)
	{
		if (!$body || strlen($body) < 1) {
			$this->addError(__FUNCTION__ . ' -> $body must be set.');
		}

		return $this->call('put', 'Comments/' . $id, ['BODY' => $body]);
	}


	/**
	 * Delete comment
	 *
	 * @param int $id Comment ID
	 * @return object
	 */
	public function deleteComment($id)
	{
		return $this->call('delete', 'Comments/' . $id);
	}

}
