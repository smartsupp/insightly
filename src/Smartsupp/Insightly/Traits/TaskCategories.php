<?php

namespace Smartsupp\Insightly\Traits;

/**
 * TODO: DON'T USE WITHOUT TEST ALL FUNCTIONS - THIS IS ONLY CONCEPT
 */
trait TaskCategories
{

	/**
	 * Get all Task Categories
	 *
	 * @param int $id - Task category ID
	 * @return object
	 */
	public function getTaskCategories($id = null)
	{
		return !$id ? $this->call('get', 'TaskCategories') : $this->call('get', 'TaskCategories/' . $id);
	}


	/**
	 * Create / Update Task Category
	 *
	 * @param array $data - See https://api.insight.ly/v2.2/#!/TaskCategories/AddTaskCategory for fields
	 * @return object
	 */
	public function saveTaskCategory(array $data = [])
	{
		$data = $this->dataKeysToUpper($data);

		return empty($data['CATEGORY_ID']) ? $this->call('post', 'TaskCategories', $data) : $this->call('put', 'TaskCategories', $data);
	}


	/**
	 * Disable Task Category
	 *
	 * @param int $id
	 * @return object
	 */
	public function deleteTaskCategory($id)
	{
		return $this->call('delete', 'TaskCategories/' . $id);
	}

}
