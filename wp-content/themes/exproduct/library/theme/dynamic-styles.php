 <?php //header("Content-type: text/css; charset: UTF-8");
$_REQUEST['pageID']= get_the_ID();

$exproduct_customize = get_option( 'exproduct_customize_options' );

if(get_post_meta($_REQUEST['pageID'], 'page_google_font', 1) != '' && substr_count(get_post_meta($_REQUEST['pageID'], 'page_google_font', 1), 'Select+Google+Font') == 0){
    $exproduct_font = preg_split('/\:/', get_post_meta($_REQUEST['pageID'], 'page_google_font', 1));
    $exproduct_font = str_replace('+', ' ', !isset($exproduct_font[0]) || $exproduct_font[0] == '' ? '' : str_replace('+', ' ', $exproduct_font[0]));
} else {
    $exproduct_font = exproduct_get_option('font', get_option('exproduct_default_font'));
}
$exproduct_font_weight = get_post_meta($_REQUEST['pageID'], 'page_font_weight', 1) != '' ? get_post_meta($_REQUEST['pageID'], 'page_font_weight', 1) : exproduct_get_option('font_weight', get_option('exproduct_default_font_weight'));
if(get_post_meta($_REQUEST['pageID'], 'page_google_font_title', 1) != '' && substr_count(get_post_meta($_REQUEST['pageID'], 'page_google_font_title', 1), 'Select+Google+Font') == 0){
    $exproduct_title = preg_split('/\:/', get_post_meta($_REQUEST['pageID'], 'page_google_font_title', 1));
    $exproduct_title = str_replace('+', ' ', !isset($exproduct_title[0]) || $exproduct_title[0] == '' ? '' : str_replace('+', ' ', $exproduct_title[0]));
} else {
    $exproduct_title = exproduct_get_option('font', get_option('exproduct_default_title'));
}
$exproduct_title_weight = get_post_meta($_REQUEST['pageID'], 'page_title_font_weight', 1) != '' ? get_post_meta($_REQUEST['pageID'], 'page_title_font_weight', 1) : exproduct_get_option('title_font_weight', get_option('exproduct_default_title_weight'));
$exproduct_subtitle = get_post_meta($_REQUEST['pageID'], 'page_subtitle_font', 1) != '' ? get_post_meta($_REQUEST['pageID'], 'page_subtitle_font', 1) : exproduct_get_option('subtitle_font', get_option('exproduct_default_subtitle'));
$exproduct_subtitle_weight = get_post_meta($_REQUEST['pageID'], 'page_subtitle_font_weight', 1) != '' ? get_post_meta($_REQUEST['pageID'], 'page_subtitle_font_weight', 1) : exproduct_get_option('subtitle_font_weight', get_option('exproduct_default_subtitle_weight'));

$exproduct_main_color = exproduct_get_option('style_settings_main_color', get_option('exproduct_default_main_color'));
$exproduct_gradient_color = exproduct_get_option('style_settings_gradient_color', get_option('exproduct_default_gradient_color'));
$exproduct_additional_color = get_post_meta($_REQUEST['pageID'], 'page_additional_color', 1) != '' ? get_post_meta($_REQUEST['pageID'], 'page_additional_color', 1) : exproduct_get_option('style_settings_additional_color', get_option('exproduct_default_additional_color'));
$page_color = get_post_meta($_REQUEST['pageID'], 'page_main_color', 1);
if($page_color){
	$exproduct_main_color = $page_color;
}

$page_layout = get_post_meta($_REQUEST['pageID'], 'page_layout', 1) != '' ? get_post_meta($_REQUEST['pageID'], 'page_layout', 1) : exproduct_get_option('style_general_settings_layout', 'normal');
$page_bg_image = get_post_meta($_REQUEST['pageID'], 'boxed_bg_image', 1) != '' ? get_post_meta($_REQUEST['pageID'], 'boxed_bg_image', 1) : exproduct_get_option('general_settings_bg_image', '');
$page_bg_color = get_post_meta($_REQUEST['pageID'], 'page_bg_color', 1) != '' ? get_post_meta($_REQUEST['pageID'], 'page_bg_color', 1) : exproduct_get_option('style_settings_bg_color', '');

