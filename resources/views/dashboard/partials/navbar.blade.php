<!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item my-auto">
        <img src="/assets/dist/img/user2.jpg" alt="user" class="brand-image img-circle elevation-3" style="opacity: .8" width="20px">
      </li>

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          {{ auth()->user()->nama }}
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="{{ route('profile') }}" class="dropdown-item">
            <i class="fas fa-user mr-2"></i>
            My Profile
          </a>
          <div class="dropdown-divider"></div>
          <form action="/logout" method="post">
            @csrf
            <button type="submit" class="dropdown-item">
              <i class="fas fa-solid fa-arrow-right mr-2"></i>
              Logout
            </button>
          </form>
        </div>
      </li>

    </ul>
  </nav>
  <!-- /.navbar -->