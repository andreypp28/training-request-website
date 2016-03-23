<?php
    $settings = $this->settings_model->find_all_by('module', 'core');
    $site_title = $settings['site.title'];
    $description= $settings['site.description'];
    $keywords   = $settings['site.keywords'];
    $author     = $settings['site.author'];
?>
<meta charset="utf-8"/>
<title><?php echo isset($page_title)?$page_title.'-':''; e($site_title); ?></title>
<meta name="description" content="<?php echo $description; ?>" />
<meta name="keywords" content="<?php echo $keywords; ?>" />
<meta name="author" content="<?php echo $author; ?>"/>
<meta property="og:image" content="<?php echo assets_path() ?>/images/logo.png" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<?php echo Assets::css(); ?>

<script type="text/javascript" src="<?php echo site_url('assets/plugins/jquery.min.js'); ?>"></script>
<script>var base_url = '<?php echo site_url(); ?>';</script>

<link rel="shortcut icon" href="<?php echo site_url('favicon.ico'); ?>"/>