$tab_bg_image_fixed = exproduct_get_option('tab_bg_image_fixed', '0');
$tab_bg_color = exproduct_get_option('tab_bg_color', get_option('exproduct_default_tab_bg_color')); //exproduct_hex2rgb(exproduct_get_option('tab_bg_color', '#000000'));
$tab_bg_color_gradient = exproduct_get_option('tab_bg_color_gradient', get_option('exproduct_default_tab_bg_color_gradient'));
$tab_gradient_direction = exproduct_get_option('tab_gradient_direction', get_option('exproduct_default_tab_gradient_direction'));
$tab_bg_opacity = exproduct_get_option('tab_bg_opacity', get_option('exproduct_default_tab_bg_opacity'));
$tab_padding_top = exproduct_get_option('tab_padding_top', get_option('exproduct_default_tab_padding_top'));
$tab_padding_bottom = exproduct_get_option('tab_padding_bottom', get_option('exproduct_default_tab_padding_bottom'));
$tab_margin_bottom = exproduct_get_option('tab_margin_bottom', '50');
$tab_border = exproduct_get_option('tab_border', get_option('exproduct_default_tab_border'));

?>


<?php
		/*   BOXED PAGE BACKGROUND   */
?>
<?php if($page_layout == 'boxed' && $page_bg_image) : ?>
html body{
	background-image: url(<?php echo esc_attr($page_bg_image)?>);
	background-attachment: fixed;
    padding: 100px 0;
    background-size: cover;
}
html .layout.layout-page-boxed {
	box-shadow: 0 0 40px 5px rgba(0,0,0,0.8);
}
<?php endif; ?>

<?php
/*   PAGE BACKGROUND   */
?>
<?php if($page_bg_color) : ?>
html body{
	background-color: <?php echo esc_attr($page_bg_color)?>;
	}
<?php endif; ?>




<?php
		/*   PAGE CUSTOM MAIN COLOR   */
?>

<?php if($page_color):?>


html .ui-title-block__brand{
background-color: <?php echo esc_attr($page_color)?>;
}


a,
.color-primary,
.text-primary,
.list-mark_mod-a li:before,
.list-mark_mod-c li:before,
.list-mark_mod-d li:before,
.blockquote_mod-a p,
.raiting,
.block-news__meta,
.payment-total__price,
.widget-title {color: <?php echo esc_attr($page_color)?>;}


.bg-primary,
.btn-effect:after,
.section-title,
.ui-title-underline_mod-a:after,
.tooltip-1 .tooltip-inner,
.list-mark_mod-g li:before,
.list-num_mod-b li:before,
.dropcap_mod-a:first-letter,
.blockquote_mod-c:before,
.btn-primary,
.pagination_mod-b > .active > a,
.pagination_mod-b > .active > span,
.pagination_mod-b a:hover,
.pagination_mod-b span:hover,
.pagination_mod-b a:focus,
.pagination_mod-b span:focus,
.forms__label-check_mod-a:after,
.forms__label-radio_mod-c:after,
.progress-bar-primary,
.list-advantages__link:hover .icon,
.form-cart__price-total,
.section-bg_primary:after,
.forms__label-check_mod-c:after,
.yamm .navbar-toggle .icon-bar {background-color: <?php echo esc_attr($page_color)?>;}


html .block-news:hover:after {background-color: <?php echo esc_attr($page_color)?>; opacity:0.9;}

.btn_mod-b,
.pagination_mod-b > .active > a,
.pagination_mod-b > .active > span,
.pagination_mod-b a:hover,
.pagination_mod-b span:hover,
.pagination_mod-b a:focus,
.pagination_mod-b span:focus,
.progress_border_primary {border-color: <?php echo esc_attr($page_color)?>;}

.tooltip-1.top .tooltip-arrow,
.tooltip-1.top-left .tooltip-arrow,
.tooltip-1.top-right .tooltip-arrow,
.yamm .navbar-collapse,
#page-preloader .spinner:before {border-top-color: <?php echo esc_attr($page_color)?>;}

.tooltip-1.right .tooltip-arrow {border-right-color: <?php echo esc_attr($page_color)?>;}

.tooltip-1.left .tooltip-arrow {border-left-color: <?php echo esc_attr($page_color)?>;}

.tooltip-1.bottom .tooltip-arrow,
.tooltip-1.bottom-left .tooltip-arrow,
.tooltip-1.bottom-right .tooltip-arrow,
.table-primary > thead > tr > th {border-bottom-color: <?php echo esc_attr($page_color)?>;}


