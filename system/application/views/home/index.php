<div id="content">

    <div class="container content-wrapper">
        <div class="col-xs-12 col-md-6 col-sm-6 left-content">
            <?php if(!isset($current_user->id) || $current_user->user_type == USER_MEMBER) { ?>
            <?php echo Template::block('request_form', 'home/request_form'); ?>
            <?php } ?>
        </div>
        
        <div class="col-xs-12 col-md-6 col-sm-6 sidebar">
            <div class="page-header"><h3>Hire Qualified Professionals</h3></div>
            <article>
                <h3>Welcome to PT on Demand, Australia’s #1 trusted PT session requestor site.</h3>
                <p>You can view all our listed trainers qualifications, specialties and experience with full reviews and ratings.</p>
                <p>Get started by <a href="<?php echo site_url('register_member'); ?>" title="register">registering</a> - all you need is a Paypal account or credit card- and then choose a day, time, location and type of session you want and wait for the trainers to respond to your request.</p>

                <p>Once you start getting quotes through, you can then choose your preferred trainer by viewing their profile and quoted price of the session that you requested, if the trainer fits the right criteria, click accept and your session is booked! Get rewarded for each completed session with not only health and fitness benefits, but you can acquire store points in which you can make purchases through the PT on Demand reward site to help you reach your goals!</p>
            </article>
            <div class="fb-like" data-href="<?php echo site_url(); ?>" data-layout="button_count" data-action="like" data-show-faces="true"></div>
        </div>
    </div>
    
</div>

<div class="container content-wrapper">

    <div class="col-xs-12 col-md-4 col-sm-4 left-content">
        <div class="page-header"><h3>Basic trainers</h3></div>

        <img src="<?php echo assets_path().'/images/fitness-levels.jpg'?>" class="featureImg">

        <p class="features">We have a range of trainers with various skills and qualifications. Our basic trainers have a minimum certificate III in gym instruction or group instruction. Most will either have their certificate IV in personal training or currently studying it.</p>
        <a href="<?php echo base_url('trainers'); ?>" class="btn">Find out more >></a>
    </div>

    <div class="col-xs-12 col-md-4 col-sm-4 left-content">
        <div class="page-header"><h3>Specialist trainers</h3></div>

        <img src="<?php echo assets_path().'/images/fitness-programs.jpg'?>" class="featureImg">

        <p class="features">Specialist trainers have a chosen field in which they have a minimum 10 years’ experience in, or are university qualified in a particular health science field.</p>
        <a href="<?php echo base_url('trainers') ?>" class="btn">Find out more >></a>
    </div>

    <div class="col-xs-12 col-md-4 col-sm-4 left-content">
        <div class="page-header"><h3>Become a PT on Demand trainer</h3></div>

        <img src="<?php echo assets_path().'/images/fitness-trainers.jpg'?>" class="featureImg">

        <p class="features">Want to be a trainer on PT on Demand? By <a href="/home/trainer" title="register">registering</a> you can expand your business by accessing job requests and the PT on Demand store.</p>
        <a href="<?php echo base_url('trainers') ?>" class="btn">Find out more >></a>
    </div>

</div>