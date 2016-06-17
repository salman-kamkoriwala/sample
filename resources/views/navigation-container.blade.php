<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
		<ul class="nav nav-pills pull-right" role="tablist">
			<!-- @include('navigation') -->
			@include(config('laravel-menu.views.bootstrap-items'), array('items'
			=> $MyNavBar->roots()))
		</ul>

	</div>
</nav>