html .isotope-item .slide-desc,
html .header-cart-count,
html .yp-demo-link {
    background: <?php echo esc_attr($page_color)?> !important;
}
html .wrap-features .wrap-feature-item .feature-item .number,
html .nav-tabs-vertical > li.active > a,
html .nav-tabs-vertical > li.active > a:focus,
html .nav-tabs-vertical > li.active > a:hover,
html .icon_box_wrap i:before,
html .steps i:before, html .steps i:after,
html .service-icon i{
	color: <?php echo esc_attr($page_color)?>;
}
html ::selection {
	background: <?php echo esc_attr($page_color)?>; /* Safari */
	color: #fff;
}
html ::-moz-selection {
	background: <?php echo esc_attr($page_color)?>; /* Firefox */
	color: #fff;
}

html [data-off-canvas] li a:hover {
    color:  <?php echo esc_attr($page_color)?>;
}
html body nav li > a:hover {
	color:  <?php echo esc_attr($page_color)?> !important;
}

.wrap-fixed-menu .menu-item .subtitle{
 color:  <?php echo esc_attr($page_color)?>;
}

html .vc_custom_1476544911048 a {
	background-color: <?php echo esc_attr($page_color)?> !important;
}
html .vc_custom_1476548097131 {
    background-color: <?php echo esc_attr($page_color)?> !important;
}




<?php endif?>




<?php
		/*   PAGE HEADER BACKGROUND   */
?>
<?php
if($tab_bg_color != '' && $tab_bg_color_gradient != ''){
	$gradient_direction = $tab_gradient_direction == '' ? 'to right' : $tab_gradient_direction;
	//$gradient_angle = $tab_bg_color_gradient == '' ? '90' : $tab_bg_color_gradient;
	$pix_directions_arr = array(
		'to right' => array('-webkit' => 'left', '-o-linear' => 'right', '-moz-linear' => 'right', 'linear' => 'to right',),
		'to left' => array('-webkit' => 'right', '-o-linear' => 'left', '-moz-linear' => 'left', 'linear' => 'to left',),
		'to bottom' => array('-webkit' => 'top', '-o-linear' => 'bottom', '-moz-linear' => 'bottom', 'linear' => 'to bottom',),
		'to top' => array('-webkit' => 'bottom', '-o-linear' => 'top', '-moz-linear' => 'top', 'linear' => 'to top',),
		'to bottom right' => array('-webkit' => 'left top', '-o-linear' => 'bottom right', '-moz-linear' => 'bottom right', 'linear' => 'to bottom right',),
		'to bottom left' => array('-webkit' => 'right top', '-o-linear' => 'bottom left', '-moz-linear' => 'bottom left', 'linear' => 'to bottom left',),
		'to top right' => array('-webkit' => 'left bottom', '-o-linear' => 'top right', '-moz-linear' => 'top right', 'linear' => 'to top right',),
		'to top left' => array('-webkit' => 'right bottom', '-o-linear' => 'top left', '-moz-linear' => 'top left', 'linear' => 'to top left',),
		//'angle' => array('-webkit' => $gradient_angle.'deg', '-o-linear' => $gradient_angle.'deg', '-moz-linear' => $gradient_angle.'deg', 'linear' => $gradient_angle.'deg',),
	);

	$pix_gradient = ', '.$tab_bg_color.','.$tab_bg_color_gradient;

	?>

	html .header-section span.vc_row-overlay{
		background: <?php echo esc_attr($tab_bg_color)?>; /* For browsers that do not support gradients */
		background: -webkit-linear-gradient(<?php echo esc_attr($pix_directions_arr[$gradient_direction]['-webkit'].$pix_gradient)?>); /*Safari 5.1-6*/
		background: -o-linear-gradient(<?php echo esc_attr($pix_directions_arr[$gradient_direction]['-o-linear'].$pix_gradient)?>); /*Opera 11.1-12*/
		background: -moz-linear-gradient(<?php echo esc_attr($pix_directions_arr[$gradient_direction]['-moz-linear'].$pix_gradient)?>); /*Fx 3.6-15*/
		background: linear-gradient(<?php echo esc_attr($pix_directions_arr[$gradient_direction]['linear'].$pix_gradient)?>); /*Standard*/
		opacity: <?php echo esc_attr($tab_bg_opacity)?>;
	}

	<?php
} else {
?>
html .header-section span.vc_row-overlay{
	background-color: <?php echo esc_attr($tab_bg_color); ?> !important;
	opacity: <?php echo esc_attr($tab_bg_opacity)?>;
}
<?php
}
?>

html .header-section{
	padding: <?php echo esc_attr($tab_padding_top)?>px 0 <?php echo esc_attr($tab_padding_bottom)?>px;
	margin-bottom: <?php echo esc_attr($tab_margin_bottom)?>px;
    border-bottom: <?php if($tab_border) : ?> 6px solid <?php echo esc_attr($exproduct_main_color) ?><?php else : ?> none <?php endif; ?>;
    <?php if($tab_bg_image_fixed) : ?>
    background-attachment: fixed;
    <?php endif; ?>
    background-size: cover;
    background-position: center center;
}





