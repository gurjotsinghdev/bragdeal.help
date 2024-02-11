<div class="dashboard-tab-contnet text-center">
    <?php 
    $user_id       = get_current_user_id();
    $current_user  = wp_get_current_user();
    $display_name  = $current_user->display_name;
    $profile_image = get_field('profile_image', 'user_'.$user_id);
    $user_bio      = get_user_meta($user_id, 'description', true);
    ?>
    <h2 class="mt-60"><?php echo __('Welcome Back!', 'ches'); ?></h2>
    <?php 
    if(!empty($display_name)){
        echo '<h4>'.$display_name.'</h4>';
    } 
    if(!empty($profile_image)){
        echo '<div class="user-img profile-image-holder"><img src="'.$profile_image['url'].'" alt="user_profile_image"></div>';
    }
    if(!empty($user_bio)){
        echo '<p class="mt-60">'.$user_bio.'</p>';
    }

    echo '<div class="plan-account-holder">';
    echo do_shortcode('[pms-account show_tabs="no"]');
    echo '</div>';

    ?>
</div>