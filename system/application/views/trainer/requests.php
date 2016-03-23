<div class="page-header"><h3>Received Requests</h3></div>

<div class="row wrapper"><div class="col-lg-12">
    <table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Area</th>
            <th>Training Type</th>
            <th>Date</th>
            <th>Time</th>
            <th>Name</th>
            <th>Received</th>
            <th>Status</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php if(!empty($requests)) { ?>
            <?php foreach($requests as $r) { ?>
            <tr>
                <td><?php echo $r->req_id; ?></td>
                <td><?php echo $r->req_area_code; ?></td>
                <td><?php echo $r->service_name; ?></td>
                <td><?php echo $r->req_require_date; ?></td>
                <td><?php echo get_service_time($r->req_require_time); ?></td>
                <td><?php echo $r->full_name; ?></td>
                <td><?php echo $r->req_created_at; ?></td>
                <td><?php echo ''; ?></td>
                <td><a href="<?php echo site_url('trainer/request/'.md5($r->req_id)); ?>">View</a></td>
            </tr>
            <?php } ?>
        <?php } else { ?>
            <tr><td colspan="20">There is no received requests.</td></tr>
        <?php } ?>
    </tbody>
    </table>
    
    <?php echo $this->pagination->create_links(); ?>
</div></div>
    