# Basic Block Theme Developing for WordPress (5.9+)  
**Updated:**  11/03/2022 - 14:55 v8


## Source Links

+ [Official Block Editor Handbook](https://developer.wordpress.org/block-editor/how-to-guides/themes/create-block-theme/#what-is-needed-to-create-a-block-theme)

+ [Theme.js reference - v1](https://developer.wordpress.org/block-editor/reference-guides/theme-json-reference/theme-json-v1/)
+ [Theme.js Config File Reference](https://developer.wordpress.org/block-editor/reference-guides/theme-json-reference/theme-json-living/)
+ [Core Blocks Reference](https://developer.wordpress.org/block-editor/reference-guides/core-blocks/)
+ [Fullsiteediting.com Article](https://fullsiteediting.com/lessons/templates-and-template-parts/) by Carolina Nymark, January 2022


## Overview

+ The repository is currently set up for manual template parts with `.html` templates in the `templates/` directory. But you can easily change this when you install the theme to your own WordPress project.

+ So for now I've added the basics so little or no content is drawn from the template part files but the areas used instead are added from the Site Editor.

+ You can clone this repository to your own system and the files should help you get started with your own project.

+ This is a whole new way of developing Websites with WordPress and it has made its way into WordPress course in `5.8` and beyond so there's always going to be a bit of a learning curve. However the notes below should stand you in good stead.

## Theme Setup Instructions

+ You can clone the files in this repository onto your system with the following command - `git clone https://github.com/jg-digital-media/jgdm_block_editing_example`

+ Add the `jgdm_block_editing_example` directory and its contents to your WordPress installation inside `wp-content/themes` directory.

```
index.php
style.css
templates(d) -> index.html
```

For Templates in Full Site Editing, you should use HTML files in the `templates` folder.  For added efficiency and organisation, you can further split templates into parts and put them `parts` folder. A Block Editing theme must also include an `index.html` template inside the `templates` directory.

+ In the admin area you will want to create some test "Pages" and "Posts" to make sure the theme is picking up content and the navigation is working correctly. 

+ The `index.php` file should remain blank but remain in your theme files as a fallback file. (If Gutenburg plugin is not activated WordPress will look for this theme file.)

+ These files are set up with full site block editing for WordPres in mind:

  + Edit the template files to change the markup in the `templates` directory

  + Define template parts (such as a header and/or footer template) in the `parts` directory.

  + Edit the `style.css` file to edit the theme styling as you desire.  If you are using the SASS pre compiler with the `sass --watch` command you can use `style.scss` which imports the sass partials from the `sass` directory.

  + There are two files that are required to activate any theme: These are `index.php` and `style.css`.

  + Theme supports added: (functions.php)
    + `add_theme_support( 'post-thumbnails' ); `
    + `add_theme_support( 'editor-styles' );` 
    + `add_theme_support( 'wp-block-styles' );`
    + `add_theme_support( 'menus' );`

## Theme File Structure

```
index.php
style.css
`templates`
   index.html
`parts`
   header.html
   footer.html

```

A Separate folder for style options can also be used in your file structure - `styles` is a collection of JSON files that represent certain style presets.


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

In WordPress 5.9 and beyond, template parts are added using self closing blocks e.g,  `<!-- wp:site-title /-->`, that implements a site title as defined in WordPress Admin Area and displays it to the Screen.  In order to display a template part in code`<!-- wp:template-part {"slug":"header"} /-->`  - loads a given html template with a specific URL slug.  It seems to me that the "slug" is the JSON key "name" in the `theme.json` file.

**Example** - `block-editing_example -> templates -> index.html`

```html
<!-- wp:template-part {"slug":"header"} /-->
 
<!-- wp:template-part {"slug":"footer"} /-->
```

This hooks in the template part files in `block-editing_example -> parts -> header.html` and `block-editing_example -> parts -> footer.html`.

To make sure that the template parts use the element you want (which is not always the case by default) follow the steps below. 

+ Go the `Site Editor` in the `Appearance` Menu. 

+ Site -> Select the containing part of the Block.  

+ Look for the "*Advanced*" panel and select the HTML `element` to target from the drop down menu. The header and footer elements should now be tied to the appropriate class.
 

## Theme Block Markup

```html 

IMAGE BLOCK EXAMPLE
<!-- wp:image -->
<!-- /wp:image -->
```

```html

HEADING BLOCK
<!-- wp:heading -->
<!-- /wp:heading -->
```

```html

PARAGRAPH BLOCK
<!-- wp:paragraph -->
<!-- /wp:paragraph-->
```


```html

CUSTOM HTML BLOCK
<!-- wp:html -->

  <p>HTML Custom HTML Block</p> 

<!-- /wp:html -->
```

```html

GROUP BLOCK EXAMPLE
<!-- wp:group -->
<div class="wp-block-group"></div>
<!-- /wp:group -->
```

```html

COLUMN BLOCK
<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:paragraph -->
<p>Column 2</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:paragraph -->
<p>Column 1</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->
```

```html

QUERY LIST BLOCK
<!-- wp:query {"queryId":11,"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","categoryIds":[],"tagIds":[],"order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false}} -->
<div class="wp-block-query"><!-- wp:post-template -->
<!-- wp:post-title /-->

<!-- wp:post-date /-->
<!-- /wp:post-template -->

<!-- wp:query-pagination -->
<!-- wp:query-pagination-previous /-->

<!-- wp:query-pagination-numbers /-->

<!-- wp:query-pagination-next /-->
<!-- /wp:query-pagination --></div>
<!-- /wp:query -->
```

```html

PAGE LIST BLOCK
<!-- wp:page-list /-->
```

```html

TABLE BLOCK with 2 columns and 2 rows
<!-- wp:table -->
<figure class="wp-block-table">
    <table>
        <tbody>
            <tr>
                <td></td><td></td></tr><tr><td></td><td></td></tr></tbody></table></figure>
<!-- /wp:table -->
```


```html

NAVIGATION BLOCK EXAMPLE
<!-- wp:navigation {"ref":156,"layout":{"type":"flex","justifyContent":"center"}} /-->
```

## Example: Using the Query loop with group logs - `wp:post`, `wp:query`

The following code provided by the WordPress handbook demonstrates how to display a list of posts in your browser homepage..

+ `wp-block-group` - works a container blog for lists of posts.


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


 + `wp-block-query` - To add a Query Loop, use a group block query class with a div element. Inside this is where you put your Post List Tags.

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

+ `wp-block-query-pagination` - If required, Pagination elements go inside the query block, which itself goes inside the group block.

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
```

```html
CATEGORY BLOCK EXAMPLE  - list of every available category on the webite

<!-- wp:categories /-->

```

Using Bock Editing Tags in your theme will add a number of classes to the html of your project.

Examples of these classes include:

+ `wp-container-62027004d62d5 wp-block-query`
+ `wp-container-62027004d4e7a wp-block-post-template`
+ `wp-container-62027004d5a2b wp-block-query-pagination`
+ `wp-container-6202774482226 entry-content wp-block-post-content`
+ `wp-container-6202774482a2a wp-block-post-title`


It seems that the numbers in the container classes are randomly generated on each page load so they should not be used for styling. But look for the styles such as `wp-block-post-title` if you need control over how they look with CSS.  Some blocks allow you to set a class name to be added to the output allowing you to customise styling even further.


### Bock editing  attributes

...


```html
<!-- wp:post-title {"isLink" :true } /-->   
```

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

### Query Lists (Example)


```html

<!-- QUERY BLOCK GROUPS - Tags/Elements required -->


<!-- wp:group {"layout":{"inherit":false}} -->
<div class="wp-block-group">

    <!-- wp:query -->
    <div class="wp-block-query">


        <div class="wp-block-query-pagination">

        </div>
        <!-- /wp:query-pagination -->

    </div>
    <!-- /wp:query -->                        

</div>
<!-- /wp:block -->

```

e.g. 

```html

<!-- wp:group {"layout":{"inherit":false}} -->

<div class="wp-block-group">

    <!-- wp:query -->
    <div class="wp-block-query">

        <!-- wp:post-template -->

                <!-- wp:post-title /-->
                <!-- wp:post-excerpt /-->
                <!-- wp:post-content /-->
                <!-- wp:post-date /-->
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

## Template &amp; Template Part Creation

### Site Editor

You can edit and create content directly via the Site editor.

with Template Part Blocks

As an example below is the Header Template Part with self closing tags for the Site Title and Tagline.


#### parts/footer.html
```html

        <!-- wp:site-title /-->
        <!-- wp:site-tagline /-->

```

They are self closing tags that WordPress converts to raw HTML to be displayed in the browser. 

```html
<header class="wp-block-template-part">
    
        <h1 class="wp-block-site-title"><a href="http://localhost/wordpress/subdomain" rel="home" aria-current="page">WordPress Subdomain</a></h1>
        <p class="wp-block-site-tagline">Just another WordPress site</p>
</header>
```

You can then style the template parts accordingly with CSS.  I'm using the SASS compiler as I usually do in my projects. The SASS is compiled in `style.scss` which takes imported sass partials from the sass directory in my project.

```scss

//sass to css


.wp-site-blocks {


    //header 
    header.wp-block-template-part {   
        
        background: #070c41;
        border-bottom: 3px white solid;  

        h1 {

            text-align: center;
            color: white;

            a {
                color: white;

                &:hover {
                    text-decoration: none;
                }
            }
        }

        h2 {
            
            text-align: center;
            color: white;

        }

        p {

            text-align: center;
            color: white;
        }

    }

}


```


### Template Editing - Custom Templates

1. Create or edit an existing Post or Page via the admin area.

2. In the template panel click the "new" link and type in a name for your custom template. e.g. `new_custom_template_v1`.

3. Clicking new or edit to go into a template editing screen

4. Click save/Update to save your changes to a Template



###  Page Templates

The equivalent of the page.php template

Templates for Website pages go in the `templates` folder.

Select template on the page in the Admin area.

Take note of the URL Slug for the page 

Setup page navigation in header.html template part

Paste in a navigation code block.

Get the content, but make sure it is not using a query loop. WordPress knows which page to display. because you have selected it as the template in the admin site of the page.

Site Navigation is a very different on WordPress block Editing. There's still the classic menu selector as it existed before but you then need to add a "Navigation" Block and select your saved menu via that block. Every edit or change you make to a menu, such as the "Navigation Label" creates a new version of the menu to select. Links are defined by  Page "slug".


## Single Post Templates


For single post template there is a Template hierarchy that comes into play.  If you've made a template for your pages you can use this to derive your ost templates with a `single.html`.  This will let WordPress know this is the page to use for single post pages.

## Author Templates

...

## Archive Templates

+ Archive templates require the `archive.html` template.

+ The post terms block will add a list of the available categories
    
```html

<!-- wp:post-terms {"term":"category"} /-->
```

+ [get list of tags]

...

## Tips/Pointers

+ No need for document type (DTD) elements in header.html

+ Templates are loaded in the `<body>` inside a `<div>` with the class `"wp-site-blocks"`:

+ Template parts use a `<div>` element by default.

+ Styling with Block Template Elements

  + `.wp-site-blocks`  - this would seem to be a containing element in the document tree
  + `.wp-block-template-part` - template parts
  + `#aside-subtitle-aside-html-template-part`


  + To make sure that the template parts use the element you want (which is not always the case by default) follow the steps below. 
    + Go the `Site Editor` in the `Appearance` Menu. 
    + Site -> Select the containing part of the Block.  
    + Look for the "Advanced" panel and select the HTML `element` to target from the drop down menu. The header and footer elements should now be tied to the appropriate class.
 
 + I've added a class name for the paragraph block that is a descendent of the wp-site-block. That's been disabled by WordPress. Why, I'm not sure but it's staying in for now and has a container div as a fallback in the meantime. 



