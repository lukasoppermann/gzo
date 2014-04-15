<div class="news">
<h4><?php echo $title ?></h4>
<div><?php echo $excerpt ?></div>
<?
	if(!empty($permalink)){
		if(base_url_lang().$permalink == current_url()){
			echo $content;
			echo "<span class='author'>".$author."</span>";
		}
		else
		{
			echo '<span class="referral"><a class="link" href="'.base_url_lang().$permalink.'">read more</a></span>';
		}
	}
?>
</div>
