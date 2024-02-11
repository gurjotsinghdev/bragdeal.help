<!-- Industries section start -->
<section class="custom-section page_section_<?php echo $page_section; ?> text-<?php echo $text_align; ?> <?php echo $background; ?> <?php echo $classes; ?>" style="padding-top: <?php echo $padding_top.'px'; ?>; padding-bottom: <?php echo $padding_bottom.'px'; ?>;">
      <div class="<?php echo $section_width; ?>" style="padding-left: <?php echo $padding_left.'px !important'; ?>; padding-right: <?php echo $padding_right.'px !important'; ?>">
        <div class="<?php echo $row; ?>">
          <div class="col-md-12 text-center">
            <div class="brand-slider">
              <div class="owl-carousel owl-drag">
                <?php 
                    while ( $query->have_posts() ) : $query->the_post();
                        $compnay_logo = get_field('logo');
                        $logo_link_url = get_field('logo_link_url');
                        echo '<div class="img-size"><a href="'.get_the_permalink().'"><img src="'.$compnay_logo['url'].'" alt="'.$compnay_logo['alt'].'"> </a></div>';
                    endwhile; wp_reset_query();
                ?>
              </div>
            </div>
          </div>
          <?php 
          if(!empty($button['text'])){
            echo '<div class="col-md-12 text-center mt-5">';
              echo '<a href="'.$button['link'].'" target="'.$button['target'].'" class="btn-style">'.$button['text'].'</a>';
            echo '</div>';
          }
          ?>
        </div>
    </div>
</section>
<div class="clearfix"></div>
<!-- Industries section end -->