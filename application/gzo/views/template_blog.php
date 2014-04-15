<div class="blog_teaser">
	<div class="blog_text">
		<h3><?php echo $title ?></h3>
		<div class="excerpt"><?php echo $excerpt ?></div>
		<?

			if(base_url_lang().$permalink == current_url()){
				echo $content;
				echo "<span class='author'>".$author."</span>";
			}
			else
			{
				echo '<span class="referral"><a class="link" href="'.base_url_lang().$permalink.'">read more</a></span>';
			}
		?>
	</div>
	<div class="blog_img">
			<?=!empty($blog_img) ? '<img src="'.base_url().$this->config->item('dir_images').$blog_img.'.jpg" alt="'.$title.'" />' : '' ; ''?>
	</div>
</div>
