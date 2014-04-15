<?=doctype('xhtml'); ?>
<head>	
	<?=meta_tag(); ?>
  	<?=favicon('media/layout/favicon.ico','media/layout/iphone_icon.png'); ?>
	<?=$this->stylesheet->output(FALSE); ?>	
	<?=title($title); ?> 
</head>
<body<?=$this->data->variable('unique_id') ?>>

<div id="centered">
	<div id="top_menu">
		<ul id="lang_menu">
			<?=alt_site_url('',false)?>
		</ul>
		<!-- <span class="seperator float-right">|</span> -->
		<?=$meta ?>
	</div>
	<div id="header">
			<?=logo('r2_logo.png','home')?>
		<img class="header_img" src="<?=base_url().$this->config->item('dir_images').(!empty($header_img) ? $header_img : $this->config->item('header_img') ); ?>" alt="image" />
		<div id="gallery-menu">
		<ul>
			<li class="active"></li>
			<li></li>			
		</ul>
		</div>
	</div>
		<div id="container">	
			<div id="content_top">
			</div>
			<div id="content">
				<div id="content_container">
					<div id="sidebar">
							<?=$navigation ?>
 					</div>
					<div id="main_content">
