<?php
$obrazki = array();
if ($handle = opendir('../obrazki/ksiazki/' . $_GET['kid'])) {
	while (($obrazek = readdir($handle)) !== false) {
		if (is_file('../obrazki/ksiazki/' . $_GET['kid'] . '/' . $obrazek)) {
			$obrazki[] = $obrazek;
		}
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script>
		$(document).ready(function() {
			$('li').click(function() {
				$(this).next().css('display', 'none');

				$(this).animate({
					width: '0px'
				}, 1000, 'linear', function() {
					$(this).css('display', 'none');
//					$(this).css('z-index', $(this).css('z-index')-1)
					$(this).css('z-index', $('li').length-$(this).css('z-index'));
					$(this).next()
						.css('z-index', parseInt($(this).css('z-index'))+1)
						.css('display', 'block')
						.css('left', '476px')
						.css('width', '0px')
						.animate({
							left: '0',
							width: '+=476'
						}, 1000, 'linear')
				})

			});
		});
	</script>
	<style type="text/css">
		ul {
			list-style: none;
		}
		li {
			position: absolute;
			left: 476px;
			top: 0px;
		}
		li:first-child {
			/*left: 0px;*/
		}
		img {

		}

	</style>
</head>
<body>
<ul>
	<?php foreach($obrazki as $key=>$obrazek) {
		echo '<li style="z-index:'.(count($obrazki)-$key).';"><img src="../obrazki/ksiazki/'.$_GET['kid'].'/'.$obrazek.'" /></li>';
	}
	?>
</ul>
</body>
</html>
