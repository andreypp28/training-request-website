<div class="form-horizontal">

    <div class="page-header"><h4>You requested this training on <?php echo $record->req_created_at; ?></h4></div>

    <div class="form-group">
        <label class="control-label col-xs-2">Training Name</label>
        <div class="col-xs-10">
            <label class="control-label"><?php echo $record->service_name; ?></label>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-xs-2">Area</label>
        <div class="col-xs-10">
            <label class="control-label"><?php echo $area->area_name . "(" . $area->area_code . ")"; ?></label>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-xs-2">Training Type</label>
        <div class="col-xs-10">
            <label class="control-label"><?php echo get_service_type($record->req_service_type); ?></label>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-xs-2">Closing Date</label>
        <div class="col-xs-10">
            <label class="control-label"><?php echo date('Y-m-d H:i:s', $record->req_expiration_date); ?></label>
        </div>
    </div>

    <br/>
    <div class="page-header"><h4><?php echo $record->full_name; ?> quoted on your request</h4></div>

    <div class="form-group">
        <label class="control-label col-xs-2"></label>
        <div class="col-xs-10">
            <label class="control-label"><img src="<?php echo user_photo($record->avt); ?>" width="100" height="100"/></label>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-xs-2">Rating</label>
        <div class="col-xs-10">
            <label class="control-label"><?php echo '5'; ?></label>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-xs-2">Message</label>
        <div class="col-xs-10">
            <label class="control-label"><?php echo $record->quote_message; ?></label>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-xs-2">Price</label>
        <div class="col-xs-10">
            <label class="control-label"><?php echo $record->quote_price; ?></label>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-xs-2">Address</label>
        <div class="col-xs-10">
            <label class="control-label"><?php echo $record->quote_address; ?></label>
        </div>
    </div>
    
    <div class="form-group">
        <label class="control-label col-xs-2"></label>
        <div class="col-xs-10">
            <?php if($record->quote_status != QUOTE_ACCEPTED) { ?>
            <button class="btn btn-default" type="button" name="submit" id="btn_accept" value="1" data-toggle="modal" data-target="#privacypolicymodal">Accept</button>
            <?php } else { ?>
            <p>Quote has been accepted by you and payment has been sent to trainer.</p>
            <?php } ?>
            <a href="<?php echo site_url('member/request/'.md5($record->req_id)); ?>" class="btn btn-default">Back</a>
            <p>By accepting this quote you will pay a deposit of 10% to the trainers Paypal account </p>
        </div>
    </div>
    
    <div class="page-header"><h4>Training Cancellation</h4></div>
    <p>You must give cancellation notice to the trainer 24 hours prior to the training date to retain your training fees. If you cancel your training session you will not be refunded your deposit.</p>

    <div class="page-header"><h4>Training Rescheduling</h4></div>
    <p>You must give reschedule notice to the trainer 24 hours prior to the training date to retain your training fees. If you miss your training session you will not be refunded your deposit.</p>

</div>

<!--Help Modal-->
<div class="modal fade" id="privacypolicymodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <?php echo form_open('payment/checkout/'.$quote_code); ?>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Terms and Conditions</h4>
                <a href="#"><i class="fa fa-file-pdf-o"></i> Download Terms and Conditions as PDF document</a>
            </div>
            <div class="modal-body">
                <p>Terms and Conditions...</p>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-default">Accept</button>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>