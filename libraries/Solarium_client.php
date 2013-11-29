<?php
class Solarium_client
{
    public $solr;
    public function __construct(){
        $CI =& get_instance();

        $CI->config->load('solarium');

        require 'solarium/vendor/autoload.php';

        $this->solr = new Solarium\Client($CI->config->item('solarium_endpoint'));
    }
}
