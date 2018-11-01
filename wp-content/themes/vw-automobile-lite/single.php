<?php
/**
 * The Template for displaying all single posts.
 *
 * @package VW Automobile Lite
 */
 
 get_header(); 
?>
<div class="container">
  <div class="middle-align">
    <?php
        $left_right = get_theme_mod( 'vw_automobile_lite_theme_options','Right Sidebar');
        if($left_right == 'Left Sidebar'){ ?>
        <div class="row">
          <div class="col-md-4" id="sidebar"><?php dynamic_sidebar('sidebar-1');?></div>
          <div id="our-services" class="services col-md-8">
             
            <?php if ( have_posts() ) :
              /* Start the Loop */
                
                while ( have_posts() ) : the_post();

                  get_template_part( 'template-parts/single-post-layout' ); 
                
                endwhile;

                else :

                  get_template_part( 'no-results', 'archive' ); 

                endif; 
            ?>
            <div class="navigation">
              <?php
                  // Previous/next page navigation.
                  the_posts_pagination( array(
                      'prev_text'          => __( 'Previous page', 'vw-automobile-lite' ),
                      'next_text'          => __( 'Next page', 'vw-automobile-lite' ),
                      'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'vw-automobile-lite' ) . ' </span>',
                  ) );
              ?>
                <div class="clearfix"></div>
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
    <?php }else if($left_right == 'Right Sidebar'){ ?>
      <div class="row">
        <div id="our-services" class="services col-md-8">
                    
          <?php if ( have_posts() ) :
            /* Start the Loop */
              
              while ( have_posts() ) : the_post();

                get_template_part( 'template-parts/single-post-layout' ); 
              
              endwhile;

              else :

                get_template_part( 'no-results', 'archive' ); 

              endif; 
          ?>
          <div class="navigation">
            <?php
                // Previous/next page navigation.
                the_posts_pagination( array(
                    'prev_text'          => __( 'Previous page', 'vw-automobile-lite' ),
                    'next_text'          => __( 'Next page', 'vw-automobile-lite' ),
                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'vw-automobile-lite' ) . ' </span>',
                ) );
            ?>
              <div class="clearfix"></div>
          </div>
        </div>
        <div class="col-md-4" id="sidebar"><?php dynamic_sidebar('sidebar-1');?></div>
      </div>
    <?php }else if($left_right == 'One Column'){ ?>
        <div id="our-services" class="services">
                    
          <?php if ( have_posts() ) :
            /* Start the Loop */
              
              while ( have_posts() ) : the_post();

                get_template_part( 'template-parts/single-post-layout' ); 
              
              endwhile;

              else :

                get_template_part( 'no-results', 'archive' ); 

              endif; 
          ?>
          <div class="navigation">
            <?php
                // Previous/next page navigation.
                the_posts_pagination( array(
                    'prev_text'          => __( 'Previous page', 'vw-automobile-lite' ),
                    'next_text'          => __( 'Next page', 'vw-automobile-lite' ),
                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'vw-automobile-lite' ) . ' </span>',
                ) );
            ?>
              <div class="clearfix"></div>
          </div>
        </div>
    <?php }else if($left_right == 'Three Columns'){ ?>
      <div class="row">
        <div class="col-md-3" id="sidebar"><?php dynamic_sidebar('sidebar-1');?></div>
        <div id="our-services" class="services col-md-6">
                    
          <?php if ( have_posts() ) :
            /* Start the Loop */
              
              while ( have_posts() ) : the_post();

                get_template_part( 'template-parts/single-post-layout' ); 
              
              endwhile;

              else :

                get_template_part( 'no-results', 'archive' ); 

              endif; 
          ?>
          <div class="navigation">
            <?php
                // Previous/next page navigation.
                the_posts_pagination( array(
                    'prev_text'          => __( 'Previous page', 'vw-automobile-lite' ),
                    'next_text'          => __( 'Next page', 'vw-automobile-lite' ),
                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'vw-automobile-lite' ) . ' </span>',
                ) );
            ?>
              <div class="clearfix"></div>
          </div>
        </div>
        <div class="col-md-3" id="sidebar"><?php dynamic_sidebar('sidebar-2');?></div>
      </div>
    <?php }else if($left_right == 'Four Columns'){ ?>
      <div class="row">
        <div class="col-md-3" id="sidebar"><?php dynamic_sidebar('sidebar-1');?></div>
        <div id="our-services" class="services col-md-3">
                    
          <?php if ( have_posts() ) :
            /* Start the Loop */
              
              while ( have_posts() ) : the_post();

                get_template_part( 'template-parts/single-post-layout' ); 
              
              endwhile;

              else :

                get_template_part( 'no-results', 'archive' ); 

              endif; 
          ?>
          <div class="navigation">
            <?php
                // Previous/next page navigation.
                the_posts_pagination( array(
                    'prev_text'          => __( 'Previous page', 'vw-automobile-lite' ),
                    'next_text'          => __( 'Next page', 'vw-automobile-lite' ),
                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'vw-automobile-lite' ) . ' </span>',
                ) );
            ?>
              <div class="clearfix"></div>
          </div>
        </div>
        <div class="col-md-3" id="sidebar"><?php dynamic_sidebar('sidebar-2');?></div>
        <div class="col-md-3" id="sidebar"><?php dynamic_sidebar('sidebar-3');?></div>
      </div>
    <?php }else if($left_right == 'Grid Layout'){ ?>
      <div class="row">
        <div id="our-services" class="services col-md-8">
                    
          <?php if ( have_posts() ) :
            /* Start the Loop */
              
              while ( have_posts() ) : the_post();

                get_template_part( 'template-parts/single-post-layout' ); 
              
              endwhile;

              else :

                get_template_part( 'no-results', 'archive' ); 

              endif; 
          ?>
          <div class="navigation">
            <?php
                // Previous/next page navigation.
                the_posts_pagination( array(
                    'prev_text'          => __( 'Previous page', 'vw-automobile-lite' ),
                    'next_text'          => __( 'Next page', 'vw-automobile-lite' ),
                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'vw-automobile-lite' ) . ' </span>',
                ) );
            ?>
              <div class="clearfix"></div>
          </div>
        </div>
        <div class="col-md-4" id="sidebar"><?php dynamic_sidebar('sidebar-1');?></div>
      </div>
    <?php } ?>
    <div class="clearfix"></div>
  </div>
</div>
<?php get_footer(); ?>