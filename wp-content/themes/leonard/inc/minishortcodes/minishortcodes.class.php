<?php

class TB_Mini_Shortcode
{
	private $minishortcode = array();

	/**
     * __construct
     * 
     * @since 1.0.0
     */
	function __construct() {
		$this->load()->inc();
	}
	
	/**
     * load
     * 
     * @since 1.0.0
     */
	function load() {
		$directory = __DIR__;
		$scanned_directory = array_diff( scandir( $directory ), array( '..', '.' ) );
		
		/* check mini shortcode exist */
		if( count( $scanned_directory ) <= 0 ) 
			return;
		
		foreach( $scanned_directory as $dir_name ) {
		
			$current_dir = $directory . '/' . $dir_name;
			$current_file = $current_dir . '/' . $dir_name . '.php';
			
			if( is_dir( $current_dir ) && is_file( $current_file ) ) {
				$this->minishortcode[$dir_name] = $current_file;
			}
		}
		
		return $this;
	}
	
	function inc() {
		/* check mini shortcode exist */
		if( count( $this->minishortcode ) <= 0 )
			return;
		
		/* inc mini shortcode */
		foreach( $this->minishortcode as $name => $inc_path )
			require $inc_path;
	}
}

new TB_Mini_Shortcode();