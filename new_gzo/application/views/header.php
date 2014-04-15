<?=doctype('html5')."\n"; ?>
<html>
<head>
<?	
echo favicon('media/layout/favicon.ico','media/layout/favicon.png');
echo meta(array('keywords'=>config('tags'), 'description'=>config('description')));
echo css('print, screen', TRUE);
echo title(config('title').' | '.config('page_name'));
echo "\n";
?>
<link href='http://fonts.googleapis.com/css?family=Actor' rel='stylesheet' type='text/css'>
</head>
<body<?=variable($body_id).variable($body_class); ?>>
<div id ="bg_bottom">
	<div id="logo_lines">
		<div id="centered">
			<?=logo(array('alt' => 'GZO Oberflächentechnik GmbH - return to homepage', 'url' => 'home', 'file' => 'media/layout/gzo_logo.png'))."\n"; ?>
			<div id="top_menu">
				<?=variable($menu['lang']); ?>
				<?=!empty($meta_menu) ? $meta_menu : ''; ?>
			</div>
			<div id="header">
				<div class="overlay"></div>
				<?
				// default slideshow
				if($header == null)
				{
					// $slideshow = '/slideshow';
					$header = 'slideshow/';
				}
		
				if(isset($header) && substr($header,-1) == '/')
				{
					$CI = &get_instance();
					$CI->load->helper("file");
			
					$arr = get_filenames('./media/images/'.$header);
			
			
					foreach(get_filenames('./media/images/'.$header) as $file)
					{
						if(substr($file,-4) == '.jpg')
						{
							$array[] = $file;
						}
					}
			
					shuffle($array);

					echo '<div class="slideshow">';
						foreach($array as $id => $item)
						{
							echo '<img src="'.base_url(TRUE).'media/images/'.$header.$item.'" width="950" height="350" alt="r2 gmbh - '.$item.'">';
						}
					echo "</div>";
				}
				else
				{
					echo '<img src="'.base_url(TRUE).'media/images/'.$header.'" width="950" height="350" alt="r2 gmbh - '.$header.'">';
				}?>
			</div>
				<div id="container">	
					<div id="content_top">
					</div>
					<div id="content">
						<div id="content_container">
							<div id="sidebar">
									<?=variable($menu['main']); ?>
		 					</div>
							<div id="main_content">