<?php
		/*   PAGE FONT   */
?>
<?php if( !empty($exproduct_font) || !empty($exproduct_font_weight) ) : ?>
html body, html p {
	<?php if( !empty($exproduct_font) ) : ?>font-family: '<?php echo esc_attr($exproduct_font)?>' !important; <?php endif; ?>
    <?php if( !empty($exproduct_font) ) : ?>font-weight: <?php echo esc_attr($exproduct_font_weight)?> !important; <?php endif; ?>
}
<?php endif; ?>





<?php
		/*   TITLE FONT   */
?>
<?php if( !empty($exproduct_title) || !empty($exproduct_title_weight) ) : ?>




.title_font_family , 
html .spl-title h2   , 
.exproduct-column-info h3 ,
html .btn-style-1  * ,
html .btn-style-1 span ,
.quote-form input[type=submit] ,
.section-title ,
.person-description h5 ,
.our-services  h4 , 
.pix-lastnews-light .news-item  h3 a  ,
.pix-lastnews-light .one-news div *,
.pix-lastnews-light .news-item h3 a ,
.testimonial-author h4 ,
.team .user-info h4 ,
.stats > div > div,
footer h2,
footer h3,
footer h4,
footer h5,
footer h6 ,
.title,
.feature-item h5 ,
.blog-description h4 ,
.blog-description h4 a ,
.work-heading  h3 ,
.work-body  h5 ,
.services h4 ,
.ui-title-page.pull-left h1, .ui-title-page.pull-left .subtitle ,
.work-body h3 ,
.reply-title ,
.woocommerce #reviews #comments h2 ,
.woocommerce .rtd div.product .product_title ,
aside .widget-title ,
.vc_icon_content p,
.comment-reply-title ,
.rtd h1:not([class]), .rtd h2:not([class]), .rtd h3:not([class]), .rtd h4:not([class]), .rtd h5:not([class]), .rtd h6:not([class]) ,
html .tagcloud a ,
.top-bar li ,
.btn_mod-c ,
.btn-title  ,
.list-advantages__inner ,
.list-description__title ,
.slider-reviews__name ,
.slider-reviews__time,
.block-news,
.form-cart-table > thead > tr > th ,
.main-slider__text ,
.form-cart__price-total,
.payment-info__title ,
.slider-2__title-inner ,
.slider-2__text ,
.ui-title-block ,
.ui-title-inner ,
.list-goods__title ,
.list-descriptions__name ,
.slider-reviews__title ,
.form-cart__title  ,
.form-cart__shipping-name ,
.block-contacts__title ,
.block-contacts__item ,
.payment-total__title ,
.payment-total__price ,
.post-footer ,
.reply a ,
.comment-meta a ,
.comment-info-content cite ,
.wrap-blog-post .wrap-image .post-date a ,
.wrap-blog-post .post-description .author a ,
  .post-date , .post-date a,
.post-name,
.post-name a ,
.wrap-blog-post .post-description .author,
.copyright 

{
	<?php if( !empty($exproduct_title) ) : ?>font-family: '<?php echo esc_attr($exproduct_title)?>' !important; <?php endif; ?>
}






<?php endif; ?>





<?php
		/*   SUBTITLE FONT   */
?>
<?php if( !empty($exproduct_subtitle) || !empty($exproduct_subtitle_weight) ) : ?>
html .spl-title h4 ,
.section-subtitle ,
.person-description .under-name ,
.testimonial-author small ,
.team .user-info small ,
.portfolio-single-section .work-heading .category a, .portfolio-single-section .work-heading .category ,
.ui-subtitle-block 
{
	<?php if( !empty($exproduct_subtitle) ) : ?>font-family: '<?php echo esc_attr($exproduct_subtitle)?>' !important; <?php endif; ?>
    <?php if( !empty($exproduct_subtitle_weight) ) : ?>font-weight: <?php echo esc_attr($exproduct_subtitle_weight)?> !important; <?php endif; ?>
}
<?php endif; ?>




<?php
		/*   MAIN COLOR   */
?>
<?php if($exproduct_main_color != ''):?>

a {
	color: <?php echo esc_attr($exproduct_main_color)?>;
}

html .header.header-color-black .navbar .navbar-nav > li > a , html  .submenu-controll {
    color: <?php echo esc_attr($exproduct_main_color)?>;
}

