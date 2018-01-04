<?php namespace Smartsupp\PhpInsightly\Traits;

/**
 * TODO: DON'T USE WITHOUT TEST ALL FUNCTIONS - THIS IS ONLY CONCEPT
 */
trait TeamMembers
{

	/**
	 * Get all Team Members (single record if $id)
	 *
	 * @param int $id - Team member ID
	 * @return object
	 */
	public function getTeamMembers($id = null)
	{
		return !$id ? $this->call('get', 'TeamMembers') : $this->call('get', 'TeamMembers/' . $id);
	}


	/**
	 * Create Team Member
	 *
	 * @param array $data - See https://api.insight.ly/v2.2/#!/TeamMembers/AddTeamMember for fields
	 * @return object
	 */
	public function createTeamMember(array $data = [])
	{
		$data = $this->dataKeysToUpper($data);

		return $this->call('post', 'TeamMembers', $data);
	}


	/**
	 * Delete Team Member
	 *
	 * @param int $id - Team member ID (NOT USER ID, It's the PERMISSION_ID)
	 * @return object
	 */
	public function deleteTeamMember($id)
	{
		return $this->call('delete', 'TeamMembers/' . $id);
	}

}
