<div class="containNav">

    <div class="left">
        <ul>
            <li class="menu-heading  point  ">
                <a href="{{url('/')}}" class="text-decoration-none border-0">
                    Dashboards
                </a>
            </li>
            <li  >
                <a  href="{{route('dashboard')}}" class="liList" onclick="changebackground(event,1)">
                    <i class="fa fa-tachometer fa-lg text-white fa-2x me-2 ms-1"></i>
                    <span class="textNav"> Dashboard </span>
                </a>
            </li>

            <li  >
                <a  href="{{route('patients')}}" class="liList" onclick="changebackground(event,2)">
                    <i class="fa-solid fa-bed-pulse text-white fa-2x mx-2"></i>
                    <span class="textNav"> Patients</span>
                </a>
            </li>

            <li  >
                <a  href="{{route('medicalstaffs')}}" class="liList" onclick="changebackground(event,3)">
                    <i class="fa-solid fa-user-doctor text-white fa-2x mx-2"></i>
                    <span class="textNav"> Medical Staff</span>
                </a>
            </li>
            <li  >
                <a  href="{{route('news')}}" class="liList" onclick="changebackground(event,4)">
                    <i class="fa-solid fa-square-rss text-white fa-2x mx-2"></i>
                    <span class="textNav">News</span>
                </a>
            </li>
            <li class="menu-heading" >Pages</li>
            <li class="active" >
                <a  href="#user-profile">
                    <i class="fa-solid fa-gear  fa-2x mx-2"></i>
                    <span class="textNav">settings</span>
                </a>
            </li>
            <li>
                <a  href="#candidates">
                    <i class="fa-solid fa-earth-americas text-white fa-2x mx-2"></i>
                    <span class="textNav">Language</span>
                </a>
            </li>
            <li  onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                <a  href="#invoices">
                    <i class="fa-solid fa-right-from-bracket text-white fa-2x mx-2"></i>
                    <span class="textNav">logout</span>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>

                </a>
            </li>
        </ul>
    </div>

</div>


<nav>
    <div class="nav-wrapper position-relative">
        <div class="position-absolute mainmeunbutton_container">
            <i class="fa-solid fa-bars mainmeunbutton point" id="btn1_" onclick="showmenuANDhide(event)"></i>
        </div>

        <a href="#" class="brand-logo mx-3 headerText"></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down me-4">
            <li><a href="" class="text-decoration-none text-white">Profile</a></li>
            <li class="notif">
                <a href="#" class="text-decoration-none">
                    <button type="button" class="navcustome position-relative">
                        <i class="fa-solid fa-bell text-warning fa-2x"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger text-white">
                            99+
                            <span class="visually-hidden">unread messages</span>
                        </span>
                    </button>
                </a>
            </li>

        </ul>
    </div>
</nav>
