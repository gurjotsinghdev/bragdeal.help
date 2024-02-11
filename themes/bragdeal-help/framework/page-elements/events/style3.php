<section class="custom-section page_section_<?php echo $page_section; ?> <?php echo $background; ?> <?php echo $classes; ?>" style="padding-top: <?php echo $padding_top.'px'; ?>; padding-bottom: <?php echo $padding_bottom.'px'; ?>;">
    <div class="<?php echo $section_width; ?>" style="padding-left: <?php echo $padding_left.'px !important'; ?>; padding-right: <?php echo $padding_right.'px !important'; ?>;">
        <div class="<?php echo $row; ?>">
          <div class="col-md-12 text-center">
            <div class="associate-area mb-5">
              <ul class="nav nav-pills mb-3" id="pills-<?php echo $page_section; ?>-tab" role="tablist">
                <?php
                $count = 0;
                while ( $query->have_posts() ) : $query->the_post();
                $tab = 'tab_'.$page_section.'_'.$count; 
                $short_title = get_field('short_title');
                if($count == 0){
                    $active = ' active';
                } else {
                    $active = '';
                }
                ?>
                <li class="nav-item" role="presentation">
                  <button class="nav-link<?php echo $active; ?>" id="<?php echo $tab; ?>-tab" data-bs-toggle="pill" data-bs-target="#<?php echo $tab; ?>" type="button" role="tab" aria-controls="<?php echo $tab; ?>" aria-selected="false">
                  <?php
                    if(empty($short_title)){
                      echo get_the_title();
                    } else {
                      echo $short_title;
                    }
                  ?>
                </button>
                </li>
                <?php $count++; endwhile; wp_reset_query(); ?>
              </ul>
              <div class="tab-content" id="pills-tabContent">
                <?php 
                $count = 0;
                while ( $query->have_posts() ) : $query->the_post();
                $tab = 'tab_'.$page_section.'_'.$count; 
                $speaker = get_field('speaker');
                if($count == 0){
                    $active = ' show active';
                } else {
                    $active = '';
                }
                ?>
                <div class="tab-pane fade<?php echo $active; ?>" id="<?php echo $tab; ?>" role="tabpanel" aria-labelledby="<?php echo $tab; ?>-tab">
                <?php 
                  $year = wp_get_post_terms(get_the_ID(), 'event_year', array("fields" => "names"));
                  
                  $event_date = get_field('date'); 
                  $timestamp = strtotime(str_replace('/', '-', $event_date));
                  $formatted_date = date("l F j, Y", $timestamp);
                  if(!empty($event_date)){
                    echo '<h2 class="mt-60 date-style">'.$formatted_date.'</h2>';
                  }
                  ?>
                  <h4><?php echo get_the_title(); ?></h4>
                  <p class="mt-60">
                    <?php 
                    if(!empty($speaker)){
                      echo '<strong>Speaker:</strong> '.$speaker.'<br></p>';
                    }
                    ?>
                    <?php
                    $short_description = get_field('short_description');
                    if(!empty($short_description)){ echo '<p>'.$short_description.'</p>';}
                    ?>
                  <a href="<?php echo esc_url(site_url('/become-a-member')); ?>" class="btn-style">Register Now</a>
                </div>
                <?php $count++; endwhile; wp_reset_query(); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
</section>