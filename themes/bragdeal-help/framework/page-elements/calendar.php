<?php 

$heading = get_sub_field('heading');
$events = get_sub_field('events');
$types = get_sub_field('types');
$years = get_sub_field('years');

$styling = get_sub_field('styling');

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

?>
<!-- Shortcode start -->
<section class="calendar-section custom-section page_section_<?php echo $page_section; ?> text-<?php echo $text_align; ?> <?php echo $background; ?> <?php echo $classes; ?>" style="padding-top: <?php echo $padding_top.'px'; ?>; padding-bottom: <?php echo $padding_bottom.'px'; ?>;">
    <div class="<?php echo $section_width; ?>" style="padding-left: <?php echo $padding_left.'px !important'; ?>; padding-right: <?php echo $padding_right.'px !important'; ?>">
        <div class="<?php echo $row; ?>">
            <div class="col-12">
                <?php 
                if(!empty($heading)){
                    echo '<h3 class="heading text-center mb-4">'.$heading.'</h3>';
                }
                ?>
                <div class="calender-wrapper">
                    <?php 
                    // Event types filter
                    if($types['show'] == 1){
                        
                        if($types['select_types'] == 1){
                            $taxonomy_terms = get_terms(array(
                                'taxonomy' => 'event_type',
                                'hide_empty' => false,
                            ));
                        } else {
                            $taxonomy_terms = $types['types'];
                        }

                        if (!empty($taxonomy_terms)) {
                            echo '<ul class="calender-filter">';
                            foreach ($taxonomy_terms as $term) {
                                echo '<li class="event_filter_wrapper">';
                                echo '<input id="' . esc_attr($term->slug) . '" class="event_filter" checked name="event_filter_sel" type="checkbox" value="' . esc_attr($term->slug) . '" data-type="type" />';
                                echo '<label for="' . esc_attr($term->slug) . '">' . esc_html($term->name) . '</label>';
                                echo '</li>';
                            }
                            echo '</ul>';
                        }
                    }
                    ?>
                    <?php
                    // Event years filter 
                    if($years['show'] == 1){
                        
                        if($years['select_years'] == 1){
                            $taxonomy_terms = get_terms(array(
                                'taxonomy' => 'event_year',
                                'hide_empty' => false,
                            ));
                        } else {
                            $taxonomy_terms = $years['years'];
                        }

                        if (!empty($taxonomy_terms)) {
                            echo '<ul class="calender-filter">';
                        foreach ($taxonomy_terms as $term) {
                            echo '<li class="event_filter_wrapper">';
                            echo '<input id="' . esc_attr($term->slug) . '" class="event_filter" checked name="event_filter_sel" type="checkbox" value="' . esc_attr($term->slug) . '" data-type="year" />';
                            echo '<label for="' . esc_attr($term->slug) . '">' . esc_html($term->name) . '</label>';
                            echo '</li>';
                        }
                        echo '</ul>';
                        }
                    }
                    ?>

                    <div id='full-calendar' data-type="<?php echo $events['type']; ?>"></div>
                </div>

            </div>
        </div>
    </div>
</section>
<div class="clr"></div>
<!-- Shortcode end -->