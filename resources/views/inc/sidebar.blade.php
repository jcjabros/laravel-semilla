<nav class="col-md-2 d-none d-md-block bg-light sidebar">
        <div class="sidebar-sticky">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}"  href="/dashboard">
                <span data-feather="home"></span>
                Dashboard <span class="sr-only"></span>
              </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('orders') ? 'active' : '' }}"  href="#">
                  <span data-feather="shopping-cart"></span>
                  Orders <span class="sr-only"></span>
                </a>
              </li>
            @if(Auth::user()->hasRole('administrator') !=null || Auth::user()->hasRole('manager') !=null || Auth::user()->hasRole('employee'))
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/beforenafter') ? 'active' : '' }}"  href="/dashboard/beforenafter">
                  <span data-feather="scissors"></span>
                  Before and After
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/gallery') ? 'active' : '' }}"  href="/dashboard/gallery">
                  <span data-feather="image"></span>
                  Gallery
                </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link {{ Request::is('dashboard/posts') ? 'active' : '' }}"  href="/dashboard/posts">
                    <span data-feather="bar-chart-2"></span>
                    Posts
                  </a>
                </li>
            @if(Auth::user()->hasRole('administrator') !=null || Auth::user()->hasRole('manager') !=null)
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/#') ? 'active' : '' }}"  href="/dashboard/subscribers">
                  <span data-feather="users"></span>
                  Subscribers
                </a>
              </li>
            <li class="nav-item">
              <a class="nav-link {{ Request::is('dashboard/products') ? 'active' : '' }}"  href="/dashboard/products">
                <span data-feather="shopping-bag"></span>
                Products
              </a>
            </li>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Request::is('dashboard/treatmenttypes') ? 'active' : '' }}"  href="/dashboard/treatmenttypes">
                <span data-feather="type"></span>
                Treatments Type
              </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/treatments') ? 'active' : '' }}"  href="/dashboard/treatments">
                  <span data-feather="scissors"></span>
                  Treatments
                </a>
              </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/categories') ? 'active' : '' }}"  href="/dashboard/categories">
                  <span data-feather="layers"></span>
                  Categories
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/sliders') ? 'active' : '' }}"  href="/dashboard/sliders">
                  <span data-feather="image"></span>
                  Home Slider
                </a>
              </li>
              @if(Auth::user()->hasRole('administrator') !=null) 
            <li class="nav-item">
                <a class="nav-link {{ Request::is('register') ? 'active' : '' }}"  href="/register">
                  <span data-feather="user-plus"></span>
                  Create User
                </a>
             </li>
             <li class="nav-item">
                <a class="nav-link {{ Request::is('users') ? 'active' : '' }}"  href="/dashboard/users">
                  <span data-feather="users"></span>
                   Users
                </a>
             </li>
             @endif
            @endif
          @endif  
          </ul>
        </div>
      </nav>