.btn-effect:after {
    background-color: <?php echo esc_attr($exproduct_main_color)?>;
}





.btn_mod-c {
    background:<?php echo esc_attr($exproduct_main_color)?>;
}

.btn_mod-c.btn-sm:hover {
    border-color: <?php echo esc_attr($exproduct_main_color)?>;
}

.btn_mod-c.btn_mod-orange:hover {
    background-color: <?php echo esc_attr($exproduct_main_color)?>;
}




.pagination ul li:hover a{
    background: <?php echo esc_attr($exproduct_main_color)?>;
    border-color:<?php echo esc_attr($exproduct_main_color)?>;
}

.list-advantages__item:hover .icon {
    background-color: <?php echo esc_attr($exproduct_main_color)?>;
}

.form-cart__price-total {
 background-color: <?php echo esc_attr($exproduct_main_color)?>;
}

.section-title:before , .breadcrumb-container, .section-title  {
    background: <?php echo esc_attr($exproduct_main_color)?>;

}


html .pagination ul li span.current {
    background: <?php echo esc_attr($exproduct_main_color)?>;
    border-color: <?php echo esc_attr($exproduct_main_color)?>;
}



html .nav > li > a:hover, html .nav > li > a:focus , html .nav > li > a:visited, html .nav > li > a:active {
	color: <?php echo esc_attr($exproduct_main_color)?>;
}
html .pre-footer {
	background: none repeat scroll 0 0 <?php echo esc_attr($exproduct_main_color)?>;
}
html .after-heading-info, .highlight_text {
	color: <?php echo esc_attr($exproduct_main_color)?>;
}

html .full-title.banner-full-width {
	background-color: <?php echo esc_attr($exproduct_main_color)?>
}
html .featured-item-simple-icon::after {
	border-color: <?php echo esc_attr($exproduct_main_color)?>;
}
html .top-cart i, html .top-cart .icon-basket {
	color: <?php echo esc_attr($exproduct_main_color)?>;
}
html .dropdown-menu > li > a:hover, html .dropdown-menu > li > a:focus {
	background-color: <?php echo esc_attr($exproduct_main_color)?>
}
html .title-action a {
	background: none repeat scroll 0 0 <?php echo esc_attr($exproduct_main_color)?> !important;
	border-color: <?php echo esc_attr($exproduct_main_color)?> !important;
}
html .full-title-name .btn {
	background: none repeat scroll 0 0 <?php echo esc_attr($exproduct_main_color)?>!important;
	border-color: <?php echo esc_attr($exproduct_main_color)?> !important;
}
html .marked_list1 li:before {
	color: <?php echo esc_attr($exproduct_main_color)?>;
}
html .woocommerce #respond input#submit, html .woocommerce a.button, html .woocommerce button.button, html .woocommerce input.button {
	background-color: <?php echo esc_attr($exproduct_main_color)?> !important;
	border-color: <?php echo esc_attr($exproduct_main_color)?> !important;
}
html .product-info .nav-tabs > li.active a, html .product-info .nav-tabs > li:hover a {
	background: <?php echo esc_attr($exproduct_main_color)?> !important;
	color: #fff !important;
	outline: none !important;
	border: 1px solid <?php echo esc_attr($exproduct_main_color)?>;
}
html .product-info .nav-tabs {
	border-top-color: <?php echo esc_attr($exproduct_main_color)?>;
}
html .nav > li > a:hover, html .nav > li > a:focus {
	color: <?php echo esc_attr($exproduct_main_color)?>;
}
html .label-sale, .label-hot, html .label-not-available, html .label-best {
	color: #526aff;
}

html a {
  color: <?php echo esc_attr($exproduct_main_color)?>;
}

.box-date-post .date-2 {
   color: <?php echo esc_attr($exproduct_main_color)?>;
}



html .sep-element {
    border-bottom: 1px solid <?php echo esc_attr($exproduct_main_color)?>;
}
html .sep-element:after {
    border: 1px solid <?php echo esc_attr($exproduct_main_color)?>;
}
html .under-name:after {
    border-top: 1px solid <?php echo esc_attr($exproduct_main_color)?>;
}

html .blockquote-box .wrap-author .author a,
html .panel-alt-two .panel-heading.active a,
html .panel-alt-two .panel-heading .panel-title a:hover {
    color: <?php echo esc_attr($exproduct_main_color)?>;
}
.panel-alt-two .panel-heading.active .accordion-icon .stacked-icon {
    background: <?php echo esc_attr($exproduct_main_color)?>;
}

