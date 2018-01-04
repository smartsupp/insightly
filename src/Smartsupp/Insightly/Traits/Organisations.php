<?php

namespace Smartsupp\PhpInsightly\Traits;

trait Organisations
{

	/**
	 * Get list of Organisations
	 *
	 * @param int $id - Organisation ID
	 * @return object
	 */
	public function getOrganisations($id = null)
	{
		return $this->call('get', 'Organisations' . ($id ? '/' . $id : ''));
	}


	public function getOrganizations($id = null)
	{
		return $this->getOrganisations($id);
	}


	/**
	 * Create/Update organisation
	 *
	 * @param array $data - for fields, see https://api.insight.ly/v2.2/#!/Organisations/AddOrganisation
	 * @return object
	 */
	public function saveOrganisation(array $data = [])
	{
		$data = $this->dataKeysToUpper($data);

		$method = empty($data['ORGANISATION_ID']) ? 'post' : 'put';
		return $this->call($method, 'Organisations', $data);
	}


	public function saveOrganization(array $data = [])
	{
		return $this->saveOrganisation($data);
	}


	/**
	 * Delete Organisation
	 *
	 * @param int $id - Organisation ID
	 * @return object
	 */
	public function deleteOrganisation($id)
	{
		return $this->call('delete', 'Organisations/' . $id);
	}


	public function deleteOrganization($id)
	{
		return $this->deleteOrganisation($id);
	}


	/**
	 * Get Organisation Image
	 *
	 * @param int $id - Organisation ID
	 * @return object
	 */
	public function getOrganisationImage($id)
	{
		return $this->call('get', 'Organisations/' . $id . '/Image');
	}


	public function getOrganizationImage($id)
	{
		return $this->getOrganisationImage($id);
	}


	/**
	 * Delete Organisation Image
	 *
	 * @param int $id - Organisation ID
	 * @return object
	 */
	public function deleteOrganisationImage($id)
	{
		return $this->call('delete', 'Organisations/' . $id . '/Image');
	}


	public function deleteOrganizationImage($id)
	{
		return $this->deleteOrganisationImage($id);
	}


	/**
	 * Create/Update organisation address
	 *
	 * @param int $id Organisation ID
	 * @param array $data - for fields, see https://api.insight.ly/v2.2/#!/Organisations/AddAddress
	 * @return object
	 */
	public function saveOrganisationAddress($id, array $data = [])
	{
		$data = $this->dataKeysToUpper($data);

		$method = empty($data['ADDRESS_ID']) ? 'post' : 'put';
		return $this->call($method, 'Organisations/' . $id . '/Addresses', $data);
	}


	public function saveOrganizationAddress($id, array $data = [])
	{
		return $this->saveOrganisationAddress($id, $data);
	}


	/**
	 * Delete an organisation address
	 *
	 * @param int $id Organisation ID
	 * @param int $aId Address ID
	 * @return object
	 */
	public function deleteOrganisationAddress($id, $aId)
	{
		return $this->call('delete', 'Organisations/' . $id . '/Addresses/' . $aId);
	}


	public function deleteOrganizationAddress($id, $aId)
	{
		return $this->deleteOrganisationAddress($id, $aId);
	}


	/**
	 * Add / update organisation contact info
	 *
	 * If !$data['CONTACT_INFO_ID'], add new otherwise update.
	 *
	 * @param int $id Organisation ID
	 * @param array $data . https://api.insight.ly/v2.2/#!/Organisations/AddContactInfo for fields
	 * @return object
	 */
	public function saveOrganisationContactInfo($id, array $data = [])
	{
		$data = $this->dataKeysToUpper($data);

		$method = empty($data['CONTACT_INFO_ID']) ? 'post' : 'put';
		return $this->call($method, 'Organisations/' . $id . '/ContactInfos', $data);
	}


	public function saveOrganizationContactInfo($id, array $data = [])
	{
		return $this->saveOrganisationContactInfo($id, $data);
	}


	/**
	 * Delete an organisation contact info
	 *
	 * @param int $id Organisation ID
	 * @param int $ciId Info ID
	 * @return object
	 */
	public function deleteOrganisationContactInfo($id, $ciId)
	{
		return $this->call('delete', 'Organisations/' . $id . '/ContactInfos/' . $ciId);
	}


	public function deleteOrganizationContactInfo($id, $ciId)
	{
		return $this->deleteOrganisationContactInfo($id, $ciId);
	}


	/**
	 * Add / update organisation date
	 *
	 * If !$data['DATE_ID'], add new otherwise update.
	 *
	 * @param int $id Organisation ID
	 * @param array $data . https://api.insight.ly/v2.2/#!/Organisations/AddDate for fields
	 * @return object
	 */
	public function saveOrganisationDate($id, array $data = [])
	{
		$data = $this->dataKeysToUpper($data);

		$method = empty($data['DATE_ID']) ? 'post' : 'put';
		return $this->call($method, 'Organisations/' . $id . '/Dates', $data);
	}


	public function saveOrganizationDate($id, array $data = [])
	{
		return $this->saveOrganisationDate($id, $data);
	}


	/**
	 * Delete an organisation date
	 *
	 * @param int $id Organisation ID
	 * @param int $dId Date ID
	 * @return object
	 */
	public function deleteOrganisationDate($id, $dId)
	{
		return $this->call('delete', 'Organisations/' . $id . '/Dates/' . $dId);
	}


