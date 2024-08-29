  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

      <ul class="sidebar-nav" id="sidebar-nav">

          <li class="nav-item">
              <a class="nav-link @if (Request::segment(2) == 'dashboard') @else collapsed @endif"
                  href="{{ url('admin/dashboard') }}">
                  <i class="bi bi-grid"></i>
                  <span>Dashboard</span>
              </a>
          </li><!-- End Dashboard Nav -->

          <li class="nav-item">
              <a class="nav-link @if (Request::segment(2) == 'clientes') @else collapsed @endif"
                  href="{{ url('admin/clientes') }}">
                  <i class="bi bi-person"></i>
                  <span>Clientes</span>
              </a>
          </li><!-- End Dashboard Nav -->

          <li class="nav-item">
              <a class="nav-link @if (Request::segment(2) == 'medicamentos') @else collapsed @endif"
                  href="{{ url('admin/medicamentos') }}">
                  <i class="bi bi-shop"></i>
                  <span>Medicamentos</span>
              </a>
          </li><!-- End Dashboard Nav -->

          <li class="nav-item">
              <a class="nav-link @if (Request::segment(2) == 'medicamentos_estoque') @else collapsed @endif"
                  href="{{ url('admin/medicamentos_estoque') }}">
                  <i class="bi bi-archive"></i>
                  <span>Estoque de Medicamentos</span>
              </a>
          </li><!-- End Dashboard Nav -->


          <li class="nav-item">
              <a class="nav-link collapsed" href="pages-login.html">
                  <i class="bi bi-box-arrow-in-right"></i>
                  <span>Logout</span>
              </a>
          </li>


      </ul>

  </aside><!-- End Sidebar-->
