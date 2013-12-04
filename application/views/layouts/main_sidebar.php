<div class="well sidebar-nav">
	<ul class="nav nav-list">
	<?php 
		$menus = array(
			'Master' => array(
                'users' => 'The Users',
                'groups' => 'The Groups'
			)			
		);
		foreach ($menus as $nav => $menu) {
			echo "<li class='nav-header'>{$nav}</li>";
	
			foreach ($menu as $link => $label) {
				$active = $link == $this->uri->segment(1) ? "class='active'" : "";				
				echo "<li {$active}>", anchor($link, $label), "</li>";	
			}						
		}
	?>
	</ul>
</div><!--/.well -->
