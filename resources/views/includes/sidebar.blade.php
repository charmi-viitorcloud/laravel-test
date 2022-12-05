<html>
<nav id="sidebar" class="sidebar sidebar-offcanvas dynamic-active-class-disabled">
    <ul class="nav">
        <li class="nav-item nav-profile not-navigation-link">
            <div class="nav-link">
                <div class="user-wrapper">
                    <div class="text-wrapper">
                        <div data-display="static" class="dropdown">
                            <div aria-labelledby="UsersettingsDropdown" class="dropdown-menu">
                                <a class="dropdown-item p-0">
                                    <div class="d-flex border-bottom">
                                        <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                                        </div>
                                        <div class="py-3 px-4 d-flex align-items-center justify-content-center border-left border-right">
                                        </div>
                                        <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                                            <i class="mdi mdi-alarm-check mr-0 text-gray">
                                            </i>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item"> Sign Out </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <button class="btn btn-success btn-block">New Project <i class="mdi mdi-plus"> -->
                </i>
                </button>
            </div>
        </li>
        <li class="nav-item ">
            <a href="{{route('users.index')}}" class="nav-link">
                <i class="fa fa-user-alt" style='font-size:24px'>User</i>
            </a>
        </li>
        <li class="nav-item ">
            <a href="{{route('blogs.index')}}" class="nav-link">
                <i class="fa fa-user-circle" style='font-size:24px'>Blog</i>
            </a>
        </li>
    </ul>
</nav>
</html>