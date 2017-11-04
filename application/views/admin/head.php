<meta charset="UTF-8">
<meta name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">

<meta name="robots" content="noindex, nofollow" />
<link rel="shortcut icon" href="<?php echo public_url(); ?>/images/icon.png" type="image/x-icon"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/admin/crown/css/main.css');?>" />
<link rel="stylesheet" type="text/css" href="<?php echo public_url('admin/css'); ?>/css.css" media="screen" />
<!--<link rel="stylesheet" type="text/css" href="--><?php //echo public_url('css'); ?><!--/bootstrap.min.css" media="screen" />-->

<style>
    .tooltip {
        position: relative;
        display: inline-block;

    }

    .tooltip .tooltiptext {
        visibility: hidden;
        width: 120px;
        background-color: black;
        color: #fff;
        text-align: center;
        border-radius: 6px;
        padding: 5px 0;
        position: absolute;
        z-index: 1;
        bottom: 100%;
        left: 50%;
        margin-left: -60px;

        /* Fade in tooltip - takes 1 second to go from 0% to 100% opac: */
        opacity: 0;
        transition: opacity 1s;
    }

    .tooltip:hover .tooltiptext {
        visibility: visible;
        opacity: 1;
    }
</style>

<script type="text/javascript">
    var admin_url 	= '';
    var base_url 	= '';
    var public_url 	= '';
</script>

<script type="text/javascript" src="<?php echo public_url(); ?>js/jquery.min.js"></script>

<script type="text/javascript" src="<?php echo public_url('admin/crown'); ?>/js/plugins/spinner/jquery.mousewheel.js"></script>

<script type="text/javascript" src="<?php echo public_url('admin/crown'); ?>/js/plugins/forms/uniform.js"></script>
<script type="text/javascript" src="<?php echo public_url('admin/crown'); ?>/js/plugins/forms/jquery.tagsinput.min.js"></script>
<script type="text/javascript" src="<?php echo public_url('admin/crown'); ?>/js/plugins/forms/autogrowtextarea.js"></script>
<script type="text/javascript" src="<?php echo public_url('admin/crown'); ?>/js/plugins/forms/jquery.maskedinput.min.js"></script>
<script type="text/javascript" src="<?php echo public_url('admin/crown'); ?>/js/plugins/forms/jquery.inputlimiter.min.js"></script>

<script type="text/javascript" src="<?php echo public_url('admin/crown'); ?>/js/plugins/tables/datatable.js"></script>
<script type="text/javascript" src="<?php echo public_url('admin/crown'); ?>/js/plugins/tables/tablesort.min.js"></script>
<script type="text/javascript" src="<?php echo public_url('admin/crown'); ?>/js/plugins/tables/resizable.min.js"></script>

<script type="text/javascript" src="<?php echo public_url('admin/crown'); ?>/js/plugins/ui/jquery.tipsy.js"></script>
<script type="text/javascript" src="<?php echo public_url('admin/crown'); ?>/js/plugins/ui/jquery.collapsible.min.js"></script>
<script type="text/javascript" src="<?php echo public_url('admin/crown'); ?>/js/plugins/ui/jquery.progress.js"></script>
<script type="text/javascript" src="<?php echo public_url('admin/crown'); ?>/js/plugins/ui/jquery.timeentry.min.js"></script>
<script type="text/javascript" src="<?php echo public_url('admin/crown'); ?>/js/plugins/ui/jquery.colorpicker.js"></script>
<script type="text/javascript" src="<?php echo public_url('admin/crown'); ?>/js/plugins/ui/jquery.jgrowl.js"></script>
<script type="text/javascript" src="<?php echo public_url('admin/crown'); ?>/js/plugins/ui/jquery.breadcrumbs.js"></script>
<script type="text/javascript" src="<?php echo public_url('admin/crown'); ?>/js/plugins/ui/jquery.sourcerer.js"></script>

<script type="text/javascript" src="<?php echo public_url('admin/crown'); ?>/js/custom.js"></script>


<script type="text/javascript" src="<?php echo public_url(); ?>js/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo public_url(); ?>js/chosen/chosen.jquery.min.js"></script>
<script type="text/javascript" src="<?php echo public_url(); ?>js/scrollTo/jquery.scrollTo.js"></script>
<script type="text/javascript" src="<?php echo public_url(); ?>js/number/jquery.number.min.js"></script>
<script type="text/javascript" src="<?php echo public_url(); ?>js/formatCurrency/jquery.formatCurrency-1.4.0.min.js"></script>
<script type="text/javascript" src="<?php echo public_url(); ?>js/zclip/jquery.zclip.js"></script>

<script type="text/javascript" src="<?php echo public_url(); ?>js/colorbox/jquery.colorbox.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo public_url(); ?>js/colorbox/colorbox.css" media="screen" />

<script type="text/javascript" src="<?php echo public_url(); ?>js/custom_admin.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo public_url(); ?>js/bootstrap.min.js" type="text/javascript"></script>