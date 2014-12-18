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
	
	function gsn_get_featured_recipe (){
		
		$obj = gsn_get_data('https://clientapi.gsn2.com/api/v1/store/FeaturedRecipe/'.$GLOBALS['chainId']); 
		
		return $obj->{'ImageUrl'};
	}
	
	function gsn_get_store_list($chainId){
	
		$obj = gsn_get_data('https://clientapi.gsn2.com/api/v1/store/list/'.$GLOBALS['chainId']); 
		//return $obj[0]->{'StoreName'};
		$GLOBALS['storeList'] = $obj;
	}
?>