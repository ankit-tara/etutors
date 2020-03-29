<?php

$url_path = trim(parse_url(add_query_arg(array()), PHP_URL_PATH), '/');
if (contains('listening', $url_path)) {
    $test_part = 'listening';
} elseif (contains('reading', $url_path)) {
    $test_part = 'reading';
} else {
    $test_part = 'writing';
}

$current_user = wp_get_current_user();
$is_demo_user = $current_user->user_email == 'demo@demo.com';

$no_of_posts = $is_demo_user ? 1 : 15;

$test_data = get_test_user_meta($current_user);
$is_allowed = (!$test_data['is_academic'] && !$test_data['is_general'] && (isset($test_data['is_ctpd']) && !$test_data['is_ctpd'])) || date("Y-m-d") > $test_data['end_date'];
if ($is_allowed && !$is_demo_user) {
    $tests = [];
    wp_redirect(site_url() . '/student-locked-profile');

} else {
    $meta_query = [
        'relation' => 'AND',
        [
            'key' => 'test_part',
            'value' => $test_part,
            'compare' => '=',
        ],
        [
            'key' => 'status',
            'value' => 'active',
            'compare' => '=',
        ],

    ];

    if (!$is_demo_user && $test_data['days']) {
        $no_of_posts = $test_data['days'];
    }

    if ($test_data['is_academic'] || $test_data['is_general'] || @$test_data['is_ctpd']) {
         $meta_query2['relation'] ='OR';
        if ($test_data['is_general']) {
            $t_type = '"general"';
            $meta_query2[] = [
                'key' => 'test_type',
                'value' => $t_type,
                'compare' => 'LIKE',
            ];

        }
        if ($test_data['is_academic']) {
            $t_type = '"academic"';
            $meta_query2[] = [
                'key' => 'test_type',
                'value' => $t_type,
                'compare' => 'LIKE',
            ];

        }
        if (isset($test_data['is_ctpd']) && $test_data['is_ctpd']) {
            $t_type = '"ctpd"';
            $meta_query2[] = [
                'key' => 'test_type',
                'value' => $t_type,
                'compare' => 'LIKE',
            ];

        }
        $meta_query[] = $meta_query2;

    }
    // print_r($meta_query);
    // die;
    $args = array(
        'post_type' => 'ar-ielts-tests',
        'posts_per_page' => $no_of_posts,
        'meta_query' => $meta_query,
    );

    $tests = new WP_Query($args);

}

get_header('dashboard');

?>

<main class="main-content bgc-grey-100">
    <div id="mainContent">
        <div class="table-responsive p-20">
            <table class="table">
                <thead>
                    <tr>
                        <th class="bdwT-0">Name</th>
                        <th class="bdwT-0">Test</th>
                        <th class="bdwT-0">Type</th>
                        <th class="bdwT-0">Date</th>
                        <th class="bdwT-0">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($tests->have_posts()):
    while ($tests->have_posts()):
        $tests->the_post();
        $url = home_url() . '/student-profile/test/' . get_field('test_part') . '?et=' . base64_encode(get_the_ID());
        $url = wp_nonce_url($url, 'ar-tests-noonce')
        ?>
		                    <tr>
		                        <td><?php the_title()?></td>
		                        <td>
		                            <?php
        $test_part = get_field('test_part');
        if ($test_part == 'listening') {
            echo '<span class="badge bgc-deep-purple-50 c-deep-purple-700 p-10 lh-0 tt-c badge-pill">Listening</span>';
        } elseif ($test_part == 'reading') {
        echo '<span class="badge bgc-green-50 c-green-700 p-10 lh-0 tt-c badge-pill">Reading</span>';
    } else {
        echo ' <span class="badge bgc-red-50 c-red-700 p-10 lh-0 tt-c badge-pill">Writing</span> ';
    }
    ?>
	                        </td>
	                        <td><?php the_field('test_type')?></td>
	                        <td><?php echo get_the_date() ?></td>
	                        <td>
	                            <a href="<?php echo $url ?>" class="btn bgc-deep-purple-50 c-deep-purple-700">Start Test</a>
	                        </td>
	                    </tr>
	                    <?php endwhile;
endif;?>
                </tbody>
            </table>
        </div>

    </div>
</main>

<?php get_footer('dashboard');?>