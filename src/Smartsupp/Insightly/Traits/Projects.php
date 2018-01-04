<?php

namespace Smartsupp\Insightly\Traits;

use Smartsupp\Insightly\InsightlyException;

/**
 * TODO: DON'T USE WITHOUT TEST ALL FUNCTIONS - THIS IS ONLY CONCEPT
 */
trait Projects
{

	/**
	 * Get all projects (if $id, retrieve single project)
	 *
	 * @param int $id Project ID
	 * @return object
	 * @throws InsightlyException
	 */
	public function getProjects($id = null)
	{
		return !$id ? $this->call('get', 'Projects') : $this->call('get', 'Projects/' . $id);
	}


	/**
	 * Create / Update project
	 *
	 * @param array $data - See https://api.insight.ly/v2.2/#!/Projects/AddProject for field
	 * @return object
	 * @throws InsightlyException
	 */
	public function saveProject(array $data = [])
	{
		$data = $this->dataKeysToUpper($data);

		return empty($data['PROJECT_ID']) ? $this->call('post', 'Projects', $data) : $this->call('put', 'Projects', $data);
	}


	/**
	 * Delete Project
	 *
	 * @param int $id Project ID
	 * @return object
	 * @throws InsightlyException
	 */
	public function deleteProject($id = null)
	{
		if (!$id) {
			$this->addError(__FUNCTION__ . ' -> $id must be provided.');
		}
		return $this->call('delete', 'Projects/' . $id);
	}


	/**
	 * Get project image
	 *
	 * @param int $id Project ID
	 * @return object
	 * @throws InsightlyException
	 */
	public function getProjectImage($id = null)
	{
		if (!$id) {
			$this->addError(__FUNCTION__ . ' -> $id must be provided.');
		}

		return $this->call('get', 'Projects/' . $id . '/Image');
	}


	/**
	 * Delete project image
	 *
	 * @param int $id Project ID
	 * @return object
	 * @throws InsightlyException
	 */
	public function deleteProjectImage($id = null)
	{
		if (!$id) {
			$this->addError(__FUNCTION__ . ' -> $id must be provided.');
		}

		return $this->call('delete', 'Projects/' . $id . '/Image');
	}


	/**
	 * Update project custom field
	 *
	 * @param int $id Project ID
	 * @param array $data - See https://api.insight.ly/v2.2/#!/Projects/UpdateCustomField for fields
	 * @return object
	 * @throws InsightlyException
	 */
	public function updateProjectCustomField($id = null, array $data = [])
	{
		if (!$id) {
			$this->addError(__FUNCTION__ . ' -> $id must be provided.');
		}

		if (!count($data)) {
			$this->addError(__FUNCTION__ . ' -> $data must be provided.');
		} else {
			$data = $this->dataKeysToUpper($data);
		}

		return $this->call('put', 'Projects/' . $id . '/Image');
	}


	/**
	 * Delete project custom field
	 *
	 * @param int $id Project ID
	 * @param string $cf_id Custom Field ID
	 * @return object
	 * @throws InsightlyException
	 */
	public function deleteProjectCustomField($id = null, $cf_id = false)
	{
		if (!$id) {
			$this->addError(__FUNCTION__ . ' -> $id must be provided.');
		}

		if (!$cf_id) {
			$this->addError(__FUNCTION__ . ' -> $cf_id must be provided.');
		}

		return $this->call('delete', 'Projects/' . $id . '/CustomFields/' . $cf_id);
	}


	/**
	 * Add project tag
	 *
	 * @param int $id Project ID
	 * @param array $data - See https://api.insight.ly/v2.2/#!/Projects/UpdateCustomField for fields
	 * @return object
	 * @throws InsightlyException
	 */
	public function createProjectTag($id = null, array $data = [])
	{
		if (!$id) {
			$this->addError(__FUNCTION__ . ' -> $id must be provided.');
		}

		if (!count($data)) {
			$this->addError(__FUNCTION__ . ' -> $data must be provided.');
		} else {
			$data = $this->dataKeysToUpper($data);
		}

		return $this->call('post', 'Projects/' . $id . '/Tags', $data);
	}


