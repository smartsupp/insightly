<?php

namespace Smartsupp\Insightly\Traits;

use Smartsupp\Insightly\InsightlyException;

/**
 * TODO: DON'T USE WITHOUT TEST ALL FUNCTIONS - THIS IS ONLY CONCEPT
 */
trait Contacts
{

	/**
	 * Get single contact
	 *
	 * If $id - get single record, otherwise get all.
	 *
	 * @param int $id Contact ID
	 * @return object
	 */
	public function getContacts($id = null)
	{
		return $this->call('get', 'Contacts/' . $id);
	}


	/**
	 * Add / Update contact
	 *
	 * @param array $data - For fields, see https://api.insight.ly/v2.2/#!/Contacts/AddContact
	 * @return object
	 * @throws InsightlyException
	 */
	public function saveContact(array $data = [])
	{
		if (!count($data)) {
			$this->addError(__FUNCTION__ . ' -> $data must have stuff in it.');
		}

		$data = $this->dataKeysToUpper($data);

		return empty($data['CONTACT_ID']) ? $this->call('post', 'Contacts', $data) : $this->call('put', 'Contacts', $data);
	}


	/**
	 * Delete contact
	 *
	 * @param int $id Contact ID
	 * @return object
	 */
	public function deleteContact($id)
	{
		return $this->call('delete', 'Contacts/' . $id);
	}


	/**
	 * Get contact image
	 *
	 * @param int $id Contact ID
	 * @return object
	 */
	public function getContactImage($id)
	{
		return $this->call('get', 'Contacts/' . $id . '/Image');
	}


	/**
	 * Delete contact image
	 *
	 * @param int $id Contact ID
	 * @return object
	 */
	public function deleteContactImage($id)
	{
		return $this->call('delete', 'Contacts/' . $id . '/Image');
	}


	/**
	 * Create / update contact address
	 *
	 * @param int $id Contact ID.
	 * @param array $data - For fields, see https://api.insight.ly/v2.2/#!/Contacts/AddAddress
	 * @return object
	 */
	public function saveContactAddress($id, array $data = [])
	{
		$data = $this->dataKeysToUpper($data);

		if (empty($data['ADDRESS_ID'])) {
			return $this->call('post', 'Contacts/' . $id . '/Addresses', $data);
		} else {
			return $this->call('put', 'Contacts/' . $id . '/Addresses', $data);
		}
	}


	/**
	 * Delete contact address
	 *
	 * @param int $id User ID
	 * @param int $addressId Address ID.
	 * @return object
	 */
	public function deleteContactAddress($id, $addressId)
	{
		return $this->call('delete', 'Contacts/' . $id . '/Addresses/' . $addressId);
	}


	/**
	 * Add / update contact info
	 *
	 * If !$data['CONTACT_INFO_ID'], add new otherwise update.
	 *
	 * @param int $id Contact ID.
	 * @param array $data For fields - https://api.insight.ly/v2.2/#!/Contacts/AddContactInfo
	 * @return object
	 * @throws InsightlyException
	 */
	public function saveContactInfo($id, array $data = [])
	{
		if (!count($data)) {
			$this->addError(__FUNCTION__ . ' -> $data must be provided.');
		} else {
			$data = $this->dataKeysToUpper($data);
		}

		if (!empty($data['CONTACT_INFO_ID'])) {
			return $this->call('put', 'Contacts/' . $id . '/ContactInfos', $data);
		} else {
			return $this->call('post', 'Contacts/' . $id . '/ContactInfos', $data);
		}
	}


	/**
	 * Delete contact info
	 *
	 * @param int $id User ID
	 * @param int $infoId Info ID.
	 * @return object
	 */
	public function deleteContactInfo($id, $infoId )
	{
		return $this->call('delete', 'Contacts/' . $id . '/ContactInfos/' . $infoId);
	}


	/**
	 * Save contact date entry
	 *
	 * !$data['DATE_ID'] = create, otherwise update
	 *
	 * @param int $id Contact ID
	 * @param array $data - See https://api.insight.ly/v2.2/#!/Contacts/AddDate for fields
	 * @return object
	 */
	public function saveContactDate($id, array $data = [])
	{
		$data = $this->dataKeysToUpper($data);

		if (!empty($data['DATE_ID'])) {
			return $this->call('put', 'Contacts/' . $id . '/Dates', $data);
		} else {
			return $this->call('post', 'Contacts/' . $id . '/Dates', $data);
		}
	}


	/**
	 * Delete contact date entry
	 *
	 * @param int $id User ID
	 * @param int $dateId Date ID.
	 * @return object
	 */
	public function deleteContactDate($id, $dateId)
	{
		return $this->call('delete', 'Contacts/' . $id . '/Dates/' . $dateId);
	}


	/**
	 * Update contact custom field
	 *
	 * @param int $id Contact ID
	 * @param array $data - See https://api.insight.ly/v2.2/#!/Contacts/UpdateCustomField for fields
	 * @return object
	 * @throws InsightlyException
	 */
	public function updateContactCustomField($id, array $data = [])
	{
		if (!count($data)) {
			$this->addError(__FUNCTION__ . ' -> $data must be set.');
		} else {
			$data = $this->dataKeysToUpper($data);
		}

		return $this->call('put', 'Contacts/' . $id . '/CustomFields', $data);
	}


	/**
	 * Delete contact custom field
	 *
	 * @param int $id User ID
	 * @param int $cfId Date ID.
	 * @return object
	 */
	public function deleteContactCustomField($id, $cfId)
	{
		return $this->call('delete', 'Contacts/' . $id . '/CustomFields/' . $cfId);
	}


	/**
	 * Add tag to contact
	 *
	 * @param int $id User ID
	 * @param string $tag Tag name
	 * @return object
	 */
	public function addContactTag($id, $tag)
	{
		return $this->call('post', 'Contacts/' . $id . '/Tags', ['TAG_NAME' => $tag]);
	}


	/**
	 * Delete contact tag
	 *
	 * @param int $id User ID
	 * @param string $tag Tag name
	 * @return object
	 */
	public function deleteContactTag($id, $tag)
	{
		return $this->call('delete', 'Contacts/' . $id . '/Tags/' . $tag);
	}


	/**
	 * Get contact events
	 *
	 * @param int $id Contact ID
	 * @return object
	 */
	public function getContactEvents($id)
	{
		return $this->call('get', 'Contacts/' . $id . '/Events');
	}


	/**
	 * Get contact notes
	 *
	 * @param int $id Contact ID
	 * @return object
	 */
	public function getContactNotes($id)
	{
		return $this->call('get', 'Contacts/' . $id . '/Notes');
	}


	/**
	 * Create contact note
	 *
	 * @param int $id Contact ID
	 * @param array $data - See https://api.insight.ly/v2.2/#!/Contacts/AddNote for fields
	 * @return object
	 * @throws InsightlyException
	 */
	public function createContactNote($id, array $data = [])
	{
		if (!count($data)) {
			$this->addError(__FUNCTION__ . ' -> $data must be set.');
		} else {
			$data = $this->dataKeysToUpper($data);

		}

		return $this->call('post', 'Contacts/' . $id . '/Notes', $data);
	}


	/**
	 * Get contact emails
	 *
	 * @param int $id Contact ID
	 * @return object
	 */
	public function getContactEmails($id)
	{
		return $this->call('get', 'Contacts/' . $id . '/Emails');
	}


	/**
	 * Get contact Tasks
	 *
	 * @param int $id Contact ID
	 * @return object
	 */
	public function getContactTasks($id)
	{
		return $this->call('get', 'Contacts/' . $id . '/Tasks');
	}

}
