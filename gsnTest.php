<?php
	/*
		Plugin Name: GSN Test
	*/
	
	function gsn_get_data($url){
		
		$resp = wp_remote_get($url);
		$obj = NULL;
		
		if( 200 == $resp['response']['code']) {
			$json = $resp['body'];
			$obj = json_decode($json);
		}
		return $obj;
	}
	
	function gsn_get_json($url) {
	
		$resp = wp_remote_get($url);
		$json = NULL;
		
		if( 200 == $resp['response']['code']) {
			$json = $resp['body'];
		}
		return $json;
	}
	
	function gsn_get_featured_recipe (){
		
		$obj = gsn_get_data('https://clientapi.gsn2.com/api/v1/store/FeaturedRecipe/'.$GLOBALS['chainId']); 
		
		return $obj->{'ImageUrl'};
	}
	
	function gsn_get_store_list(){
	
		$obj = gsn_get_json('https://clientapi.gsn2.com/api/v1/store/list/'.$GLOBALS['chainId']); 
		set_transient('store_list', $obj, DAY_IN_SECONDS);
	}
	
	function gsn_get_site_config() {
		$obj = gsn_get_json('https://clientapi.gsn2.com/api/v1/store/siteconfig/'.$GLOBALS['chainId']); 
		set_transient('site_config', $obj, DAY_IN_SECONDS);
	}
?>