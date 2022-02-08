# Basic Block Theme Developing for WordPress (5.9+)

## Source Link

+ [Basic Block Theme Development - WordPress Docs](https://developer.wordpress.org/block-editor/how-to-guides/themes/create-block-theme/#what-is-needed-to-create-a-block-theme)


## Theme Setup.

Add the `block_editing_example` directory and its contents to your WordPress installation inside `wp-content/themes` directory.

You can clone the files into that directory with the following command - **insert command here**

+ There are two files that are required to activate any theme: These are `index.php` and `style.css`.

## Instructions

```
index.php
style.css

```

For Templates, you should use HTML files in a `templates` folder.  For added efficiency and oranisation you can further split templates into parts and put them `parts` folder. A Block Editing theme must also include an `index.html` template inside the `templates` directory.


```
index.php
style.css
`templates`
   index.html
`parts`
   header.html
   footer.html

```

Separate folder for style options can also be used in your file structure - `styles`. a collection of JSON files that represent certain style presets.


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

Looks up the template part files in `block-editing_example -> parts -> header.html` and `block-editing_example -> parts -> footer.html`.



### Using the Query loop with group logs - `wp:post`, `wp:query`

-> The following code provided by the WordPress handbook demonstrates how to display a list of posts.

wp group works a container blog for lists of posts.

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

wp query pagination - Pagination elements when they're reqiired go inside the query block, which itself goes inside the group block.

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