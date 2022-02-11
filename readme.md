# Basic Block Theme Developing for WordPress (5.9+)  
**Updated:**  11/02/2022 - 09:59 v4


## Source Links

+ [Official Block Editor Handbook](https://developer.wordpress.org/block-editor/how-to-guides/themes/create-block-theme/#what-is-needed-to-create-a-block-theme)

+ [Theme.js reference - v1](https://developer.wordpress.org/block-editor/reference-guides/theme-json-reference/theme-json-v1/)
+ [Theme.js Config File Reference](https://developer.wordpress.org/block-editor/reference-guides/theme-json-reference/theme-json-living/)
+ [Core Blocks Reference](https://developer.wordpress.org/block-editor/reference-guides/core-blocks/)
+ [Fullsiteediting.com Article](https://fullsiteediting.com/lessons/templates-and-template-parts/) by Carolina Nymark, January 2022


## Overview

I've taken the post list out again for now. The code is available in this Readme document.  Every time I think I'm getting somewhere with Full Site editing in WordPress another spanner seems to be thrown in the works.

So for now I've added the basics so little or no content is drawn from the template part files but the areas used insteasd are added from the Site Editor.

You can clone this repository to your own system and the files should help you get started with your own project.

## Theme Setup Instructions.

+ You can clone the files in this repository onto your system with the following command - `git clone https://github.com/jg-digital-media/jgdm_block_editing_example`


+ Add the `jgdm_block_editing_example` directory and its contents to your WordPress installation inside `wp-content/themes` directory.

```
index.php
style.css
templates(d) -> index.html
```

For Templates in Full Site Editing, you should use HTML files in the `templates` folder.  For added efficiency and oranisation you can further split templates into parts and put them `parts` folder. A Block Editing theme must also include an `index.html` template inside the `templates` directory.


+ The `index.php` file should remain blank but remain in your theme files as a fallback file. (If Gutenburg plugin is not activated WordOress will look for this theme file.)

+ These files are set up with full site block editing for WordPres in mind

  + Edit the template files to change the markup in the `templates` directory

  + define template parts (such as a header and/or footer template) in the `parts` directory.

  + Edit the `style.css` file to edit the theme styles as you desire.  If you are using the SASS pre compiler with the `sass --watch` command you can use `style.scss` which imports the sass partials from the `sass` directory.

  + There are two files that are required to activate any theme: These are `index.php` and `style.css`.



### Theme File Structure

```
index.php
style.css
`templates`
   index.html
`parts`
   header.html
   footer.html

```

A Separate folder for style options can also be used in your file structure - `styles`. a collection of JSON files that represent certain style presets.


```
`parts`
   header.html
   footer.html
`styles`
   style-one.json
   style-two.json
   style-main.json

```

### Adding Template Parts

In WordPress 5.9 and beyond, template parts are added using self closing blocks e.g,  `<!-- wp:site-title /-->`, that implements a site title as defined in WordPress Admin Area and displays it to the Screen

+ `<!-- wp:template-part {"slug":"header"} /-->`  - loads a given html template

**Example** - `block-editing_example -> templates -> index.html`

```html
<!-- wp:template-part {"slug":"header"} /-->
 
<!-- wp:template-part {"slug":"footer"} /-->
```

+ Looks up the template part files in `block-editing_example -> parts -> header.html` and `block-editing_example -> parts -> footer.html`.



### Using the Query loop with group logs - `wp:post`, `wp:query`

+ `wp-group` works a container blog for lists of posts.

+ The following code provided by the WordPress handbook demonstrates how to display a list of posts.


```html
<!-- wp:group {"layout":{"inherit":true}} -->
<div class="wp-block-group"></div>
<!-- /wp:group -->
```

```html
<!-- wp:group {"layout":{"inherit":true},"tagName":"main"}} -->
<div class="wp-block-group"></div>
<!-- /wp:group -->
```

To add a query loop, use a group block element with the class `wp-block-query`.

```html

<!-- wp:group {"layout":{"inherit":true},"tagName":"main"}} -->
<div class="wp-block-group">

    <!-- wp:query -->
    <div class="wp-block-query">
        <!-- wp:post-template -->
        <!-- wp:post-title /-->
        <!-- wp:post-date /-->
        <!-- wp:post-excerpt /-->
        <!-- /wp:post-template -->
    </div>
    <!-- /wp:query -->

</div>
```

wp query pagination - Pagination elements when they're required go inside the query block, which itself goes inside the group block.

```html

 <!-- wp:query -->
<div class="wp-block-query">
    <!-- wp:post-template -->
    <!-- wp:post-title /-->
    <!-- wp:post-date /-->
    <!-- wp:post-excerpt /-->
    <!-- /wp:post-template -->
 
    <!-- wp:query-pagination -->
    <div class="wp-block-query-pagination">
        <!-- wp:query-pagination-previous /-->
        <!-- wp:query-pagination-numbers /-->
        <!-- wp:query-pagination-next /-->
    </div>
    <!-- /wp:query-pagination -->
</div>
<!-- /wp:query -->

```

Uaing these post block tags will add a number of classes to the html of your project.

Examples of which include:

+ `wp-container-62027004d62d5 wp-block-query`
+ `wp-container-62027004d4e7a wp-block-post-template`
+ `wp-container-62027004d5a2b wp-block-query-pagination`
+ `wp-container-6202774482226 entry-content wp-block-post-content`
+ `wp-container-6202774482a2a wp-block-post-title`


It seems that the numbers in the container classes are randomly generated on each page load so they should not be used for styling. But look for the styles such as `wp-block-post-title` if you need control over how they look with CSS. 

## Theme.json 


+ This is a configuration file in JSON formatting for setting themes style and providing settings for blocks

+ **Settings** - Where you will enable features and create presets for styles.
+ **Styles** - Where you apply styles to the website, elements, and blocks.
+ **templateParts** - For assigning template part files to template areas.
 

```json

{
    "version": 2,
    "settings": {},
    "styles": {},
    "templateParts": []
}

```

### Query lists



```html
QUERY BLOCK GROUPS

 <!-- wp:group {"layout":{"inherit":false}} -->
    <div class="wp-block-group">

        <!-- wp:query -->
            <div class="wp-block-query">

                <!-- wp:post-template -->

                        <!-- wp:post-title /-->
                        <!-- wp:post-date /-->
                        <!-- wp:post-excerpt /-->
                        <!-- wp:post-content /-->
                        <!-- wp:post-author /-->

                <!-- /wp:post-template -->
            
                <!-- wp:query-pagination -->
                <div class="wp-block-query-pagination">
                    <!-- wp:query-pagination-previous /-->
                    <!-- wp:query-pagination-numbers /-->
                    <!-- wp:query-pagination-next /-->
                </div>
                <!-- /wp:query-pagination -->
            </div>

        <!-- /wp:query -->                        

    </div>
    <!-- /wp:block -->
```



### Tips/Pointers

No need for document type (DTD) elements in header.html

Templates are loaded in the `<body>` inside a `<div>` with the class `"wp-site-blocks"`:


Styling with Block Template Elements

 + `.wp-site-blocks`  - this would seem to be a containing element in the document tree
 + `.wp-block-template-part` - template parts
 + `#aside-subtitle-aside-html-template-part`
    */

