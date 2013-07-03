<?php
return array(
		#Application ID
	    'app_id' => 'sso',
		#Application NAME
	    'app_name' => 'Single Sign-On',
	    #Maintenance Mode
	    'maintenance' => false,
		#framework version
	    'version' => '0.0.1',
	    #gzip code compressor
	    'gzip' => TRUE,
	    #HTML5 code
	    'html5' => TRUE,
		#titulo
	    'title' => 'Grupo Kroton/UNIASSELVI',
	    #public URL
	    'public_url' => 'https://sso.local.com.br',
	    #page encoding
	    'page_encoding' => 'UTF-8',
	    #page language
	    'page_lang' => 'pt-br',
	    #page description
	    'page_description' => 'Single Sign-On',
	    #page authot
	    'page_author' => 'nutec.uniasselvi.com.br',
	    
	    #Google Analytics Tracker Code
	    'ga_code' => 'UA-00000000-1',
	    #CDN javascripts
	    'cdn_js' => 'https://sso.local.com.br/cdn/js/',
	    #CDN jQuery
	    'cdn_jquery' => 'https://sso.local.com.br/cdn/jquery/',
	    #CDN jQuery
	    'cdn_bootstrap' => 'https://sso.local.com.br/cdn/bootstrap/',
	    #CDN CSS's
	    'cdn_css' => 'https://sso.local.com.br/cdn/css/',
	    #CDN Images
	    'cdn_images' => 'https://sso.local.com.br/cdn/images/',
	    
	    #default db server
	    'default_db_server' => 'oracle-produ',
	    
	    #DB Configs
	    'db'   => array(
	    	#Oracle Producao
	        'oracle-produ' => array(
	            'type'       => 'oracle',
	            'host'       => 'dbserver.asselvi.local',
	            'port'       => '1521',
	            'database'   => 'dbass',
	            'username'   => 'dbaass',
	            'password'   => 't2.4apu',
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
