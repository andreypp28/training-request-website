<?php 
    $css = array(
        'plugins/bootstrap/css/bootstrap.min.css',    
        'plugins/font-awesome/css/font-awesome.css',
        'custom-control.css',
        'custom.css',
        'fonts.css',
        'plugins/datepicker/css/bootstrap-datepicker3.min.css',
    );
    Assets::add_css($css);
    
    $js = array(
        'plugins/bootstrap/js/bootstrap.min.js',
        'plugins/jquery_validation/jquery.validate.min.js',
        'plugins/jquery_validation/additional-methods.min.js',
        'plugins/handlebars-v1.3.0.js',
        //'plugins/bootstrap-datepicker.js',
        'plugins/datepicker/js/bootstrap-datepicker.min.js',
        'common.js',
    );
    Assets::add_js($js);
?>

<!doctype html>
<html>
<head>
    <?php echo theme_view('parts/_head'); ?>
</head>

<body class="<?php echo isset($page_class)?$page_class:''; ?>">  
