<?php
    $heading       = get_sub_field('heading');
    $awards         = get_sub_field('awards_&_grants');
    
    $show          = $awards['show'];
    $no_of_awards   = $awards['number_of_awards'];
    $order         = $awards['order'];
    $select_awards  = $awards['select_members'];
    $chapter          = $awards['chapter'];
    
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

    $page_section = $args['page_section'];

    // If show all events
    if($show == 'all'){
        $args = array(
            'post_type'      => 'im_awards',
            'posts_per_page' => $no_of_awards,
            'orderby'        => 'date',
            'order'          => $order,
            'status'         => 'publish',
        );

        if (!empty($chapter)) {
            $args['meta_query'] = array(
                array(
                    'key'     => 'assign_chapter',
                    'value'   => $chapter,
                    'compare' => '='
                )
            );
        }

    } else {
        $args = array(
            'post_type'      => 'im_awards',
            'post__in'       => $select_awards,
            'status'         => 'publish',
        );
    }
    
    $query = new WP_Query($args);
  
?>
<!-- Award section start -->
<section class="exective-area custom-section page_section_<?php echo $page_section; ?> <?php echo $background; ?> <?php echo $classes; ?>" style="padding-top: <?php echo $padding_top.'px'; ?>; padding-bottom: <?php echo $padding_bottom.'px'; ?>;">
    <div class="<?php echo $section_width; ?>" style="padding-left: <?php echo $padding_left.'px !important'; ?>; padding-right: <?php echo $padding_right.'px !important'; ?>;">
        <div class="<?php echo $row; ?>">
          <div class="col-12 text-center">
            <?php 
            if(!empty($heading)){
                echo '<h2>'.$heading.'</h2>';
            }

            ?>
          </div>
          <div class="col-12 mt-100">
            <div class="award-area">
              <?php 
              while ( $query->have_posts() ) : $query->the_post();
              $logo = get_field('logo');
              $description = get_field('description');
              ?>
              <div class="award-itme">
                <div class="award-img">
                  <?php if(!empty($logo)){ echo '<img src="'.$logo['url'].'" alt="">'; } ?>
                </div>
                <div class="award-text text-center">
                  <h6><?php the_title(); ?></h6>
                  <p><?php echo $description; ?></p>
                </div>
                <a href="<?php the_permalink(); ?>"></a>
              </div>
              <?php endwhile; wp_reset_query(); ?>
            </div>
          </div>
        </div>
      </div>
</section>
<div class="clearfix"></div>
<!-- Award section end -->