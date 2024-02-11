<!-- Events start -->
<section class="news-evets custom-section page_section_<?php echo $page_section; ?> <?php echo $background; ?> <?php echo $classes; ?>" style="padding-top: <?php echo $padding_top.'px'; ?>; padding-bottom: <?php echo $padding_bottom.'px'; ?>;">
<div class="<?php echo $section_width; ?>" style="padding-left: <?php echo $padding_left.'px !important'; ?>; padding-right: <?php echo $padding_right.'px !important'; ?>;">
        <div class="<?php echo $row; ?>">
          <div class="col-12 custom-event-heading text-center">
            <?php 
            if(!empty($heading)){
                echo '<h2>'.$heading.'</h2>';
            }
            if(!empty($button['text'])){
                echo '<a class="sub-heading" href="'.$button['link'].'" target="'.$button['target'].'">'.$button['text'].'</a>';
            }
            ?>
          </div>
          <div class="clearfix"></div>
          <?php 
            while ( $query->have_posts() ) : $query->the_post();
            $title = get_the_title();
            $feat_image = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID()) );
          ?>
            <div class="col-12 col-md-6 col-lg-<?php echo $column; ?>">
                <div class="card">
                    <?php 
                    if(!empty($feat_image)){
                        echo '<img src="'.$feat_image.'" alt="">';
                    }
                    ?>
                    <div class="news-text">
                        <h6>
                          <?php 
                            $event_date = get_field('date'); 
                            $timestamp = strtotime(str_replace('/', '-', $event_date));
                            $formatted_date = date("F j, Y", $timestamp);
                            echo $formatted_date;
                          ?>
                        </h6>
                        <?php 
                        if(!empty($title)){
                            echo '<p>'.$title.'</p>';
                        }
                        ?>
                    </div>
                    <a href="<?php the_permalink(); ?>"></a>
                </div>
            </div>
            <?php endwhile; wp_reset_query(); ?>
        </div>
      </div>
    </section>
<div class="clearfix"></div>
<!-- Events end -->