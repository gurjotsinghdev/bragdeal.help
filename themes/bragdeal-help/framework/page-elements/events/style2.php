<section class="archived-section custom-section page_section_<?php echo $page_section; ?> <?php echo $background; ?> <?php echo $classes; ?>" style="padding-top: <?php echo $padding_top.'px'; ?>; padding-bottom: <?php echo $padding_bottom.'px'; ?>;">
    <div class="<?php echo $section_width; ?>" style="padding-left: <?php echo $padding_left.'px !important'; ?>; padding-right: <?php echo $padding_right.'px !important'; ?>;">
        <div class="<?php echo $row; ?>">
            <div class="archived-area">
                <?php 
                while ( $query->have_posts() ) : $query->the_post();
                $title = get_the_title();
                ?>
                <div class="archived-itme">
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
                        echo '<h4>'.$title.'</h4>';
                    }
                    $sponsore = get_field('sponsore');
                    if(!empty($sponsore)){ echo '<p>Sponsored by '.$sponsore.'</p>'; }
                    $external_link = get_field('external_link');
                    $link = get_field('link'); 
                    if($external_link == 1 || !empty($link)){
                        echo '<a href="'.$link.'" target="_blank"></a>'; 
                    } else {
                        echo '<a href="'.get_the_permalink().'"></a>';
                    }
                    ?>
                </div>
                <?php endwhile; wp_reset_query(); ?>
            </div>
        </div>
        <div class="style2-button-holder">
            <?php 
                if(!empty($button['text'])){
                    echo '<a class="btn-style" href="'.$button['link'].'" target="'.$button['target'].'">'.$button['text'].'</a>';
                }
            ?>
        </div>
    </div>
</section>