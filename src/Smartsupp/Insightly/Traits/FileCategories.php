<?php

namespace Smartsupp\Insightly\Traits;

/**
 * TODO: DON'T USE WITHOUT TEST ALL FUNCTIONS - THIS IS ONLY CONCEPT
 */
trait FileCategories
{

	/**
	 * Get file categories (or single if $id)
	 *
	 * @param int $id File Category ID
	 * @return object
	 */
	public function getFileCategories($id = null)
	{
		return !$id ? $this->call('get', 'FileFileCategories') : $this->call('get', 'FileFileCategories/' . $id);
	}


	/**
	 * Create/Update file categories
	 *
	 * @param array $data - See https://api.insight.ly/v2.2/#!/FileCategories/AddFileCategory for fields
	 * @return object
	 */
	public function saveFileCategory(array $data = [])
	{
		if (empty($data['CATEGORY_ID'])) {
			return $this->call('post', 'FileFileCategories', $data);
		} else {
			return $this->call('put', 'FileFileCategories', $data);
		}
	}


	/**
	 * Deactivate file category
	 *
	 * @param int $id File Category ID
	 * @return object
	 */
	public function deleteFileCategory($id)
	{
		return $this->call('delete', 'FileCategories/' . $id);
	}

}
