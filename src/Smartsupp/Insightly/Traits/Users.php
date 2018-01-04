<?php namespace Smartsupp\PhpInsightly\Traits;

/**
 * TODO: DON'T USE WITHOUT TEST ALL FUNCTIONS - THIS IS ONLY CONCEPT
 */
trait Users
{

	/**
	 * Get all users (single record if $id)
	 * @param int $id - User ID
	 * @return object
	 */
	public function getUsers($id = null)
	{
		return !$id ? $this->call('get', 'Users') : $this->call('get', 'Users/' . $id);
	}


	/**
	 * Get your own record
	 * @return object
	 */
	public function me()
	{
		return $this->call('get', 'Users/Me');
	}
	
}
