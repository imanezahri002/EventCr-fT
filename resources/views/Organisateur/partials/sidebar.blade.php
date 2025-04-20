<!-- SIDEBAR -->
<section id="sidebar">
    <a href="#" class="brand">
        <i class='bx bxs-smile'></i>
        <span class="text">Organisateur</span>
    </a>
    <ul class="side-menu top">
        <li class="{{ request()->routeIs('organisateur.dashboard') ? 'active' : '' }}">
            <a href="{{route('organisateur.dashboard')}}">
                <i class='bx bxs-dashboard' ></i>
                <span class="text">Dashboard</span>
            </a>
        </li>
        <li class="{{ request()->routeIs(['organisateur.events','organisateur.events.create']) ? 'active' : '' }}">
            <a href="{{route('organisateur.events')}}">
                <i class='bx bxs-calendar-event'></i>
                <span class="text">Evenements</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class='bx bxs-coupon'></i>
                <span class="text">Reservations</span>
            </a>
        </li>
        <li class="{{ request()->routeIs('organisateur.profile') ? 'active' : '' }}">
            <a href="{{route('organisateur.profile')}}">
                <i class='bx bxs-user'></i>
                <span class="text">Profile</span>
            </a>
        </li>

    </ul>
    <ul class="side-menu">
        <li>
            <a href="#">
                <i class='bx bxs-cog' ></i>
                <span class="text">Settings</span>
            </a>
        </li>
        <li>

            <a href="{{route('logout')}}" class="logout">
                <i class='bx bxs-log-out-circle'></i>
                <span class="text">Logout</span>
            </a>

        </li>

    </ul>
</section>
<!-- SIDEBAR -->