	/**
	 * Delete project tag
	 *
	 * @param int $id Project ID
	 * @param string $tag Tag name
	 * @return object
	 * @throws InsightlyException
	 */
	public function deleteProjectTag($id = null, $tag = false)
	{
		if (!$id) {
			$this->addError(__FUNCTION__ . ' -> $id must be provided.');
		}

		if (!$tag) {
			$this->addError(__FUNCTION__ . ' -> $tag must be provided.');
		}

		return $this->call('delete', 'Projects/' . $id . '/Tags/' . $tag);
	}


	/**
	 * Get project events
	 *
	 * @param int $id Project ID
	 * @return object
	 * @throws InsightlyException
	 */
	public function getProjectEvents($id = null)
	{
		if (!$id) {
			$this->addError(__FUNCTION__ . ' -> $id must be provided.');
		}

		return $this->call('get', 'Projects/' . $id . '/Events');
	}


	/**
	 * Get project notes
	 *
	 * @param int $id Project ID
	 * @return object
	 * @throws InsightlyException
	 */
	public function getProjectNotes($id = null)
	{
		if (!$id) {
			$this->addError(__FUNCTION__ . ' -> $id must be provided.');
		}

		return $this->call('get', 'Projects/' . $id . '/Notes');
	}


	/**
	 * Add project note
	 *
	 * @param int $id Project ID
	 * @param array $data - See https://api.insight.ly/v2.2/#!/Projects/AddNote for fields
	 * @return object
	 * @throws InsightlyException
	 */
	public function createProjectNote($id = null, array $data = [])
	{
		if (!$id) {
			$this->addError(__FUNCTION__ . ' -> $id must be provided.');
		}

		if (!count($data)) {
			$this->addError(__FUNCTION__ . ' -> $data must be provided.');
		} else {
			$data = $this->dataKeysToUpper($data);
		}

		return $this->call('post', 'Projects/' . $id . '/Notes', $data);
	}


	/**
	 * Follow project
	 *
	 * @param int $id Project ID
	 * @return object
	 * @throws InsightlyException
	 */
	public function followProject($id = null)
	{
		if (!$id) {
			$this->addError(__FUNCTION__ . ' -> $id must be provided.');
		}

		return $this->call('post', 'Projects/' . $id . '/Follow');
	}


	/**
	 * Unfollow project
	 *
	 * @param int $id Project ID
	 * @return object
	 * @throws InsightlyException
	 */
	public function unfollowProject($id = null)
	{
		if (!$id) {
			$this->addError(__FUNCTION__ . ' -> $id must be provided.');
		}

		return $this->call('delete', 'Projects/' . $id . '/Follow');
	}


	/**
	 * Check project follow status
	 *
	 * @param int $id Project ID
	 * @return object
	 * @throws InsightlyException
	 */
	public function isFollowProject($id = null)
	{
		if (!$id) {
			$this->addError(__FUNCTION__ . ' -> $id must be provided.');
		}

		return $this->call('get', 'Projects/' . $id . '/Follow');
	}


	/**
	 * Add project activity
	 *
	 * @param int $id Project ID
	 * @param array $data - See https://api.insight.ly/v2.2/#!/Projects/AddActivitySetAssignment for fields
	 * @return object
	 * @throws InsightlyException
	 */
	public function createProjectActivity($id = null, array $data = [])
	{
		if (!$id) {
			$this->addError(__FUNCTION__ . ' -> $id must be provided.');
		}

		if (!count($data)) {
			$this->addError(__FUNCTION__ . ' -> $data must be provided.');
		} else {
			$data = $this->dataKeysToUpper($data);
		}

		return $this->call('post', 'Projects/' . $id . '/ActivitySetAssignment', $data);
	}


	/**
	 * Clear project pipeline
	 *
	 * @param int $id Project ID
	 * @return object
	 * @throws InsightlyException
	 */
	public function clearProjectPipeline($id = null)
	{
		if (!$id) {
			$this->addError(__FUNCTION__ . ' -> $id must be provided.');
		}

		return $this->call('delete', 'Projects/' . $id . '/Pipeline');
	}


