<?php 

$this->load->view("blog/header"); 

?>

<div>
	<h4>Insertar entrada</h4>
</div>	

<div class="panel">

<?php echo form_open("blog/add_post"); ?>

	<div class="formgroup">
		<label for="title">Título</label>
		<input class="form-control" type="text" name="title" />
		<br/>
	</div>
	<div class="formgroup">
		<label for="contenido">Contenido</label>
		<textarea class="form-control" name="contenido" style="resize:vertical" rows="6"></textarea>		
		</br>
	</div>
	<input type="submit" class="button" value="Publicar" />
</form>
</div>

<?php

$this->load->view("blog/footer");

?>
	



