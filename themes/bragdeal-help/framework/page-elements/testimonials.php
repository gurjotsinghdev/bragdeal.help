<?php
    $heading             = get_sub_field('heading');
    $image               = get_sub_field('image');
    $testimonials        = get_sub_field('testimonials');
    
    $show                = $testimonials['show'];
    $no_of_testimonials  = $testimonials['no_of_testimonials'];
    $order               = $testimonials['order'];
    $select_testimonials = $testimonials['select_testimonials'];
    
    $styling       = get_sub_field('styling');

    // Section padding
    $padding = $styling['padding'];
    $padding_top = $padding['top'];
    if(empty($padding_top)){ $padding_top = 0;}
    $padding_right = $padding['right'];
    if(empty($padding_right)){ $padding_right = 0;}
    $padding_bottom = $padding['bottom'];
    if(empty($padding_bottom)){ $padding_bottom = 0;}
    $padding_left = $padding['left'];
    if(empty($padding_left)){ $padding_left = 0;}
    
    // Section background
    $background = $styling['background'];

    // Section width
    $section_width = $styling['section_width'];
    if($section_width == 'boxed'){
        $section_width = 'container';
        $row = 'row';
    } else {
        $section_width = 'container-fluid px-0';
        $row = 'row gx-0';
    }
    
    // Extra classes
    $classes = $styling['classes'];

    // Text align
    $text_align = $styling['text_align'];

    $page_section = $args['page_section'];
    
  
?>
<!-- Testimonials start -->
<section class="testimonials_slider custom-section page_section_<?php echo $page_section; ?> text-<?php echo $text_align; ?> <?php echo $background; ?> <?php echo $classes; ?>" style="padding-top: <?php echo $padding_top.'px'; ?>; padding-bottom: <?php echo $padding_bottom.'px'; ?>;">
    <div class="<?php echo $section_width; ?>" style="padding-left: <?php echo $padding_left.'px !important'; ?>; padding-right: <?php echo $padding_right.'px !important'; ?>;">
        <div class="<?php echo $row; ?>">
          <div class="col-12">
            <div class="testimonials-area">
              <div class="test-img">    
                <?php 
                if(!empty($image)){
                    echo '<img src="'.$image['url'].'" alt="">';
                } 
                ?>
              </div>
              <div class="testimonials">
                <div class="quoti-test"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/qut.png"
                    alt></div>

                <div class="test-slide-area">
                <?php
                        if(!empty($heading)){
                            echo '<h2>'.$heading.'</h2>';
                        }
                        ?>
                </div>
                <div id="carouselExampleDark<?php echo $page_section; ?>"
                  class="carousel carousel-dark slide" data-bs-ride="carousel">
                  <?php 
                    // If show all testimonials
                    if($show == 'all'){
                        $args = array(
                            'post_type'      => 'im_testimonials',
                            'posts_per_page' => $no_of_testimonials,
                            'orderby'        => 'date',
                            'order'          => $order,
                        );
                    } else {
                        $args = array(
                            'post_type'      => 'im_testimonials',
                            'post__in'       => $select_testimonials,
                        );
                    }

                    $query = new WP_Query($args);
                  ?>
                  <div class="carousel-indicators">
                    <?php 
                    $count = 0;
                    while ( $query->have_posts() ) : $query->the_post();
                    if($count == 0){
                        $active = 'active';
                    } else {
                        $active = '';
                    }
                    ?>
                    <button type="button" data-bs-target="#carouselExampleDark<?php echo $page_section; ?>"
                      data-bs-slide-to="<?php echo $count; ?>" class="<?php echo $active; ?>" aria-current="true"
                      aria-label=""></button>
                    <?php $count++; endwhile; wp_reset_query(); ?>
                  </div>
                  <div class="carousel-inner">
                    <?php
                    $count = 0;
                    while ( $query->have_posts() ) : $query->the_post();
                    $title = get_the_title();
                    $author = get_field('author');
                    $designation = get_field('designation');
                    $company = get_field('company');
                    $content = get_field('content');
                    
                    if($count == 0){
                        $active = 'active';
                    } else {
                        $active = '';
                    }
                    ?>
                    <div class="carousel-item <?php echo $active; ?>" data-bs-interval="2000">
                      <div class="carousel-caption">
                        <h6>
                          <?php 
                          if(!empty($author)){ echo $author; }
                          if(!empty($designation)){ echo ', '.$designation; }
                          if(!empty($company)){ echo ', '.$company; } 
                          ?>
                        </h6>
                        <?php if(!empty($content)){ echo '<p>'.$content.'</p>'; }  ?>
                      </div>
                    </div>
                    <?php $count++; endwhile; wp_reset_query(); ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
<div class="clearfix"></div>
<!-- Testimonials end -->