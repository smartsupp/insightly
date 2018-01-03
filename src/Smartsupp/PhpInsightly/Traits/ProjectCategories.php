<?php namespace Smartsupp\PhpInsightly\Traits;

trait ProjectCategories
{

	/**
	 * Get project categories (if $id - single category)
	 *
	 * @return object
	 */
	public function getProjectCategories($id = false)
	{
		return !$id ? $this->call('get', 'ProjectCategories') : $this->call('get', 'ProjectCategories/' . $id);
	}


	/**
	 * Create/Update project category (if !$data['CATEGORY_ID'] - create category)
	 *
	 * @param array $data
	 * @return object
	 */
	public function saveProjectCategory(array $data = [])
	{
		if (!count($data)) {
			$this->set_error(__FUNCTION__ . ' -> $data must be provided.');
		} else {
			$data = $this->dataKeysToUpper($data);
		}

		return empty($data['CATEGORY_ID']) ? $this->call('post', 'ProjectCategories', $data) : $this->call('put', 'ProjectCategories', $data);
	}


	/**
	 * Delete project category
	 *
	 * @param int $id Category ID
	 * @return void
	 */
	public function deleteProjectCategory($id = false)
	{
		if (!count($id)) {
			$this->set_error(__FUNCTION__ . ' -> $id must be provided.');
		} else {
			$data = $this->dataKeysToUpper($data);
		}

		return !$this->call('delete', 'ProjectCategories/' . $id);
	}

}
