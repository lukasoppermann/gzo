		</div>
		</div>
				</div>
		<div id="content_bottom">
			
		</div>
		
			<div id="footer">
			<?=$footer ?>
			<div class="footer_meta">
				<?=copyright('gzo','impressum'); ?> | <?=$this->auth->link() ?>
			</div>
		</div>
		</div>
</div>
	<?=$this->javascript->output(FALSE); ?>	
	<script type="text/javascript">

	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-7074034-16']);
	  _gaq.push(['_trackPageview']);

	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();

	</script>
</body>
</html>