	/**
	 * Change project pipeline
	 *
	 * @param int $id Project ID
	 * @param array $data Project ID - https://api.insight.ly/v2.2/#!/Projects/UpdatePipeline
	 * @return object
	 * @throws InsightlyException
	 */
	public function changeProjectPipeline($id = null, array $data = [])
	{
		if (!$id) {
			$this->addError(__FUNCTION__ . ' -> $id must be provided.');
		}

		if (!count($data)) {
			$this->addError(__FUNCTION__ . ' -> $data must be provided.');
		} else {
			$data = $this->dataKeysToUpper($data);
		}

		return $this->call('put', 'Projects/' . $id . '/Pipeline');
	}


	/**
	 * Change project pipeline stage
	 *
	 * @param int $id Project ID
	 * @param array $data Project ID - https://api.insight.ly/v2.2/#!/Projects/UpdatePipelineStage
	 * @return object
	 * @throws InsightlyException
	 */
	public function changeProjectPipelineStage($id = null, array $data = [])
	{
		if (!$id) {
			$this->addError(__FUNCTION__ . ' -> $id must be provided.');
		}

		if (!count($data)) {
			$this->addError(__FUNCTION__ . ' -> $data must be provided.');
		} else {
			$data = $this->dataKeysToUpper($data);
		}

		return $this->call('put', 'Projects/' . $id . '/PipelineStage');
	}


	/**
	 * Get project milestones
	 *
	 * @param int $id Project ID
	 * @return object
	 * @throws InsightlyException
	 */
	public function getProjectMilestones($id = null)
	{
		if (!$id) {
			$this->addError(__FUNCTION__ . ' -> $id must be provided.');
		}

		return $this->call('get', 'Projects/' . $id . '/Milestones');
	}


	/**
	 * Create / Update project milestone
	 *
	 * @param int $id Project ID
	 * @param array $data - See https://api.insight.ly/v2.2/#!/Projects/AddMilestone for fields
	 * @return object
	 * @throws InsightlyException
	 */
	public function saveProjectMilestone($id = null, array $data = [])
	{
		if (!$id) {
			$this->addError(__FUNCTION__ . ' -> $id must be provided.');
		}

		if (!count($data)) {
			$this->addError(__FUNCTION__ . ' -> $data must be provided.');
		} else {
			$data = $this->dataKeysToUpper($data);
		}

		return empty($data['MILESTONE_ID']) ? $this->call('post', 'Projects/' . $id . '/Milestones', $data) : $this->call('put',
			'Projects/' . $id . '/Milestones', $data);
	}


	/**
	 * Delete project milestone
	 *
	 * @param int $id Project ID
	 * @param int $mId Milestone ID
	 * @return object
	 * @throws InsightlyException
	 */
	public function deleteProjectMilestones($id = null, $mId = false)
	{
		if (!$id) {
			$this->addError(__FUNCTION__ . ' -> $id must be provided.');
		}

		if (!$mId) {
			$this->addError(__FUNCTION__ . ' -> $m_id must be provided.');
		}

		return $this->call('delete', 'Projects/' . $id . '/Milestones/' . $mId);
	}


	/**
	 * Get project emails
	 *
	 * @param int $id Project ID
	 * @return object
	 * @throws InsightlyException
	 */
	public function getProjectEmails($id = null)
	{
		return $this->call('get', 'Projects/' . $id . '/Emails');
	}


	/**
	 * Get project attachments
	 *
	 * @param int $id Project ID
	 * @return object
	 * @throws InsightlyException
	 */
	public function getProjectAttachments($id = null)
	{
		return $this->call('get', 'Projects/' . $id . '/FileAttachments');
	}


	/**
	 * Get project tasks
	 *
	 * @param int $id Project ID
	 * @return object
	 * @throws InsightlyException
	 */
	public function getProjectTasks($id = null)
	{
		return $this->call('get', 'Projects/' . $id . '/Tasks');
	}

}
