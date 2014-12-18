<?php
	/*
		Plugin Name: GSN Test
	*/
	
	function gsn_filter_profanity( $content ) {
		$profanities = array('badword','alsobad','...');
		$content = str_ireplace( $profanities, '{censored}', $content );
		return $content;
	}		

	function gsn_get_featured_recipe (){
		
		$result = '';
		
		$resp = wp_remote_get('https://clientapi.gsn2.com/api/v1/store/FeaturedRecipe/218');
		
		if( 200 == $resp['response']['code']) {
			$json = $resp['body'];
			$obj = json_decode($json);
			$result = $obj->{'ImageUrl'};
		}
		return $result;
	}
?>