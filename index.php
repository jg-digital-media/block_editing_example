<?php  


echo "<p>index.php</p>";




?>

<!--


<?php  require "template-parts/inc/header.php" ?>     

    <h2>Content Subtitle - index.php</h2>

    <main id="container">    

        <aside class="secondary_content">

            <div class="site_intro">

                <h3>Subtitle </h3>

                <p> Lorem ipsum dolor sit amet consectetur, adipisicing elit. <strong>Facilis</strong>, <strong>fugit</strong>, <strong>earum</strong> quidem officiis natus <em>ipsam</em> reprehenderit maiores illo, amet odit, dignissimos, unde ut iste dolore omnis provident aut sit dolores? </p>
        
            </div>

            <div class="archived_posts">

               

                <?php dynamic_sidebar( "archive_widget_area" ); ?>

            </div>

            <div class="article_list">

                <?php dynamic_sidebar( "widget_area_one" ); ?>

            </div>

            <div class="adspace">

                <p>A space for advertising images or third widget area.</p>

            </div>

        </aside>


        <section class="primary_content">

            <div class="content_one">
                
                <a href="<?php echo get_site_url(); ?>/articles/" class="back_home">Articles List</a>

                <?php if( have_posts() ): while( have_posts() ): the_post(); ?>
            
                    <h3> <a href="<?php the_permalink(); ?>" target="blank"><?php the_title(); ?></a> </h3>
                    
                    <p> <?php the_content(); ?> </p>

                <?php endwhile; else : ?>

                    <h3> No posts </h3>

                    <p> No posts are available. </p>

                <?php endif; ?>

            </div>

        </section>

    </main>

    <?php require "template-parts/inc/footer.php" ?>



    HEADER

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Slick Styling -->
    <link rel="stylesheet" type="text/css" href ="assets/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href ="assets/slick/slick-theme.css" />
    
    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href ="style.css" />

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Merriweather|Odibee+Sans|Quicksand&display=swap" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" href="" type="image/png">

    <!-- meta tags -->
    <meta name="description" content="">
    <meta name="keywords" content=""> 
    <meta name="image" content="">

    <!-- FACEBOOK: Open Graph -->
    <meta property="og:title" content="">
    <meta property="og:description" content="">
    <meta property="og:image" content="">
    <meta property="og:url" content="">

    <!-- TWITTER: Open Graph -->
    <meta name="twitter:title" content="">
    <meta name="twitter:description" content="">
    <meta name="twitter:image" content="">
    <meta name="twitter:card" content="jgdm_wordpress_2021">


    <title>JGDM WordPress Subdomain Theme</title>

</head>

<body>
    <header>

        <h1 class="website_title">JGDM WordPress Subdomain Theme <!-- (https://portfolio.jonniegrieve.co.uk) --> </h1>

        <nav>
            <ul class="subdomain_list">

                <!-- <li class="sub_list_item"><a href="https://www.jonniegrieve.co.uk" class="" title="" target="blank">Main Site</a></li>
                <li class="sub_list_item"><a href="https://portfolio.jonniegrieve.co.uk" class="" title="" target="blank">Portfolio</a></li>
                <li class="sub_list_item"><a href="https://blog.jonniegrieve.co.uk" class="" title="" target="blank">Blog</a></li>
                <li class="sub_list_item"><a href="https://android.jonniegrieve.co.uk" class="" title="" target="blank">Android</a></li>
                <li class="sub_list_item"><a href="https://dyspraxia.jonniegrieve.co.uk" class="" title="" target="blank">Dyspraxia</a></li>   -->

                <?php wp_nav_menu( "main_menu" ) ?>    
                
            </ul>
        </nav>
        

    </header>
    
    <img src="https://portfolio.jonniegrieve.co.uk/wp-content/themes/projects_theme/img/logo.png" id="main_logo" alt="" title=""  />

    <?php wp_head(); ?>

-->