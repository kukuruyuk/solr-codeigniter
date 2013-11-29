<?php
class Solr extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->library('Solarium_client');
	}

	public function index(){
		$client = $this->solarium_client->solr;

		$query = $client->createQuery($client::QUERY_SELECT);

		// this executes the query and returns the result
		$resultset = $client->execute($query);

		// display the total number of documents found by solr
		echo 'NumFound: '.$resultset->getNumFound();

		// show documents using the resultset iterator
		foreach ($resultset as $document) {

		    echo '<hr/><table>';

		    // the documents are also iterable, to get all fields
		    foreach($document AS $field => $value)
		    {
		        // this converts multivalue fields to a comma-separated string
		        if(is_array($value)) $value = implode(', ', $value);

		        echo '<tr><th>' . $field . '</th><td>' . $value . '</td></tr>';
		    }

		    echo '</table>';
		}
	}
}