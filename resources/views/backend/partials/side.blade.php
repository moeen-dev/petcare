<div class="main-sidebar sidebar-style-2">
	<aside id="sidebar-wrapper">
		<div class="sidebar-brand mt-3">
			<a href="{{ route('dashboard')}}"><img src="{{ url('assets/frontend/img/logo.png')}}" style="width: 150px; height: auto;" alt="animal-life-style"></a>
		</div>
		<div class="sidebar-brand sidebar-brand-sm">
			<a href="{{ route('dashboard')}}"><img src="{{ url('assets/frontend/img/icon.png')}}" style="width: 50px; height: auto;" alt="animal-life-style"></a>
		</div>
		<ul class="sidebar-menu">
			<li class="{{ Route::is('dashboard') ? 'active' : ''}}"><a class="nav-link" href="{{ route('dashboard')}}"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a></li>
			
			<li class="menu-header">Create Banner</li>
			<li class="dropdown {{ Route::is('banner.*') ? 'active' : '' }}">
				<a href="#" class="nav-link has-dropdown"><i class="fas fa-images"></i><span>Banner</span></a>
				<ul class="dropdown-menu">
					<li class="{{ Route::is('banner.index') ? 'active' : ''}}"><a class="nav-link" href="{{ route('banner.index')}}">Banner List</a></li>
					<li class="{{ Route::is('banner.create') ? 'active' : ''}}"><a class="nav-link" href="{{ route('banner.create')}}">Create Banner</a></li>
				</ul>
			</li>
			<li class="menu-header">About</li>
			<li class="{{ Route::is('about.*') ? 'active' : ''}}"><a class="nav-link" href="{{ route('about.index')}}"><i class="fas fa-info"></i> <span>About</span></a></li>

			<li class="menu-header">Create Team Member</li>
			<li class="dropdown {{ Route::is('team-member.*') ? 'active' : '' }}">
				<a href="#" class="nav-link has-dropdown"><i class="fas fa-user"></i><span>Team Member</span></a>
				<ul class="dropdown-menu">
					<li class="{{ Route::is('team-member.index') ? 'active' : ''}}"><a class="nav-link" href="{{ route('team-member.index')}}">Team Member List</a></li>
					<li class="{{ Route::is('team-member.create') ? 'active' : ''}}"><a class="nav-link" href="{{ route('team-member.create')}}">Create Team Member</a></li>
				</ul>
			</li>  

			<li class="menu-header">Create FeedBack</li>
			<li class="dropdown {{ Route::is('feedback.*') ? 'active' : '' }}">
				<a href="#" class="nav-link has-dropdown"><i class="fas fa-comments"></i><span>FeedBack</span></a>
				<ul class="dropdown-menu">
					<li class="{{ Route::is('feedback.index') ? 'active' : ''}}"><a class="nav-link" href="{{ route('feedback.index')}}">Feedback</a></li>
					<li class="{{ Route::is('feedback.create') ? 'active' : ''}}"><a class="nav-link" href="{{ route('feedback.create')}}">Create Feedback</a></li>
				</ul>
			</li>     

			<li class="menu-header">Create Category</li>
			<li class="dropdown {{ Route::is('category.*') ? 'active' : '' }}">
				<a href="#" class="nav-link has-dropdown"><i class="fas fa-layer-group"></i><span>Blog Category</span></a>
				<ul class="dropdown-menu">
					<li class="{{ Route::is('category.index') ? 'active' : ''}}"><a class="nav-link" href="{{ route('category.index')}}">View Category</a></li>
					<li class="{{ Route::is('category.create') ? 'active' : ''}}"><a class="nav-link" href="{{ route('category.create')}}">Create Category</a></li>
				</ul>
			</li>

			<li class="menu-header">Create Blog</li>
			<li class="dropdown {{ Route::is('blog.*') ? 'active' : '' }}">
				<a href="#" class="nav-link has-dropdown"><i class="fab fa-blogger"></i><span>Blog Details</span></a>
				<ul class="dropdown-menu">
					<li class="{{ Route::is('blog.index') ? 'active' : ''}}"><a class="nav-link" href="{{ route('blog.index')}}">View Blog</a></li>
					<li class="{{ Route::is('blog.create') ? 'active' : ''}}"><a class="nav-link" href="{{ route('blog.create')}}">Create Blog</a></li>
				</ul>
			</li>     

			<li class="menu-header">Create FAQs</li>
			<li class="dropdown {{ Route::is('faq.*') ? 'active' : '' }}">
				<a href="#" class="nav-link has-dropdown"><i class="fas fa-question-circle"></i><span>FAQs</span></a>
				<ul class="dropdown-menu">
					<li class="{{ Route::is('faq.index') ? 'active' : ''}}"><a class="nav-link" href="{{ route('faq.index')}}">FAQs View</a></li>
					<li class="{{ Route::is('faq.create') ? 'active' : ''}}"><a class="nav-link" href="{{ route('faq.create')}}">Create FAQ</a></li>
				</ul>
			</li>

			<li class="menu-header">Blog Comment</li>
			<li class="{{ Route::is('blog-comment.*') ? 'active' : ''}}"><a class="nav-link" href="{{ route('blog-comment.index')}}"><i class="fas fa-comments"></i> <span>Blog Comment</span></a></li>
			
		</ul>

		<div class="mt-4 mb-4 p-3 hide-sidebar-mini">
			<a href="https://www.animal-life-style.top" target="_blank_" class="btn btn-primary btn-lg btn-block btn-icon-split">
				<i class="fas fa-rocket"></i> Go to the main website
			</a>
		</div>        
	</aside>
</div>