.btn.btn-sm.btn-success:before {
	background: <?php echo esc_attr($exproduct_main_color)?> !important;
}
.big-hr.color-1, .one-news > div > div, .btn.btn-sm.btn-success:before, nav.pagination a.active, ul.styled > li.active, ul.styled > li.current-cat, .nav-tabs > li.active > a, .nav-tabs > li.active > a:focus, .nav-tabs > li.active > a:hover, .info-texts:before, ul.blog-cats > li:before, ul.blog-cats li > ul, .btn.btn-success, .big-hr.color-1, .one-news > div > div, .btn.btn-sm.btn-success:before, .our-services div > a:hover:after, nav.pagination a.active, ul.styled > li.active, ul.styled > li.current-cat, .nav-tabs > li.active > a, .nav-tabs > li.active > a:focus, .nav-tabs > li.active > a:hover, .info-texts:before, ul.blog-cats > li:before, ul.blog-cats li > ul, .title-option, .demo_changer .demo-icon, .vc_btn3.vc_btn3-color-green, .vc_btn3.vc_btn3-color-green.vc_btn3-style-flat, .pagination>li.current a, .pagination>li>a:focus, .pagination>li>a:hover, .pagination>li>span:focus, .pagination>li>span:hover {
    background: <?php echo esc_attr($exproduct_main_color)?> !important;
}
 footer .copy a, .twitter-feeds div span, .recent-posts div a:hover {
    color: <?php echo esc_attr($exproduct_main_color)?> !important;
}
 .btn.btn-sm.btn-default:hover, .comments > div > a.reply:hover, nav.pagination a:hover,  ul.blog-cats li:hover, .our-services div > a:hover > span, .testimonial-content span {
	border-color: <?php echo esc_attr($exproduct_main_color)?> !important;
}
footer .color-part, .btn.btn-danger, .btn.btn-danger:hover, .btn.btn-danger, .btn.btn-danger:hover , .btn.btn-sm.btn-default:before, .big-hr.color-2, .our-services.styled div > a:hover:after, .adress-details > div > span:after, .comments > div > a.reply:hover, .comments > div > a.reply:after, nav.pagination a:hover,  ul.blog-cats > li:hover, #menu-open, .main-menu section nav, .our-services div > a:hover > span, .testimonial-content span, .info-texts:after, .post-info:after, .customBgColor ,html  .big-hr , html .quote-form input[type=submit]  {
	background: <?php echo esc_attr($exproduct_main_color)?> !important;
}
.team > div > div span {
	background-color: rgba(<?php echo exproduct_hex2rgb($exproduct_main_color) ?>, 0.75);
}
.one-news > div > div small.news-author, .two-news > div div:last-child small.news-author, #partners a {
	border-right-color: <?php echo esc_attr($exproduct_main_color)?>  ;
}

#body .vc_custom_1485881156746 .vc_row-overlay , .contact-item .striped-icon-xlarge:after , .contact-item .striped-icon-xlarge{

  background: <?php echo esc_attr($exproduct_main_color)?> !important;

}

.reply a:hover{
    background: <?php echo esc_attr($exproduct_main_color)?> !important;
    border-color: <?php echo esc_attr($exproduct_main_color)?> !important ;
}

.read-all-news , .blog-post .post-image .post-date , .bx-wrapper .bx-pager.bx-default-pager a:hover, .bx-wrapper .bx-pager.bx-default-pager a.active{
background: <?php echo esc_attr($exproduct_main_color)?> !important;
}



.reply a:after   .comment-info-content cite{
  color: <?php echo esc_attr($exproduct_main_color)?> !important;
}


html .post-body > h4:after , .comment-reply-title:after{
 border-color: <?php echo esc_attr($exproduct_main_color)?> !important;
}


.wrap-blog-post .wrap-image .post-date:before{
    background: <?php echo esc_attr($exproduct_main_color)?> !important;
}

html .tagcloud a:hover{
    background: <?php echo esc_attr($exproduct_main_color)?> !important;
}

.pricing-switcher .btn.active{
  background: <?php echo esc_attr($exproduct_main_color)?> !important;
  border-color: <?php echo esc_attr($exproduct_main_color)?> !important;
}


html .plan-item .item-body .price-type:after{
  background-color: <?php echo esc_attr($exproduct_main_color)?> !important;
}

.sidebar-services li a:hover, .sidebar-services .active a, .sidebar-services .current-cat a{
   background-color: <?php echo esc_attr($exproduct_main_color)?> !important;
}

