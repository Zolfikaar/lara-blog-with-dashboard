<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Interface</div>

                <a class="nav-link {{ Request::is('admin/categories') || Request::is('admin/category/create') ||Request::is('admin/category/edit/*') ? 'collapse active' : 'collapsed' }}" href="#" data-bs-toggle="collapse" data-bs-target="#collapseCategories"
                    aria-expanded="false" aria-controls="collapseCategories">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Categories
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse {{ Request::is('admin/categories') || Request::is('admin/category/create') || Request::is('admin/category/edit/*') ? 'show' : '' }}" id="collapseCategories" aria-labelledby="headingOne"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ Request::is('admin/categories') ? 'active' : '' }}" href="{{ route('admin.categories') }}">View Categories</a>
                        <a class="nav-link {{ Request::is('admin/category/create') || Request::is('admin/category/edit/*') ? 'active' : '' }}" href="{{ route('admin.add-category') }}">Add Category</a>

                    </nav>
                </div>

                <a class="nav-link {{ Request::is('admin/posts') || Request::is('admin/post/create') ||Request::is('admin/post/edit/*') ? 'collapse active' : 'collapsed' }}" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePosts"
                    aria-expanded="false" aria-controls="collapsePosts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Posts
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse {{ Request::is('admin/posts') || Request::is('admin/post/create') || Request::is('admin/post/edit/*') ? 'show' : '' }}" id="collapsePosts" aria-labelledby="headingOne"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ Request::is('admin/posts') ? 'active' : '' }}" href="{{ route('admin.posts') }}">View Posts</a>
                        <a class="nav-link {{ Request::is('admin/post/create') || Request::is('admin/post/edit/*') ? 'active' : '' }}" href="{{ route('admin.add-post') }}">Add Post</a>
                    </nav>
                </div>

                <a class="nav-link {{ Request::is('admin/users') ? 'active' : '' }}" href="{{ route('admin.users') }}" >
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    Users

                </a>

            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            Start Bootstrap
        </div>
    </nav>
</div>
