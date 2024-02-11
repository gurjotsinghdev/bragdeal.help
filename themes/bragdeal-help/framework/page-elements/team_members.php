<?php
    $heading       = get_sub_field('heading');
    $teams         = get_sub_field('team');
    $button        = get_sub_field('button');
    
    $show          = $teams['show'];
    $no_of_members   = $teams['number_of_members'];
    $order         = $teams['order'];
    $select_members  = $teams['select_members'];
    $type          = $teams['type'];
    
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

    $term = get_term($type, 'team_type');
    if (!is_wp_error($term)) {
        $term_name = $term->name;
    } else {
        $term_name = '';
    }

	if(!empty($type)){
        $type = array('taxonomy' => 'team_type', 'field' => 'term_id', 'terms' => $type);
	} else {
		$type = '';
	}

    // If show all events
    if($show == 'all'){
        $args = array(
            'post_type'      => 'im_teams',
            'posts_per_page' => $no_of_members,
            'orderby'        => 'date',
            'order'          => $order,
            'status'         => 'publish',
            'tax_query' => array( 
                'relation' => 'AND',
                $type,  
            )
        );
    } else {
        $args = array(
            'post_type'      => 'im_teams',
            'post__in'       => $select_members,
            'status'         => 'publish',
        );
    }
    
    $query = new WP_Query($args);
  
?>
<!-- Team section start -->
<section class="exective-area custom-section page_section_<?php echo $page_section; ?> <?php echo $background; ?> <?php echo $classes; ?>" style="padding-top: <?php echo $padding_top.'px'; ?>; padding-bottom: <?php echo $padding_bottom.'px'; ?>;">
    <div class="<?php echo $section_width; ?>" style="padding-left: <?php echo $padding_left.'px !important'; ?>; padding-right: <?php echo $padding_right.'px !important'; ?>;">
        <div class="<?php echo $row; ?>">
          <div class="col-12 text-center">
            <?php 
            if(!empty($heading)){
                echo '<h2>'.$heading.'</h2>';
            }

            if (!empty($term_name)) {
                echo '<h4>'.$term_name.'</h4>';
            }

            ?>
          </div>
          <div class="col-12">
            <div class="exective-team">
              <?php 
              while ( $query->have_posts() ) : $query->the_post();
              $designation = get_field('designation');
              $bio = get_field('bio');
              $member_image = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID()) ); 
              ?>
              <div class="exective">
                <span class="remove-active">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                    <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
                  </svg>
                </span>
                <div class="exective-img">
                  <?php 
                  if(!empty($member_image)){
                    echo '<img src="'.$member_image.'" alt="">';
                  }
                  ?>
                </div>
                <div class="exective-text">
                <h2>
                  <?php the_title(); ?>
                  <?php if(!empty($designation)){ echo ' - '.$designation; } ?>
                </h2>
                <p><?php echo $bio; ?></p>
                </div>
              </div>
              <?php endwhile; wp_reset_query(); ?>
            </div>
          </div>
        </div>
      </div>
</section>
<div class="clearfix"></div>
<!-- Team section end -->