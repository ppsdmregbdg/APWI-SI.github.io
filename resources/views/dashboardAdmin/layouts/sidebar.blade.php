<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-2 sidebar-sticky">
      <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-3 mb-1 text-muted">
        <span>ADMIN DASHBOARD</span>  
      </h6>  
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
            <span data-feather="home" class="align-text-bottom"></span>
            Dashboard
          </a>
        </li>
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-3 mb-1 text-muted">
            <span>ARTICLE</span>  
        </h6> 
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/articles*') ? 'active' : '' }}" href="/dashboard/articles">
            <span data-feather="file-text" class="align-text-bottom"></span>
            Article Post
          </a>
        </li>
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-3 mb-1 text-muted">
            <span>E-LEARNING</span>  
          </h6> 
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/moduls*') ? 'active' : '' }}" href="/dashboard/moduls">
            <span data-feather="file" class="align-text-bottom"></span>
            Modules
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/videos*') ? 'active' : '' }}" href="/dashboard/videos">
            <span data-feather="play" class="align-text-bottom"></span>
            Videos
          </a>
        </li>
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-3 mb-1 text-muted">
          <span>CATEGORIES</span>  
        </h6>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/articlecategories*') ? 'active' : '' }}" href="/dashboard/articlecategories">
            <span data-feather="grid" class="align-text-bottom"></span>
             Category
          </a>
        </li>
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-3 mb-1 text-muted">
          <span>OTHERS</span>  
        </h6>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/admins*') ? 'active' : '' }}" href="/dashboard/admins">
            <span data-feather="users" class="align-text-bottom"></span>
             Admin
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link">  
            <span data-feather="log-out" class="align-text-bottom"></span>
            <form action="/logout" method="POST" class="d-inline align-text-bottom">
              @csrf
              <button type="submit" style="
              background-color: transparent;
                    background-repeat: no-repeat;
                    border: none;
                    font-weight: 500;
              " class="">Logout</button>
            </form>
          </a>
        </li>
      </ul>

    </div>
  </nav>