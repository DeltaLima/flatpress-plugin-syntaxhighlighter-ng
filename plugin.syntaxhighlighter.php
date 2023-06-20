<?php
/*
Plugin Name: SyntaxHighlighter-NG
Version: 1.0
Plugin URI: https://git.la10cy.net/DeltaLima/flatpress-plugin-syntaxhighlighter-ng
Description: <a href="https://git.la10cy.net/DeltaLima/flatpress-plugin-syntaxhighlighter-ng/">SyntaxHighlighter-NG 1.0.0</a> (forked from <a href="https://forum.flatpress.org/viewtopic.php?p=1130&hilit=syntax+highlight#p1135">Arvid's forum post</a>, using now <a href="https://prismjs.com">prism.js</a>)
Author: 2005 NoWhereMan, 2023 DeltaLima
Author URI: https://deltalima.org
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
	$pdir=plugin_geturl('syntaxhighlighter');
echo <<<PRISMJS
	<!-- start of prism.js -->
		
  <link rel="stylesheet" type="text/css" href="{$pdir}res/prism.css" />

	<!-- end of prism.js -->
PRISMJS;
	
}
add_action('wp_head', 'plugin_syntaxhighlighter_head');


function plugin_syntaxhighlighter_foot() {

	// convert the returned array into an json one, to have an easier time
  // giving it to the javascript below
  $used_languages = json_encode(plugin_syntaxhighlighter_add());
  
	$pdir=plugin_geturl('syntaxhighlighter');
  // javascript part
	echo <<<PRISMBOX
	<!-- start of prism.js -->
    
    <script type="text/javascript" src="{$pdir}res/prism.js"></script>
    
    <!-- wrapping the content of pre html-tags into code-tags, as said in https://prismjs.com/index.html#basic-usage -->
    <script type="text/javascript">
            // wrap the content of <pre> elements into <code></code> for prismjs
            
            // get an array of <pre></pre> elements 
            //var preEl = document.getElementsByTagName("pre");
            
            // split used_languages list into array
            let used_languages = $used_languages;
            
            for (let iUl = 0;iUl < used_languages.length; iUl++)
            {
              // do nothing on empty element
              if ( used_languages[iUl] != "" ) 
              {
                // get all <pre> elements with certain language
                let preElements = document.querySelectorAll("pre." + used_languages[iUl]);
                
                for (let iEl = 0;iEl < preElements.length; iEl++)
                {
                  org_html = preElements[iEl].innerHTML;
                  new_html = "<code class=\"language-" + used_languages[iUl] + "\">" + org_html + "</code>";
                  
                  preElements[iEl].innerHTML = new_html;
                }
              }
            }
            
            
            
            /* for(let iEl = 0;iEl < preEl.length; iEl++)
            {
              //ShowResults(input[iEl].value);
              //alert(preEl[iEl].innerHTML);
              
              org_html = preEl[iEl].innerHTML;
              new_html = "<code class=\"language\">" + org_html + "</code>";
              preEl[iEl].innerHTML = new_html;
              
            } */
            
    </script>
	
	<!-- end of SHL -->
PRISMBOX;
}
add_action('wp_footer', 'plugin_syntaxhighlighter_foot');



?>
