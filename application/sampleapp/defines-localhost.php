<?php
return array(
		#Application ID
	    'app_id' => 'sampleapp',
		#Application NAME
	    'app_name' => 'Sample Application',
	    #Maintenance Mode
	    'maintenance' => false,
		#framework version
	    'version' => '0.0.1',
	    #gzip code compressor
	    'gzip' => TRUE,
	    #HTML5 code
	    'html5' => TRUE,
		#titulo
	    'title' => 'The Beatle Framework',
	    #public URL
	    'public_url' => 'http://localhost/The-Beatle-Framework/application/modelo/public',
	    #page encoding
	    'page_encoding' => 'UTF-8',
	    #page language
	    'page_lang' => 'pt-br',
	    #page description
	    'page_description' => 'Sample Application',
	    #page authot
	    'page_author' => 'marcoslucas@me.com',
	    
	    #Google Analytics Tracker Code
	    'ga_code' => 'UA-00000000-1',
	    #CDN javascripts
	    'cdn_js' => 'http://localhost/The-Beatle-Framework/cdn/js/',
	    #CDN jQuery
	    'cdn_jquery' => 'http://localhost/The-Beatle-Framework/cdn/jquery/',
	    #CDN jQuery
	    'cdn_bootstrap' => 'http://localhost/The-Beatle-Framework/cdn/bootstrap/',
	    #CDN CSS's
	    'cdn_css' => 'http://localhost/The-Beatle-Framework/cdn/css/',
	    #CDN Images
	    'cdn_images' => 'http://localhost/The-Beatle-Framework/cdn/images/',
	    
	    #default db server
	    'default_db_server' => 'mysql-local',
	    
	    #DB Configs
	    'db'   => array(
	    	#Oracle Producao
	        'mysql-local' => array(
	            'type'       => 'mysql',
	            'host'       => '127.0.0.1',
	            'port'       => '3306',
	            'database'   => 'sampleapp',
	            'username'   => 'root',
	            'password'   => '',
	            'persistent' => false
	        ),
			
			
	    ),#fim config de DBs
	
	
		#Memcache config
	    'memcached' => array(
	    	#Default Memcache
	        'mcache1' => array(
	        	'host' => '127.0.0.1',
	            'port' => '11211'
	        ),
	        #Memcache 2
	        /*
	        'mcache2' => array(
	        	'host' => 'localhost',
	            'port' => '11212'
	        ),
	        #Memcache 3
	        'mcache3' => array(
	        	'host' => 'localhost',
	            'port' => '11213'
	        ),
	        */
	    ),#end memcache config
	    
	    
	    #E-mail configs
	    'email' => array(
			'server-host'     => '',
			'server-port'     => '',
			'sender_name'     => '',
			'sender_address'  => '',
			'sender_username' => '',
			'sender_passwd'   => '',
			'is-html' 		  => true,
		),
	    
	    
	    
	    
);
?>
