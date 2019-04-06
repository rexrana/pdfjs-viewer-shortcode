# PDF.js Viewer Shortcode #
**Contributors:** Peter Hebert  
**Tags:** pdf, pdf.js, viewer, reader, embed, mozilla, shortcode  
**Requires at least:** 3.0.1  
**Tested up to:** 5.1.1  
**Stable tag:** 1.4.3  

Embed a beautiful PDF viewer into pages with a simple shortcode.

## Description ##

Incorporate Mozilla's PDF.js viewer into your pages and posts with a simple shortcode. PDF.js is a javascript library for displaying pdf pages within browsers.

Features:

*   Elegant speckled gray theme
*   Customizable buttons
*   Page navigation drawer
*   Advanced search functionality
*   Language support for all languages
*   Protected PDF password entry
*   Loading bar & displays partially loaded PDF (great for huge PDFs!)
*   Document outline
*   Advanced zoom settings
*   Easy to use editor media button that generates the shortcode for you
*   Support for mobile devices

Shortcode Syntax:
```
[pdfjs-viewer file="http://www.website.com/test.pdf" width="600px" height="700px" fullscreen="true" download="true" print="true"]
```

Required parameters:
*   file: direct url to pdf file

Optional parameters:
*   width: width of the viewer (default: 100%) - takes any valid [CSS length value](https://www.w3.org/TR/css-values-4/#length-value)
*   height: height of the viewer (default: 700px) - takes any valid [CSS length value](https://www.w3.org/TR/css-values-4/#length-value)
*   fullscreen: true/false, displays fullscreen link above viewer (default: true)
*   download: true/false, enables or disables download button (default: true)
*   print: true/false, enables or disables print button (default: true)

## Installation ##

# Zip archive #
* Upload and expand the archive into your sites wp-content/plugins directory, or:

# Composer #
Works best in a [Roots Bedrock](https://roots.io/bedrock/) stack
1. add GitHub repository to the `repositories` section of your composer.json
```
    "repositories": {
        "pdfjs-viewer-shortcode": {
            "type": "vcs",
            "url": "https://github.com/rexrana/pdfjs-viewer-shortcode.git"
        }
    },
```
2. Add dependency: `composer require rexrana/pdfjs-viewer-shortcode`


## Screenshots ##

## Changelog ##

### 1.4.3 ###
* better sanitization of html attributes for iframe
* more useful instructions for settings page
* regex to validate CSS dimensions for width and height
* added POT for gettext translation
* improved readme

### 1.4.2 ###
* fix to javascript for classic editor "Insert PDF" button, avoiding double-escaping file URL.

### 1.4.1 ###
* fix to javascript for classic editor "Insert PDF" button, updating shortcode parameters to their new names.

### 1.4.0 ###
* Composer support
* updated shortcode functions with proper sanitization and escaping
* added plugin settings page for setting remote viewer URL
* split functions into seperate files in inc folder
* restructure file paths
