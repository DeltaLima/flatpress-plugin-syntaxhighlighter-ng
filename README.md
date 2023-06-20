# syntaxhighlighter-ng

based on the original FlatPress plugin [from 2005](https://forum.flatpress.org/viewtopic.php?p=1130&hilit=syntax+highlight#p1135), updated in 2023 to prism.js

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
Markup + HTML + XML + SVG + MathML + SSML + Atom + RSS + CSS + C-Linke + JavaScript + Apache + Bash + Batch + BBCode + C + C# + C++ + CSV + Diff + Go + HTTP + ini + Java + JSON + Makefile + Markdown + nginx + Perl + PHP PowerShell + Python + Ruby + Shell session + SQL + VB.Net + Wiki markup + YML
```

To change the theme, choose your favorite from https://prismjs.com and place it into `fp-plugins/syntaxhighlighter/res/`.
Then look after the block `<!-- start of prism.js header -->` in `fp-plugins/syntaxhighlighter/plugin.syntaxhighlighter.php` and change the following line:

```
<link rel="stylesheet" type="text/css" href="{$pdir}res/prism.okaidia.css" />
```

to

```
<link rel="stylesheet" type="text/css" href="{$pdir}res/prism.YOURTHEMENAME.css" />
```
