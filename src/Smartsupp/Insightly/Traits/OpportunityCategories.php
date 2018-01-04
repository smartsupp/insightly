<?php

namespace Smartsupp\Insightly\Traits;

use Smartsupp\Insightly\InsightlyException;

/**
 * TODO: DON'T USE WITHOUT TEST ALL FUNCTIONS - THIS IS ONLY CONCEPT
 */
trait OpportunityCategories
{

	/**
	 * Get opportunity categories (single category if $int)
	 *
	 * @param int $id Category ID
	 * @return object
	 */
	public function getOpportunityCategories($id = null)
	{
		return !$id ? $this->call('get', 'OpportunityCategories') : $this->call('get', 'OpportunityCategories/' . $id);
	}


	/**
	 * Create / Update opportunity category (if $data['CATEGORY_ID'] - update)
	 *
	 * @param array $data - https://api.insight.ly/v2.2/#!/OpportunityCategories/AddOpportunityCategory
	 * @return object
	 * @throws InsightlyException
	 */
	public function saveOpportunityCategory(array $data = [])
	{
		if (!count($data)) {
			$this->addError(__FUNCTION__ . ' -> $data must be provided.');
		} else {
			$data = $this->dataKeysToUpper($data);
		}

		return !empty($data['CATEGORY_ID']) ? $this->call('put', 'OpportunityCategories', $data) : $this->call('post', 'OpportunityCategories', $data);
	}


	/**
	 * Deactivate opportunity category
	 *
	 * @param int $id Category ID
	 * @return object
	 */
	public function deleteOpportunityCategory($id)
	{
		return $this->call('delete', 'OpportunityCategories/' . $id);
	}

}
