// wrap the content of <pre> elements into <code></code> for prism.js
// as told mentioned in https://prismjs.com/index.html#basic-usage
// Author: DeltaLima
// Date: 21.06.2023

function wrap_pre_tags(used_languages) {
  // iterate through all used_languages
  for (let iUl = 0;iUl < used_languages.length; iUl++)
  {
    // preElements, array of <pre></pre> elements
    // handle [code] without language definition as "none"
    // and we have to look for them up a bit different
    if ( used_languages[iUl] == "" )
    {
      used_languages[iUl] == "none"
      var preElements = document.querySelectorAll("pre:not([class])");
    } else {
      var preElements = document.querySelectorAll("pre." + used_languages[iUl]);
    }

    // iterate through all <pre>
    for (let iEl = 0;iEl < preElements.length; iEl++)
    {
      // put the content of <pre> tag into org_html
      org_html = preElements[iEl].innerHTML;
      // put <code> tag with 'language-' class and class for 'line-numbers'
      // prism.js plugin around the <pre> content
      new_html = "<code class=\"line-numbers language-" + used_languages[iUl] + "\">" + org_html + "</code>";
      // write back our new html and enjoy syntax highlightning :)
      preElements[iEl].innerHTML = new_html;
    }
  }
}
