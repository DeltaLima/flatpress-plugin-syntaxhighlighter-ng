<?php
/*
Plugin Name: SyntaxHighlighter-NG
Version: 1.0.2
Plugin URI: https://git.la10cy.net/DeltaLima/flatpress-plugin-syntaxhighlighter-ng
Description: <a href="https://git.la10cy.net/DeltaLima/flatpress-plugin-syntaxhighlighter-ng/">SyntaxHighlighter-NG</a> (forked from <a href="https://forum.flatpress.org/viewtopic.php?p=1130&hilit=syntax+highlight#p1135">Arvid's forum post</a>, using now <a href="https://prismjs.com">prism.js</a>)
Author: 2005 NoWhereMan, 2023 DeltaLima
Author URI: https://deltalima.org
License: MIT

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the “Software”), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED “AS IS”, WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.

*/


function plugin_syntaxhighlighter_add($lang=null) {
	static $languages = array();
	
	$pdir=plugin_geturl('syntaxhighlighter');

	// create array containing the used languages
		$languages[] = "{$lang}";
	// remove unique
		$languages = array_unique($languages);
		
	return $languages;
}


function plugin_syntaxhighlighter_head() {

	$config = include('config.php');
	$pdir=plugin_geturl('syntaxhighlighter');
echo <<<PRISMJS
	<!-- start of prism.js header -->
		
	<link rel="stylesheet" type="text/css" href="{$pdir}res/prism.plugins.css" />
	<link rel="stylesheet" type="text/css" href="{$pdir}res/prism-{$config['theme']}.css" />

	<!-- end of prism.js header -->
PRISMJS;
	
}

add_action('wp_head', 'plugin_syntaxhighlighter_head');


function plugin_syntaxhighlighter_foot() {

	$config = include('config.php');
	// convert the returned array into a json one, to have an easier time
	// giving it to the javascript below
	$used_languages = json_encode(plugin_syntaxhighlighter_add());
	
	$pdir=plugin_geturl('syntaxhighlighter');
	// javascript part
	
echo <<<PRISMBOX
	<!-- start of prism.js footer -->
	
	<script type="text/javascript" src="{$pdir}res/prism.{$config['size']}.js"></script>
	
	<!-- include wrapping-function to wrap content of pre html-tags into code-tags, as said in https://prismjs.com/index.html#basic-usage -->
	<script type="text/javascript" src="{$pdir}res/syntaxhighlighter-ng.js"></script>
	
	<!-- call wrap_pre_tags() from syntaxhighlighter-ng.js -->
	<script type="text/javascript">
	  var used_languages = {$used_languages};
	  var enable_line_numbers = {$config['line-numbers']};
	  wrap_pre_tags(used_languages, enable_line_numbers);
	</script>
	    
	<!-- end of prism.js footer -->
PRISMBOX;
}

add_action('wp_footer', 'plugin_syntaxhighlighter_foot');

?>
