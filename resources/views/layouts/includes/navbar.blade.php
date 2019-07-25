
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
<ul class="navbar-nav ml-auto">
            <li class="nav-item no-arrow">
                <div class="nav-link">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">Welcome to Expense Manager</span>
                </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <li class="nav-item no-arrow" style="border-right:1px solid #efefef;">
                    <div class="nav-link">
                        <a class="mr-2 d-none d-lg-inline text-gray-600 small" href="#" data-toggle="modal" data-target="#changePasswordModal">
                            {{-- <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> --}}
                            Change Password
                        </a>
                    </div>
            </li>

            <li class="nav-item no-arrow">
                    <div class="nav-link">
                        <a class="mr-2 d-none d-lg-inline text-gray-600 small" href="#" data-toggle="modal" data-target="#logoutModal">
                            {{-- <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> --}}
                            Logout
                        </a>
                    </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        {{-- LOGOUT MODAL --}}
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="logoutModalTitle">Logout</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                        Are you sure you want to logout?
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        </div>
                    </div>
                    </div>
                </div>
        {{-- END LOGOUT MODAL --}}