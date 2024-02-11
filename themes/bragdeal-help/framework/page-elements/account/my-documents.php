<div class="documents-tab-contnet">
    <?php 
    $user_id = get_current_user_id();
    ?>
    <h2 class="mt-60 text-center mb-4"><?php echo __($tab['label'], 'ches'); ?></h2>
    <?php 
        $user_id = get_current_user_id();
        $args = array(
            'post_type'      => 'im_documents',
            'posts_per_page' => -1,
            'status'         => 'publish',
        );
        $query = new WP_Query($args);
        echo '<div class="user-document-holder">';
        while ( $query->have_posts() ) : $query->the_post();
            $assign_users = get_field('assign_users');
            $document = get_field('document');
            if(!empty($assign_users)){
                if (in_array($user_id, $assign_users)) {
                    echo '<div class="document-box"><div>';
                        echo '<h4>'.the_title().'</h4>';
                        echo '<a href="'.$document['url'].'" download class="btn-style">Download</a>';
                    echo '</div></div>';
                }
            }
        endwhile; wp_reset_query();
        echo '</div>';
    ?>
</div>