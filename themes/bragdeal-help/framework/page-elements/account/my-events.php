<div class="events-tab-contnet">
    <?php 
    $user_id = get_current_user_id();
    ?>
    <h2 class="mt-60 text-center mb-4"><?php echo __($tab['label'], 'ches'); ?></h2>
    <?php 
    // Get user subscriptions
    $args = array('user_id' => $user_id);
    $plans = pms_get_member_subscriptions($args);
    $plan_ids = array();
    
    if (!empty($plans)) {
        foreach ($plans as $plan) {
            if($plan->status == 'active'){
                $plan_ids[] = $plan->subscription_plan_id;
            }
        }
    }
    ?>
    <div class="forum-table account-table">
                <table class="table">
                  <tbody>
    <?php
    $args = array(
        'post_type' => 'im_events',
        'meta_query' => array(
            array(
                'key' => 'select_plan',
                'value' => $plan_ids,
                'compare' => 'IN',
            ),
        ),
    );
    
    // Instantiate a new WP_Query
    $custom_query = new WP_Query($args);
    
    if ($custom_query->have_posts()) {
        while ($custom_query->have_posts()) {
            $custom_query->the_post();
            echo '<tr><td><a href="'.get_the_permalink().'">'.get_the_title().'</a></td></tr>';
        }
        wp_reset_postdata();
    } else {
        echo '<tr><td style="text-align: center; border: 0;">No events to show.</td></tr>';
    }    

    ?>
    </tbody>
                </table>
              </div>
</div>