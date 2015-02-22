<?php 

	$this->load->view('blog/header');

	if ($qry):
		foreach($qry as $post):
			?>
		<div class="post">
			<h2><?php echo $post->title ?></h2>
			<p> 
				<?php echo $post->content; ?>
			</p>
		</div>
<?php
		endforeach;
	else:
?>
		<h4>Aún no hay nada publicado.</h4>
<?php
	endif;

	$this->load->view('blog/footer');
?>