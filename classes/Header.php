<?php

class Header {

	public static function getTitle($title, $page){
		if(isset($title)){
			$title = "<title>OGCMA | " . ucfirst($title . "</title>\n");
		} elseif (isset($page)) {
			$title = "<title>OGCMA | " . ucfirst($page . "</title>\n");
		} else {
			$title = "<title>OGCMA | Home</title>\n";
		};
		
		return $title;
	} // end setHeadTitle

	public static function getStyles($stylesheet){
		if(isset($stylesheet)) {
			$css = "<link href=\"css/{$stylesheet}.css\" rel=\"stylesheet\" type=\"text/css\" />";
			return $css;
		};
	}

	public static function getJavascripts($folder){
		if(empty($folder)){
			$folder = "index";
		};

		$dir = "js/{$folder}/";
		$files = array_diff(scandir($dir), array('..', '.'));
		$output = "";

		foreach($files as $file){
			$filepath = $dir . $file;
			$output .= "<script src=\"{$filepath}\"></script>\n\t\t";
		}

		return $output;
	}
} // end Header class
