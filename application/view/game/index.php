<div class="container">

   <h1> Select Game </h1>
   
   <?php foreach ($this->game as $game) {
   		?> <div class="divider"> <?php
		if (isset($game->id)) $id = $game->id;
		if (isset($game->name)) $name = $game->name;
		echo '<a href="' . URL . 'game/play?id=' . $id . '"> <img src="public/img/'. $name .'" alt="Foto" height="150px" width="150px"> </a>  <br>';
   		?> </div> <?php
   } ?> 

</div>