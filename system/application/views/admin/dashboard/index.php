<div class="page-header"><h3>Trainers to approve certifications</h3></div>

<div class="row wrapper"><div class="col-lg-12">
    <table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Date Registered</th>
            <th>Certified</th>
            <th>Operation</th>
        </tr>
    </thead>
    <tbody>
        <?php if(!empty($trainers)) { ?>
            <?php foreach($trainers as $r) { ?>
            <tr>
                <td><?php echo $r->id; ?></td>
                <td><?php echo $r->full_name; ?></td>
                <td><?php echo $r->created_at; ?></td>
                <td>Waiting</td>
                <td><a href="<?php echo admin_url('dashboard/view_trainer/'.md5($r->id)); ?>">View</a></td>
            </tr>
            <?php } ?>
        <?php } else { ?>
            <tr><td colspan="20">There is no trainers to certify.</td></tr>
        <?php } ?>
    </tbody>
    </table>
</div></div>
    