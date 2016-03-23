<?php echo form_open($this->uri->uri_string(), array('class' => 'form-horizontal')); ?>
    <div class="form-group <?php echo form_error('price')?'has-error':''; ?>">
        <label class="control-label col-xs-3">Price</label>
        <div class="col-xs-9">
            <input type="text" name="price" class="form-control" id="price" value="<?php echo set_value('price'); ?>"/>
            <?php echo form_error('price'); ?>       
        </div>
    </div>
    
    <div class="form-group <?php echo form_error('address')?'has-error':''; ?>">
        <label class="control-label col-xs-3">Address</label>
        <div class="col-xs-9">
            <input type="text" name="address" class="form-control" id="address" value="<?php echo set_value('address'); ?>"/>
            <?php echo form_error('address'); ?>       
        </div>
    </div>
    
    <div class="form-group <?php echo form_error('message')?'has-error':''; ?>">
        <label class="control-label col-xs-3">Comment</label>
        <div class="col-xs-9">
            <textarea rows="5" name="message" class="form-control" id="message"><?php echo set_value('message'); ?></textarea>
            <?php echo form_error('message'); ?>       
        </div>
    </div>
    
    <div class="form-group">
        <label class="control-label col-xs-3"></label>
        <div class="col-xs-9">
            <button class="btn btn-default" type="submit" name="submit" value="1">Quote</button>
            <a href="<?php echo site_url('trainer/requests'); ?>" class="btn btn-default">Back</a>
            <br/><br/>
            <p>By submitting this quote you agree to pay PT on Demand a fee of 15% of the quote price if the quote is accepted by the member. This fee must be paid when the training session has been completed and you have been paid in full by the member.</p>
        </div>
    </div>
<?php echo form_close(); ?>