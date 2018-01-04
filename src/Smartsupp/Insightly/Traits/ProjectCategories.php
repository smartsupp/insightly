<?php

namespace Smartsupp\Insightly\Traits;

use Smartsupp\Insightly\InsightlyException;

/**
 * TODO: DON'T USE WITHOUT TEST ALL FUNCTIONS - THIS IS ONLY CONCEPT
 */
trait ProjectCategories
{

	/**
	 * Get project categories (if $id - single category)
	 *
	 * @return object
	 */
	public function getProjectCategories($id = null)
	{
		return !$id ? $this->call('get', 'ProjectCategories') : $this->call('get', 'ProjectCategories/' . $id);
	}


	/**
	 * Create/Update project category (if !$data['CATEGORY_ID'] - create category)
	 *
	 * @param array $data
	 * @return object
	 * @throws InsightlyException
	 */
	public function saveProjectCategory(array $data = [])
	{
		if (!count($data)) {
			$this->addError(__FUNCTION__ . ' -> $data must be provided.');
		} else {
			$data = $this->dataKeysToUpper($data);
		}

		return empty($data['CATEGORY_ID']) ? $this->call('post', 'ProjectCategories', $data) : $this->call('put', 'ProjectCategories', $data);
	}


	/**
	 * Delete project category
	 *
	 * @param int $id Category ID
	 * @return object
	 */
	public function deleteProjectCategory($id)
	{
		return $this->call('delete', 'ProjectCategories/' . $id);
	}

}
