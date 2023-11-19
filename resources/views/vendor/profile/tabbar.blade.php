<ul class="nav nav-pills flex-column flex-md-row mb-3">
    <li class="nav-item">
        <a class="nav-link @if(\Request::path() == 'profile') active @endif" href="{{route('profile.index')}}">
            <i class="bx bx-user me-1"></i> My Profile </a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if(\Request::path() == 'profile/create') active @endif" href="{{route('profile.create')}}">
            <i class="bx bx-bell me-1"></i> Change Password </a>
    </li>
    <li class="nav-item">
        <a href="{{route('vendor.address')}}"  class="nav-link @if(\Request::path() == 'v_address') active @endif">
            <i class="bx bx-map me-1"></i> My Address
        </a>
    </li>
    <li class="nav-item">
        <a href="{{route('vendor.shop')}}" class="nav-link @if(\Request::path() == 'v_shop') active @endif">
            <i class="bx bx-store me-1"></i>Shop Details
        </a>
    </li>

</ul>
