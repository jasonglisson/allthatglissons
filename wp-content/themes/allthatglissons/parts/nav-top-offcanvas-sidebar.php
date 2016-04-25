<div class="show-for-small-only">
		<nav class="tab-bar">
			<section class="middle tab-bar-section">
				<h1 class="title"><?php bloginfo('name'); ?></h1>
			</section>
			<section class="left-small">
				<a href="#" class="left-off-canvas-toggle menu-icon" ><span></span></a>
			</section>
			<section class="right-small">
				<a href="#" class="right-off-canvas-toggle menu-icon" ><span></span></a>
			</section>			
		</nav>
</div>
						
<aside class="left-off-canvas-menu show-for-small-only">
	<ul class="off-canvas-list">
		<li><label>Navigation</label></li>
			<?php joints_off_canvas(); ?>       
	</ul>
</aside>

<aside class="right-off-canvas-menu show-for-small-only">
	<ul class="off-canvas-list">
		<li><label>Sidebar</label></li>
			<?php get_sidebar('offcanvas'); ?>   
	</ul>
</aside>

			
<a class="exit-off-canvas"></a>