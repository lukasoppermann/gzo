<div class="news">
	<h4><?=$title?></h4>
	<p><?=$text?></p>
	<?$link_part = ($channel == 2) ? 'good-vibrations' : 'news'; ?>
	<span class="referral"><a href="<?=lang_url(TRUE).'home/'.$link_part.$permalink?>" class="link"><?=lang('read_more')?></a></span>
</div>