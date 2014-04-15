<?=doctype('xhtml'); ?>
<head>	
	<?=meta_tag(); ?>
  	<?=favicon('media/layout/favicon.ico','media/layout/iphone_icon.png'); ?>
	<?=$this->stylesheet->output(FALSE); ?>	
	<?=title($title); ?> 
</head>
<body<?=$this->data->variable('unique_id') ?>>
<div id='bg_bottom'>
	<div id="logo_lines">
<div id="centered">
	<?=logo('gzo_logo.png','home')?>
	<div id="top_menu">
		<ul id="lang_menu">
			<?=alt_site_url('',false)?>
		</ul>
		<!-- <span class="seperator float-right">|</span> -->
		<?=$meta ?>
	</div>
	<div id="header">
		<img src="<?=base_url().$this->config->item('dir_images').(!empty($header_img) ? $header_img : $this->config->item('header_img') ); ?>" alt="image" />
	</div>
		<div id="container">	
			<div id="content_top">
			</div>
			<div id="content">
				<div id="content_container">
					<div id="sidebar">
						<div id="sidebar_inner">
							<?=$navigation ?>
							<?//=search() ?>	
						</div>
					</div>
					<div id="main_content">