	public function deleteOrganizationDate($id, $dId)
	{
		return $this->deleteOrganisationDate($id, $dId);
	}


	/**
	 * Update organisation custom field
	 *
	 * @param int $id Organisation ID
	 * @param array $data . https://api.insight.ly/v2.2/#!/Organisations/UpdateCustomField for fields
	 * @return object
	 */
	public function updateOrganisationCustomField($id, array $data = [])
	{
		$data = $this->dataKeysToUpper($data);

		return $this->call('put', 'Organisations/' . $id . '/CustomFields', $data);
	}


	public function updateOrganizationCustomField($id, array $data = [])
	{
		return $this->updateOrganisationCustomField($id, $data);
	}


	/**
	 * Delete organisation custom field
	 *
	 * @param int $id Organisation ID
	 * @param string $cfId Custom field ID
	 * @return void
	 */
	public function deleteOrganisationCustomField($id, $cfId)
	{
		return $this->call('put', 'Organisations/' . $id . '/CustomFields/' . $cfId);
	}


	public function deleteOrganizationCustomField($id, $cfId)
	{
		return $this->deleteOrganisationCustomField($id, $cfId);
	}


	/**
	 * Add organisation tag
	 *
	 * @param int $id Organisation ID
	 * @param string $tag
	 * @return object
	 */
	public function addOrganisationTag($id, $tag)
	{
		return $this->call('post', 'Organisations/' . $id . '/Tags', ['TAG_NAME' => $tag]);
	}


	public function addOrganizationTag($id, $tag)
	{
		return $this->addOrganisationTag($id, $tag);
	}


	/**
	 * Delete organisation tag
	 *
	 * @param int $id Organisation ID
	 * @param string $tag
	 * @return void
	 */
	public function deleteOrganisationTag($id, $tag)
	{
		return $this->call('delete', 'Organisations/' . $id . '/Tags/' . $tag);
	}


	public function deleteOrganizationTag($id, $tag)
	{
		return $this->deleteOrganisationTag($id, $tag);
	}


	/**
	 * Get Organisation Events
	 *
	 * @param int $id - Organisation ID
	 * @return object
	 */
	public function getOrganisationEvents($id)
	{
		return $this->call('get', 'Organisations/' . $id . '/Events');
	}


	public function getOrganizationEvents($id)
	{
		return $this->getOrganisationEvents($id);
	}


	/**
	 * Get Organisation Notes
	 *
	 * @param int $id - Organisation ID
	 * @return object
	 */
	public function getOrganisationNotes($id)
	{
		return $this->call('get', 'Organisations/' . $id . '/Notes');
	}


	public function getOrganizationNotes($id)
	{
		return $this->getOrganisationNotes($id);
	}


	/**
	 * Get Organisation Attachments
	 *
	 * @param int $id - Organisation ID
	 * @return object
	 */
	public function getOrganisationAttachments($id)
	{
		return $this->call('get', 'Organisations/' . $id . '/FileAttachments');
	}


	public function getOrganizationAttachments($id)
	{
		return $this->getOrganisationAttachments($id);
	}


	/**
	 * Get Organisation Emails
	 *
	 * @param int $id - Organisation ID
	 * @return object
	 */
	public function getOrganisationEmails($id)
	{
		return $this->call('get', 'Organisations/' . $id . '/Emails');
	}


	public function getOrganizationEmails($id)
	{
		return $this->getOrganisationEmails($id);
	}


	/**
	 * Get Organisation Tasks
	 *
	 * @param int $id - Organisation ID
	 * @return object
	 */
	public function getOrganisationTasks($id)
	{
		return $this->call('get', 'Organisations/' . $id . '/Tasks');
	}


	public function getOrganizationTasks($id)
	{
		return $this->getOrganisationTasks($id);
	}


	/**
	 * Get Organisation Follow Status
	 *
	 * @param int $id - Organisation ID
	 * @return object
	 */
	public function isFollowOrganisation($id)
	{
		return $this->call('get', 'Organisations/' . $id . '/Follow');
	}


	public function isFollowOrganization($id)
	{
		return $this->isFollowOrganisation($id);
	}


	/**
	 * Follow Organisation
	 *
	 * @param int $id - Organisation ID
	 * @return object
	 */
	public function followOrganisation($id)
	{
		return $this->call('post', 'Organisations/' . $id . '/Follow');
	}


	public function followOrganization($id)
	{
		return $this->followOrganisation($id);
	}


	/**
	 * Unfollow Organisation
	 *
	 * @param int $id - Organisation ID
	 * @return object
	 */
	public function unfollowOrganisation($id)
	{
		return $this->call('delete', 'Organisations/' . $id . '/Follow');
	}


	public function unfollowOrganization($id)
	{
		return $this->unfollowOrganisation($id);
	}


	/**
	 * Add activity to organisation
	 *
	 * @param int $id - Organisation ID
	 * @return object
	 */
	public function addOrganisationActivity($id)
	{
		return $this->call('delete', 'Organisations/' . $id . '/Follow');
	}


	public function addOrganizationActivity($id)
	{
		return $this->addOrganisationActivity($id);
	}

}
