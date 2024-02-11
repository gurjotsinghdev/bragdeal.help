<?php
    $slides        = get_sub_field('slides');
    
    $show          = $slides['show'];
    $no_of_slides  = $slides['no_of_slides'];
    $order         = $slides['order'];
    $select_slides = $slides['select_slides'];
    
    $styling       = get_sub_field('styling');
    
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
    
  
?>
<!-- Slider start -->
<section class="banner-area custom-section page_section_<?php echo $page_section; ?> <?php echo $background; ?> <?php echo $classes; ?>">
    <div class="<?php echo $section_width; ?>">
        <div class="<?php echo $row; ?>">
            <div id="carouselExampleCaptions<?php echo $page_section; ?>" class="carousel slide"
            data-bs-ride="carousel">

                <?php 
                // If show all slides
                if($show == 'all'){
                    $args = array(
                        'post_type'      => 'im_slides',
                        'posts_per_page' => $no_of_slides,
                        'orderby'        => 'date',
                        'order'          => $order,
                        'status'         => 'publish',
                    );
                } else {
                    $args = array(
                        'post_type'      => 'im_slides',
                        'post__in'       => $select_slides,
                        'status'         => 'publish',
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
                    <button type="button" data-bs-target="#carouselExampleCaptions<?php echo $page_section; ?>" data-bs-slide-to="<?php echo $count; ?>" class="<?php echo $active; ?>" aria-current="true" aria-label=""></button>
                    <?php $count++; endwhile; wp_reset_query(); ?>
                </div>
                
                <div class="carousel-inner">
                <?php 
                    $count = 0;
                    while ( $query->have_posts() ) : $query->the_post();
                    $title = get_the_title();
                    $image = get_field('image');
                    $content = get_field('content');
                    $button = get_field('button');
                    $text_align = get_field('text_align');
                    
                    if($count == 0){
                        $active = 'active';
                    } else {
                        $active = '';
                    }
                    ?>
                    <div class="carousel-item <?php echo $active; ?>">
                        <?php 
                        if(!empty($image)){
                            echo '<img src="'.$image['url'].'" class="d-block w-100" alt="'.$image['alt'].'">';
                        }
                        ?>
                        <div class="container carousel-caption text-<?php echo $text_align; ?>">
                            <div class="banner-text">
                                <?php 
                                if(!empty($title)){
                                    echo '<h1>'.$title.'</h1>';
                                }
                                if(!empty($content)){
                                    echo '<p>'.$content.'</p>';
                                }
                                if(!empty($button['text'])){
                                    echo '<a href="'.$button['link'].'" target="'.$button['target'].'" class="btn-style">'.$button['text'].'</a>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php $count++; endwhile; wp_reset_query(); ?>
                </div>

            </div>
        </div>
    </div>    
</section>
<div class="clearfix"></div>
<!-- Slider end -->