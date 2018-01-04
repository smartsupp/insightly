<?php namespace Smartsupp\PhpInsightly\Traits;

/**
 * TODO: DON'T USE WITHOUT TEST ALL FUNCTIONS - THIS IS ONLY CONCEPT
 */
trait LeadSources
{

	/**
	 * Get all lead sources
	 *
	 * @return object
	 */
	public function getLeadSources()
	{
		return $this->call('get', 'LeadSources');
	}


	/**
	 * Create / Update lead source
	 *
	 * @param array $data - See https://api.insight.ly/v2.2/#!/LeadSources/AddLeadSource for field
	 * @return object
	 */
	public function saveLeadSource(array $data = [])
	{
		$data = $this->dataKeysToUpper($data);

		if (empty($data['LEAD_SOURCE_ID'])) {
			return $this->call('post', 'LeadSources', $data);
		} else {
			return $this->call('put', 'LeadSources', $data);
		}
	}


	/**
	 * Delete lead source
	 *
	 * @param int $id
	 * @return object
	 */
	public function deleteLeadSource($id)
	{
		return $this->call('delete', 'LeadSources/' . $id);
	}
    
}
