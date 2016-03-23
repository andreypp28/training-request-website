<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <!--<tr>
        <td style="color: #153643; font-family: Arial, sans-serif; font-size: 24px;">
            <b>Hi <?php //echo $user_full_name; ?>!</b>
        </td>
    </tr>-->
    <tr>
        <td style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
            <p>Thank you for registering on the <?php e($title) ?> web site</p>
            <p>Below you will find your activation code and a link that you can use to activate your membership for <?php e($title) ?>. Then, you will be able to log in and begin using the site.</p>
            <?php if(isset($temp_password)) { ?><p>Your temperary password: <?php echo $temp_password; ?></p><?php } ?>
            <p><?php echo $code ?></p>
            
            <p><a href="<?php echo $link; ?>">Click to activate your acount</a></p>
        </td>
    </tr>
</table>