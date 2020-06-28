<?php
$users = get_users(
    [
        'role__in' => ['student'],
        // 'meta_query' => array(
        //     [
        //         'meta_key' => 'is_ctpd',
        //         'value' => null,
        //         'compare' => 'LIKE',
        //         // 'meta_value' => array('', array(), serialize(array())), 'compare' => 'NOT IN',
        //     ],

        // ),
    ]);
get_header('instructor');

?>
<main class="main-content bgc-grey-100">
    <div id="mainContent">
        <h2>Students List</h2>
        <div class="table-responsive p-20">
            <table class="table">
                <thead>
                    <tr>
                        <th class="bdwT-0">Name</th>
                        <th class="bdwT-0">Email</th>
                        <th class="bdwT-0">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user) {
                        $is_ctpd = get_user_meta($user->ID, 'is_ctpd');
                        if(!$is_ctpd || !count($is_ctpd) || !$is_ctpd[0]){
                            continue;
                        }
                        $url = home_url() . '/instructor-profile/student-tests/?et=' . base64_encode($user->ID);

                        ?>
                    <tr>
                        <td><?php echo $user->display_name ?></td>
                        <td><?php echo $user->user_email ?></td>
                        <td>
                            <a href="<?php echo $url ?>" class="btn bgc-deep-purple-50 c-deep-purple-700">View Tests</a>
                        </td>
                        
                    </tr>

                    <?php }?>

                    <?php if (!count($users)) {
    echo '<tr><td colspan=5" class="text-center">New Tests Coming up soon!!</td></tr>';

}?>
                </tbody>
            </table>
        </div>

    </div>
</main>
<?php get_footer('dashboard');