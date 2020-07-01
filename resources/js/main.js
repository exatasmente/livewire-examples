// window.docsearch = require('docsearch.js');

import Prism from 'prismjs'
import animate from 'animateplus'
// Load languages.
import 'prismjs/components/prism-markup'
import 'prismjs/components/prism-markup-templating'
import 'prismjs/components/prism-clike'
import 'prismjs/components/prism-php'
import 'prismjs/plugins/line-highlight/prism-line-highlight.js'

window.animate = animate

// import 'prismjs/plugins/line-highlight/prism-line-highlight.css'

Prism.highlightAll();
