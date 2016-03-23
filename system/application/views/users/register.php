<div id="content">
    <div class="container content-wrapper">
        <?php echo Template::block('left_block'); ?>

        <div class="col-xs-12 col-md-4 col-sm-4">
            <?php echo form_open($this->uri->uri_string(), array('class' => "form-login", 'autocomplete' => 'off')); ?>
            <div class="properties row">
                <div class="page-header"><h3><i class="fa fa-facebook-official"></i>Sign up with Facebook</h3></div>

                <?php if(isset($fuser) && !empty($fuser)) { ?>
                
                <div class="form-group <?php echo form_error('email')?'has-error':''; ?>">
                    <label>Email (for signing in)</label>
                    <input type="text" id="email" name="email" class="form-control" value="<?php echo set_value('email', $fuser['email']);?>" placeholder="Email">
                    <?php echo form_error('email');?>
                </div>

                <div class="form-group <?php echo form_error('password')?'has-error':''; ?>">
                    <label>Password</label>
                    <input name="password" id="password" type="password" class="form-control" value="<?php echo set_value('password');?>" placeholder="Password" autofocus>
                    <?php echo form_error('password')?>
                </div>

                <div class="form-group <?php echo form_error('pass_confirm')?'has-error':''; ?>">
                    <label>Password Confirm</label>
                    <input name="pass_confirm" id="pass_confirm" type="password" class="form-control" value="<?php echo set_value('pass_confirm');?>" placeholder="Password Confirm">
                    <?php echo form_error('pass_confirm')?>
                </div>

                <div class="form-group <?php echo form_error('full_name')?'has-error':''; ?>">
                    <label>Full Name</label>
                    <input type="text" id="full_name" name="full_name" class="form-control" value="<?php echo set_value('full_name', $fuser['name']);?>" placeholder="Full Name">
                    <?php echo form_error('full_name');?>
                </div>

                <div class="form-group <?php echo form_error('accept')?'has-error':''; ?>">
                    <p><a href="#" title="Terms and conditions" data-toggle="modal" data-target="#pageModal"><i class="fa fa-file-text"></i> Terms and conditions</a></p>
                    <label>
                        <input type="checkbox" name="accept" id="accept" value="1" <?php echo $this->input->post('accept') ? "checked='checked'" : ''; ?>><span> I have read and accept the terms and conditions</span>
                    </label>
                    <?php echo form_error('accept')?>
                </div>
                <button class="btn btn-default" type="submit" name="submit" value="1">Register</button>
                <?php } else { ?>
                <a href="<?php echo $loginUrl; ?>">
                    <img src="<?php echo site_url('assets/images/facebook_login.png'); ?>" alt="Login with Facebook" title="Login with Facebook" border="0" align="middle"/>
                </a>
                
                <div class="page-header"><h3><i class="fa fa-envelope"></i> Sign up with Email</h3></div>

                <div class="form-group <?php echo form_error('email')?'has-error':''; ?>">
                    <label>Email (for signing in)</label>
                    <input type="text" id="email" name="email" class="form-control" value="<?php echo set_value('email');?>" placeholder="Email">
                    <?php echo form_error('email');?>
                </div>

                <div class="form-group <?php echo form_error('password')?'has-error':''; ?>">
                    <label>Password</label>
                    <input name="password" id="password" type="password" class="form-control" value="<?php echo set_value('password');?>" placeholder="Password">
                    <?php echo form_error('password')?>
                </div>

                <div class="form-group <?php echo form_error('pass_confirm')?'has-error':''; ?>">
                    <label>Password Confirm</label>
                    <input name="pass_confirm" id="pass_confirm" type="password" class="form-control" value="<?php echo set_value('pass_confirm');?>" placeholder="Password Confirm">
                    <?php echo form_error('pass_confirm')?>
                </div>

                <div class="form-group <?php echo form_error('full_name')?'has-error':''; ?>">
                    <label>Full Name</label>
                    <input type="text" id="full_name" name="full_name" class="form-control" value="<?php echo set_value('full_name');?>" placeholder="Full Name">
                    <?php echo form_error('full_name');?>
                </div>

                <div class="form-group <?php echo form_error('accept')?'has-error':''; ?>">
                    <p><a href="#" title="Terms and conditions" data-toggle="modal" data-target="#pageModal"><i class="fa fa-file-text"></i> Terms and conditions</a></p>
                    <label>
                        <input type="checkbox" name="accept" id="accept" value="1" <?php echo $this->input->post('accept') ? "checked='checked'" : ''; ?>><span> I have read and accept the terms and conditions</span></label>
                    <?php echo form_error('accept')?>
                </div>
                <button class="btn btn-default" type="submit" name="submit" value="1">Register</button>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<!--Help Modal-->
<div class="modal fade" id="pageModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>