<?php namespace Smartsupp\PhpInsightly;

use Psr\Http\Message\ResponseInterface;

class Insightly
{

	//use Traits\ActivitySets;
	//use Traits\Comments;
	//use Traits\Contacts;
	//use Traits\Countries;
	//use Traits\Currencies;
	//use Traits\CustomFieldGroups;
	//use Traits\CustomFields;
	//use Traits\Emails;
	//use Traits\Events;
	//use Traits\FileAttachments;
	//use Traits\FileCategories;
	//use Traits\Follows;
	use Traits\Helpers;
	//use Traits\Instance;
	//use Traits\Leads;
	//use Traits\LeadSources;
	//use Traits\LeadStatus;
	//use Traits\Milestones;
	//use Traits\Notes;
	//use Traits\Opportunities;
	//use Traits\OpportunityCategories;
	//use Traits\OpportunityStateReasons;
	use Traits\Organisations;
	//use Traits\Permissions;
	//use Traits\Pipelines;
	//use Traits\PipelineStages;
	//use Traits\ProjectCategories;
	//use Traits\Projects;
	//use Traits\Relationships;
	//use Traits\Tags;
	//use Traits\TaskCategories;
	//use Traits\Tasks;
	//use Traits\TeamMembers;
	//use Traits\Teams;
	//use Traits\Users;


	/** @var InsightlyRequest */
	private $request;

	/** @var string */
	private $apiVersion = 'v2.2';


	/**
	 * Initialise the Insightly class
	 *
	 * @param string $apiKey
	 * @param string $apiVersion
	 * @throws InsightlyException
	 * @return void
	 */
	public function __construct($apiKey = null, $apiVersion = null)
	{
		if (!$apiKey) {
			throw new InsightlyException('Insightly API key required');
		}
		$this->request = new InsightlyRequest($apiKey);

		if ($apiVersion) {
			$this->apiVersion = $apiVersion;
		}
	}


	/**
	 * Add message to error array
	 *
	 * @param string $message Error message content
	 * @throws InsightlyException
	 */
	protected function addError($message)
	{
		throw new InsightlyException($message);
	}


	/**
	 * Send the request
	 *
	 * @param string $httpMethod - REST('get', 'post', 'put', 'delete')
	 * @param string $endpoint
	 * @param array $data
	 * @return object
	 */
	public function call($httpMethod, $endpoint, array $data = [])
	{
		$endpoint = $this->apiVersion . '/' . $endpoint;

		/** @var ResponseInterface $response */
		$response = !count($data) ? $this->request->$httpMethod($endpoint) : $this->request->$httpMethod($endpoint, $data);

		$jsonResponse = json_decode((string) $response->getBody());

		return $jsonResponse;
	}

}
