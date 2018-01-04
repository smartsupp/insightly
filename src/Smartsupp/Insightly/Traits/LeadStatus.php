<?php namespace Smartsupp\PhpInsightly\Traits;

/**
 * TODO: DON'T USE WITHOUT TEST ALL FUNCTIONS - THIS IS ONLY CONCEPT
 */
trait LeadStatus
{

	/**
	 * Get all lead Statuses
	 *
	 * @return object
	 */
	public function getLeadStatuses()
	{
		return $this->call('get', 'LeadStatuses');
	}


	/**
	 * Create / Update lead Status
	 *
	 * @param array $data - See https://api.insight.ly/v2.2/#!/LeadStatuses/AddLeadStatus for fields
	 * @return object
	 */
	public function saveLeadStatus(array $data = [])
	{
		$data = $this->dataKeysToUpper($data);

		if (empty($data['LEAD_STATUS_ID'])) {
			return $this->call('post', 'LeadStatuses', $data);
		} else {
			return $this->call('put', 'LeadStatuses', $data);
		}
	}


	/**
	 * Delete lead Status
	 *
	 * @param int $id
	 * @return object
	 */
	public function deleteLeadStatus($id)
	{
		return $this->call('delete', 'LeadStatuses/' . $id);
	}

}
