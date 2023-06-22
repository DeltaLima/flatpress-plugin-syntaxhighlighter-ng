<?php
/*
 * size: tiny, small, full
 *
 *        tiny: 21KB (Markup, HTML, XML, SVG, MathML, SSML, Atom, RSS, CSS, C-like, JavaScript)
 *
 *        small: 95KB (Markup, HTML, XML,SVG, MathML, SSML, Atom, RSS, CSS, C-Linke, JavaScript
 *                   Apache, Arduino, Bash Shell, Batch, BBCode, C, C#, C++, CMake, CSV, Diff, 
 *           Docker, Git, Go, HTTP, ini, Java, JSON, Log file, Makefile, Markdown,nginx,
 *           Pascal, Perl, PHP, PowerShell, Python, Ruby, Shell session, SQL, Typescript,
 *           VB.Net, Visual Basic, Wiki markup, YML)
 *
 *        full: 567KB (see https://prismjs.com/index.html#supported-languages for list of supported languages)
 *
 * theme: coy, dark, default, funky, okaidia, solarizedlight, tomorrow, twilight
 * 
 * plugins: line-numbers, unescaped-markup, diff-highlight, toolbar, copy-to-clipboard (depends on toolbar)
 *       
 */

return [
        // change here
        'size' => 'small',
        'theme' => 'okaidia',
        'plugins' => ['unescaped-markup', 'line-numbers', 'diff-highlight'],
]
?>
