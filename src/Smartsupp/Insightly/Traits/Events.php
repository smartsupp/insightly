<?php namespace Smartsupp\PhpInsightly\Traits;

use Smartsupp\PhpInsightly\InsightlyException;

/**
 * TODO: DON'T USE WITHOUT TEST ALL FUNCTIONS - THIS IS ONLY CONCEPT
 */
trait Events
{

	/**
	 * Get all events (singular if $id)
	 *
	 * @param int $id Event ID
	 * @return object
	 */
	public function getEvents($id = null)
	{
		return !$id ? $this->call('get', 'Events') : $this->call('get', 'Events/' . $id);
	}


	/**
	 * Get single event
	 *
	 * @param int $id Event ID
	 * @return object
	 */
	public function getEvent($id)
	{
		return $this->getEvents($id);
	}


	/**
	 * Create/Update event
	 *
	 * @param int $id Event ID
	 * @param array $data - See https://api.insight.ly/v2.2/#!/Events/AddEvent for fields
	 * @return object
	 * @throws InsightlyException
	 */
	public function saveEvent(array $data = [])
	{
		if (!count($data)) {
			$this->addError(__FUNCTION__ . ' -> $data must be provided.');
		} else {
			$data = $this->dataKeysToUpper($data);
		}

		return empty($data['EVENT_ID']) ? $this->call('post', 'Events', $data) : $this->call('put', 'Events', $data);
	}


	/**
	 * Delete event
	 *
	 * @param int $id Event ID
	 * @return object
	 */
	public function deleteEvent($id)
	{
		return $this->call('delete', 'Events/' . $id);
	}

}
