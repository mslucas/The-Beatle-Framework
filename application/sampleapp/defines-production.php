<?php
return array(
		#Application ID
	    'app_id' => 'modelo',
		#Application NAME
	    'app_name' => 'modelo',
	    #Maintenance Mode
	    'maintenance' => FALSE,
		#framework version
	    'version' => '0.0.1',
	    #gzip code compressor
	    'gzip' => TRUE,
	    #HTML5 code
	    'html5' => TRUE,
		#titulo
	    'title' => 'modelo',
	    #public URL
	    'public_url' => 'http://www.local.com.br/zeusfw/application/modelo/public',
	    #page encoding
	    'page_encoding' => 'UTF-8',
	    #page language
	    'page_lang' => 'pt-br',
	    #page description
	    'page_description' => 'Just an model application',
	    #page authot
	    'page_author' => 'marcoslucas.com',
	    
	    #Google Analytics Tracker Code
	    'ga_code' => 'UA-00000000-1',
	    #CDN javascripts
	    'cdn_js' => 'hhttp://www.local.com.br/zeusfw/cdn/js/',
	    #CDN jQuery
	    'cdn_jquery' => 'http://www.local.com.br/zeusfw/cdn/jquery/',
	    #CDN jQuery
	    'cdn_bootstrap' => 'http://www.local.com.br/zeusfw/cdn/bootstrap/',
	    #CDN CSS's
	    'cdn_css' => 'http://www.local.com.br/zeusfw/cdn/css/',
	    #CDN Images
	    'cdn_images' => 'http://www.local.com.br/zeusfw/cdn/images/',
	    
	    #default db server
	    'default_db_server' => 'mysql-local',
	    
	    #DB Configs
	    'db'   => array(
	    	#Mysql local
	        'mysql-local' => array(
	            'type'       => 'mysql',
	            'host'       => 'localhost',
	            'port'       => '1521',
	            'database'   => 'triptheme',
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