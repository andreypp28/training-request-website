<nav class="navbar navbar-default" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo base_url() ?>"><img src="<?php echo assets_path() ?>/images/ptd-logo-100.png" width="100px" heigh="100px"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo base_url(); ?>" class="btn btn-default btn-list">Home</a></li>
                
                <?php if(!isset($current_user->id)) { ?>
                <li><a href="<?php echo base_url('register_member'); ?>" class="btn btn-default btn-list">Membership</a></li>
                <li><a href="<?php echo base_url('register_trainer'); ?>" class="btn btn-default btn-list">Trainers</a></li>    
                <?php } else { ?>
                    <?php if($current_user->user_type === USER_TRAINER) { ?>                            
                        <li><a href="<?php echo base_url('trainer'); ?>" class="btn btn-default btn-list">My Service</a></li>    
                        <li><a href="<?php echo base_url('trainer/certification'); ?>" class="btn btn-default btn-list">My Certification</a></li>    
                        <li><a href="<?php echo base_url('trainer/requests'); ?>" class="btn btn-default btn-list">Requests</a></li>    
                    <?php } else if($current_user->user_type === USER_MEMBER) { ?>                            
                        <li><a href="<?php echo base_url('member/requests'); ?>" class="btn btn-default btn-list">Requests</a></li>    
                    <?php } ?>
                <?php } ?>
            </ul>
            
            <?php if(isset($current_user->id)) { ?>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown btn-list">
                        <a href="#" class="dropdown-toggle btn-list" data-toggle="dropdown" role="button" aria-expanded="true">   
                        Hello <?php echo $current_user->full_name;?> <b class="caret"></b></a>
                        <ul class="dropdown-menu" role="menu">
                            <?php if($current_user->user_type === USER_ADMIN) { ?>                            
                            <li><a href="<?php echo admin_url('/') ?>">Admin Dashboard</a></li>
                            <?php } else { ?>
                            <li><a href="<?php echo site_url('profile') ?>">Profile</a></li>
                            <?php } ?>
                            
                            <li><a href="<?php echo site_url('logout') ?>">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            <?php } else { ?>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?php echo site_url('login'); ?>" class="btn btn-default btn-list">Login</a></li>
                </ul>
            <?php } ?>
        </div>
    </div>
</nav>