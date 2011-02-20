<?php

	class SimpleDB extends AWS {
		
		const REGION_US_E_1 = 'sdb.amazonaws.com';
		const REGION_US_W_1 = 'sdb.us-west-1.amazonaws.com';
		const REGION_EU_W_1 = 'sdb.eu-west-1.amazonaws.com';
		const REGION_APAC_SE_1 = 'sdb.ap-southeast-1.amazonaws.com';
		
		// define the API version, which is required for all sub-classes
		protected $api_version = '2009-04-15';
		
		protected $endpoint = null;
		protected $xml_namespace = 'http://sdb.amazonaws.com/doc/2009-04-15';
		
		public function __construct ( $aws_access_key = null, $aws_secret = null, $endpoint = self::REGION_US_E_1 ) {
			
			parent::__construct( $aws_access_key, $aws_secret );
			
			$this->endpoint = $endpoint;
			
		}
		
		public function list_domains ( $max_number_of_domains = null, $options = array() ) {
		
			if ( $max_number_of_domains != null ) {
				$options['MaxNumberOfDomains'] = $max_number_of_domains;
			}
		
			$result = $this->request( 'ListDomains', $options );
			
			return $result;
			
		}
		
		public function create_domain ( $name, $options = array() ) {
		
			$options['DomainName'] = $name;
			
			$result = $this->request( 'CreateDomain', $options );
			
			return $result;
			
		}
		
	}

?>