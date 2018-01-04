<?php

namespace Smartsupp\Insightly\Traits;

use Smartsupp\Insightly\InsightlyException;

/**
 * TODO: DON'T USE WITHOUT TEST ALL FUNCTIONS - THIS IS ONLY CONCEPT
 */
trait Tasks
{

	/**
	 * Get all Tasks
	 *
	 * @param int $id - Task category ID
	 * @return object
	 */
	public function getTasks($id = null)
	{
		return !$id ? $this->call('get', 'Tasks') : $this->call('get', 'Tasks/' . $id);
	}


	/**
	 * Create / Update Task
	 *
	 * @param array $data - See https://api.insight.ly/v2.2/#!/Tasks/AddTask for fields
	 * @return object
	 */
	public function saveTask(array $data = [])
	{
		$data = $this->dataKeysToUpper($data);

		return empty($data['TASK_ID']) ? $this->call('post', 'Tasks', $data) : $this->call('put', 'Tasks', $data);
	}


	/**
	 * Disable Task
	 *
	 * @param int $id
	 * @return object
	 * @throws InsightlyException
	 */
	public function deleteTask($id = null)
	{
		if (!$id) {
			$this->addError(__FUNCTION__ . ' -> $id must be provided.');
		}
		return $this->call('delete', 'Tasks/' . $id);
	}


	/**
	 * Get task comments
	 *
	 * @param int $id - Task category ID
	 * @return object
	 * @throws InsightlyException
	 */
	public function getTaskComments($id = null)
	{
		if (!$id) {
			$this->addError(__FUNCTION__ . ' -> $id must be provided.');
		}

		return $this->call('get', 'Tasks/' . $id . '/Comments');
	}


	/**
	 * Add task comment
	 *
	 * @param int $id - Task category ID
	 * @param array $data - See https://api.insight.ly/v2.2/#!/Tasks/AddComment for fields
	 * @return object
	 * @throws InsightlyException
	 */
	public function createTaskComment($id = null, array $data = [])
	{
		if (!$id) {
			$this->addError(__FUNCTION__ . ' -> $id must be provided.');
		}

		if (!count($data)) {
			$this->addError(__FUNCTION__ . ' -> $data must be provided.');
		} else {
			$data = $this->dataKeysToUpper($data);
		}

		return $this->call('post', 'Tasks/' . $id . '/Comments', $data);
	}


	/**
	 * Follow task
	 *
	 * @param int $id - Task category ID
	 * @return object
	 * @throws InsightlyException
	 */
	public function followTask($id = null)
	{
		if (!$id) {
			$this->addError(__FUNCTION__ . ' -> $id must be provided.');
		}

		return $this->call('post', 'Tasks/' . $id . '/Follow');
	}


	/**
	 * Unfollow task
	 *
	 * @param int $id - Task category ID
	 * @return object
	 * @throws InsightlyException
	 */
	public function unfollowTask($id = null)
	{
		if (!$id) {
			$this->addError(__FUNCTION__ . ' -> $id must be provided.');
		}

		return $this->call('delete', 'Tasks/' . $id . '/Follow');
	}


	/**
	 * Get task follow record
	 *
	 * @param int $id - Task category ID
	 * @return object
	 * @throws InsightlyException
	 */
	public function isFollowTask($id = null)
	{
		if (!$id) {
			$this->addError(__FUNCTION__ . ' -> $id must be provided.');
		}

		return $this->call('get', 'Tasks/' . $id . '/Follow');
	}

}
