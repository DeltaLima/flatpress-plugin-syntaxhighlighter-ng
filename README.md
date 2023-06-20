# syntaxhighlighter-ng

Origin: https://git.la10cy.net/DeltaLima/flatpress-plugin-syntaxhighlighter-ng

based on the original FlatPress plugin [from 2005](https://forum.flatpress.org/viewtopic.php?p=1130&hilit=syntax+highlight#p1135), updated in 2023 to prism.js

## installation

Put the plugin files into `fp-plugins/syntaxhighlighter/`. If you want to git clone it, use

```shell
[fp-plugins/]$ git clone https://git.la10cy.net/DeltaLima/flatpress-plugin-syntaxhighlighter-ng.git syntaxhighlighter/
```

## codeblock with language syntax highlightning

When you just create an `[code][/code]` block, then there will be no syntax highlightning.

To enable it, you have to specify the language you want to get highlighted, for example:

```
[code=bash]
if [ "$1" == "bash" ] 
then
  echo "Yeah :)"
else 
  echo "something else"
fi
[/code]
```

See the https://prismjs.com/#supported-languages for all supported languages by the contained `prism.full.js`

The included `prism.small.js` just has the most popular I know:

```
Markup, HTML, XML,SVG, MathML, SSML, Atom, RSS, CSS, C-Linke, JavaScript
Apache, Bash, Batch, BBCode, C, C#, C++, CSV, Diff, Go, HTTP, ini, Java
JSON, Makefile, Markdown, nginx, Perl, PHP, PowerShell, Python, Ruby
Shell session, SQL, VB.Net, Wiki markup, YML
```

To use it (it is just 100KB instead of >500KB), you have look after 
`	<!-- start of prism.js footer -->` in `syntaxhighlighter/plugin.syntaxhighlighter.php` and change the line

```html
    <script type="text/javascript" src="{$pdir}res/prism.full.js"></script>
```

into 

```html
    <script type="text/javascript" src="{$pdir}res/prism.small.js"></script>
```

To change the theme, take your favorite from https://prismjs.com and place it into `syntaxhighlighter/res/`.
Then look after the block `<!-- start of prism.js header -->` in `syntaxhighlighter/plugin.syntaxhighlighter.php` and change the following line:

```html
<link rel="stylesheet" type="text/css" href="{$pdir}res/prism.okaidia.css" />
```

to

```html
<link rel="stylesheet" type="text/css" href="{$pdir}res/prism.YOURTHEMENAME.css" />
```