html .plan-item .item-heading{
  background: <?php echo esc_attr($exproduct_main_color)?> !important;
}

.woocommerce span.onsale{
   background: <?php echo esc_attr($exproduct_main_color)?> !important;
}


.woocommerce div.product p.price, .woocommerce div.product span.price{
  color: <?php echo esc_attr($exproduct_main_color)?> ;
}

.global-customizer-color  .vc_custom_1470751506749 .vc_row-overlay , 
.global-customizer-color   .vc_custom_1485533138306  .vc_row-overlay ,
.global-customizer-color  .vc_custom_1485354779633 .vc_row-overlay,
.global-customizer-color  .vc_custom_1470759951360 .vc_row-overlay ,
.global-customizer-color  .vc_row-overlay , 
.global-customizer-color .vc_custom_1485532885736 .vc_column-inner  .vc_row-overlay,
.global-customizer-color  .vc_custom_1485961142426 .vc_column-inner  .vc_row-overlay ,
.global-customizer-color  .vc_custom_1485941570033 .vc_column-inner  .vc_row-overlay {
background:  rgba(<?php echo exproduct_hex2rgb($exproduct_main_color) ?>, 0.75) !important;
}


.global-customizer-color .vc_custom_1485880836789 .vc_row-overlay{
background:  rgba(<?php echo exproduct_hex2rgb($exproduct_main_color) ?>, 0.95) !important;
}

.global-customizer-color .vc_custom_1470750373285{
color:<?php echo esc_attr($exproduct_main_color)?> !important;
}







.global-customizer-color .service-item.border-bottom , .global-customizer-color .service-features-section:before {
    border-color: <?php echo esc_attr($exproduct_main_color)?> !important;
}

.text-white .service-item .item-body, .text-white .service-item .item-body p , .service-item .item-heading .title:after{
color:#fff !important;
}

.service-item .item-heading .title:after{
 border-color:#fff !important;
}


.feature-item p {
   color:#fff !important;
}

.feature-item.feature-divider .feature-divider-item:before  , .feature-item.feature-divider .feature-divider-item:after , .feature-item.feature-divider .feature-divider-item{
    background: #fff !important;
}

.vc_custom_1485941788017 .section-heading .section-title , .vc_custom_1485941788017 .section-heading .section-subtitle{
   color:#fff !important;
}

html .global-customizer-color .vc_custom_1485532885736 .vc_row-overlay , html .global-customizer-color .vc_custom_1485961142426 .vc_row-overlay  ,  html .global-customizer-color .vc_custom_1485941570033 .vc_row-overlay{
    background-color: rgba(10,10,10,0.8) !important;
}


html .header-color-black *, html  .header.header-color-black .navbar .navbar-nav > li > a{
  color: <?php echo esc_attr($exproduct_main_color)?> ;
}


html .header.header-color-black .toggle-menu-button .toggle-menu-button-icon span {
    background:<?php echo esc_attr($exproduct_main_color)?> ;
}


<?php endif?>
  




<?php
		/*   ADDITIONAL COLOR   */
?>
<?php if($exproduct_additional_color != ''):?>


.color-second,
.color-info,
.text-info,
.list-mark_mod-b li:hover:before,
.list-mark_mod-c li:hover:before,
.list-mark_mod-e li:before,
.list-mark_mod-f li:before,
.list-num_mod-a li:before,
.blockquote_mod-b cite,
.pagination_mod-a > .active > a,
.pagination_mod-a > .active > span,
.pagination_mod-a a:hover,
.pagination_mod-a span:hover,
.pagination_mod-a a:focus,
.pagination_mod-a span:focus {color: <?php echo esc_attr($exproduct_additional_color)?> ;}


.header-main__buy{
  background: <?php echo esc_attr($exproduct_additional_color)?> !important;
}


.page-template-page-home .current-menu-parent.current_page_item > a:before, .current_page_item > a:before {
    border-color: <?php echo esc_attr($exproduct_additional_color)?> !important;
}



.bg-info,
.btn-info,
.tooltip-2 .tooltip-inner,
.dropcap_mod-b:first-letter,
.btn-effect.btn-primary:after,
.forms__label-check_mod-b:after,
.forms__label-radio_mod-a:before,
.forms__label-radio_mod-b:after,
.progress-bar-info,
.owl-theme .owl-controls .owl-page.active span,
.owl-theme .owl-controls.clickable .owl-page:hover span , .btn_orange {background-color: <?php echo esc_attr($exproduct_additional_color)?> ;}

