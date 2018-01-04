<?php

namespace Smartsupp\Insightly\Traits;

/**
 * TODO: DON'T USE WITHOUT TEST ALL FUNCTIONS - THIS IS ONLY CONCEPT
 */
trait Teams
{

	/**
	 * Get all Teams (single record if $id)
	 *
	 * @param int $id - Team ID
	 * @return object
	 */
	public function getTeams($id = null)
	{
		return !$id ? $this->call('get', 'Teams') : $this->call('get', 'Teams/' . $id);
	}


	/**
	 * Create Team
	 *
	 * @param array $data - See https://api.insight.ly/v2.2/#!/Teams/AddTeam for fields
	 * @return object
	 */
	public function saveTeam(array $data = [])
	{
		$data = $this->dataKeysToUpper($data);

		return empty($data['TEAM_ID']) ? $this->call('post', 'Teams', $data) : $this->call('post', 'Teams', $data);
	}


	/**
	 * Delete Team
	 *
	 * @param int $id - Team ID
	 * @return object
	 */
	public function deleteTeam($id)
	{
		return $this->call('delete', 'Teams/' . $id);
	}

}
