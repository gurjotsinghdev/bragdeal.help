<!-- Events start -->
<div class="conference-archives custom-section page_section_<?php echo $page_section; ?> text-<?php echo $text_align; ?> <?php echo $background; ?> <?php echo $classes; ?>" style="padding-top: <?php echo $padding_top.'px'; ?>; padding-bottom: <?php echo $padding_bottom.'px'; ?>;">
    <div class="<?php echo $section_width; ?>" style="padding-left: <?php echo $padding_left.'px !important'; ?>; padding-right: <?php echo $padding_right.'px !important'; ?>">
        <div class="<?php echo $row; ?>">
            <?php 
            if(!empty($heading)){
                echo '<h4>'.$heading.'</h4>';
            }
            ?>
            <div class="conference-area">
                <?php 
                while ( $query->have_posts() ) : $query->the_post();
                $intro = get_field('intro');
                $sponsore = get_field('sponsore');
                ?>
                <div class="conference-item active">
                    <div>
                        <?php 
                        if(!empty($sponsore)){
                            echo '<h6>'.$sponsore.'</h6>';
                        }
                        echo '<p>'.get_the_title().'</p>'; 
                        if(!empty($intro)){
                            echo '<h6>'.$intro.'</h6>';
                        }
                        ?>
                    </div>
                    <div class="file-line">
                        <i class="fa-solid fa-file-lines"></i>
                    </div>
                    <a href="<?php the_permalink() ?>"></a>
                </div>
                <?php endwhile; wp_reset_query(); ?>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<!-- Events end -->