.progress_border_info,
.forms__radio:checked + .form-cart__label-row,
.ui-form_mod-a .ui-form__btn {border-color: <?php echo esc_attr($exproduct_additional_color)?> ;}

.ui-form__btn.btn-effect:after{
    background: #<?php echo esc_attr($exproduct_additional_color)?> B049;
}

.tooltip-2.top .tooltip-arrow,
.tooltip-2.top-left .tooltip-arrow,
.tooltip-2.top-right .tooltip-arrow,
#page-preloader .spinner:after {border-top-color: <?php echo esc_attr($exproduct_additional_color)?> ;}


.tooltip-2.right .tooltip-arrow {border-right-color: <?php echo esc_attr($exproduct_additional_color)?> ;}

.tooltip-2.left .tooltip-arrow,
.blockquote_mod-b {border-left-color: <?php echo esc_attr($exproduct_additional_color)?> ;}

.tooltip-2.bottom .tooltip-arrow,
.tooltip-2.bottom-left .tooltip-arrow,
.tooltip-2.bottom-right .tooltip-arrow,
.yamm .nav > li.active > a,
.yamm .nav > li > a:hover , .yamm .nav > li:hover > a,
.table-info > thead > tr > th {border-bottom-color: <?php echo esc_attr($exproduct_additional_color)?> ;}



.list-advantages__item.active .icon {
    background-color:<?php echo esc_attr($exproduct_additional_color)?>;
}


html .our-services div > a:hover:after{
background: <?php echo esc_attr($exproduct_additional_color)?> !important;
}
html .header-cart-count , .vc_custom_1485889021151 .vc_btn3 {
background: <?php echo esc_attr($exproduct_additional_color)?> !important;
}

.wrap-services-tabs .wrap-tabs .nav.nav-tabs li.active a span, .wrap-services-tabs .wrap-tabs .nav.nav-tabs li:hover a span , ul.list.list-round-check.orange-list li:before, ol.list.list-round-check.orange-list li:before , html  .folio-isotop-filter ul > li a.selected{
    color: <?php echo esc_attr($exproduct_additional_color)?> !important;
}

.log-list-container  .list-blog-item  .tags, .log-list-container  .list-blog-item  .tags *, .log-list-container  .list-blog-item  .tags a, .list-blog-item .tags, html  .list-blog-item .tags span, .list-blog-item  .tags a{
 color: <?php echo esc_attr($exproduct_additional_color)?> !important;
}


html .plan-item .item-heading.orange-heading:after{
background: <?php echo esc_attr($exproduct_additional_color)?>;
}

.portfolio-item .portfolio-image .portfolio-item-body .name:before , .nav.nav-tabs.theme-tab li:hover a, .nav.nav-tabs.theme-tab li.active a , .loader05 , .tab-pane  .wpcf7 input[type=submit]  {
    border-color:<?php echo esc_attr($exproduct_additional_color)?> !important;
}


#slide-54-layer-7{
background: <?php echo esc_attr($exproduct_additional_color)?> !important;
}

html .owl-dot.active, html .owl-dots .owl-dot:hover{
    border-color: <?php echo esc_attr($exproduct_additional_color)?> !important;
    background: <?php echo esc_attr($exproduct_additional_color)?> !important;
}


 .section-purchase .logo-block{
 border-color:<?php echo esc_attr($exproduct_additional_color)?> !important;
}


.feature-item h5 span {
    color:<?php echo esc_attr($exproduct_additional_color)?> !important;
}


.skill-item .skill-line{
   background: <?php echo esc_attr($exproduct_additional_color)?> !important;
}


html .sidebar-services .current-cat:after, .sidebar-services .active:after{
  background: <?php echo esc_attr($exproduct_additional_color)?> !important;
}


.work-body   .btn{
    background: <?php echo esc_attr($exproduct_additional_color)?> !important;
    border-color: <?php echo esc_attr($exproduct_additional_color)?> !important;
}


.type-post.sticky:after , .post_read_more{
   background: <?php echo esc_attr($exproduct_additional_color)?> !important;
}





input[type="submit"]{
  background: <?php echo esc_attr($exproduct_additional_color)?> !important;
}

input[type=submit], button[type=submit] {
     background: <?php echo esc_attr($exproduct_additional_color)?>;
}

<?php endif?>
  




strong, b {
    font-weight: bold;
}





 <?php if(isset($exproduct_customize['exproduct_custom_css'])){?>
     <?php if($exproduct_customize['exproduct_custom_css']):?>
         <?php echo esc_attr($exproduct_customize['exproduct_custom_css']);?>
     <?php endif?>
 <?php } ?>