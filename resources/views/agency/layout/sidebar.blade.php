<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <img src="{{ asset('areimburse login-logo-2.jpg') }}" alt="logo" width="250" class="shadow-light">
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <img src="{{ asset('areimburse logo-2.jpg') }}" alt="logo" width="50" class="shadow-light rounded-circle">
      </div>
      <ul class="sidebar-menu">
        <li class="menu-header" style="margin-top: 30px">Dashboard</li>
        <li class="dropdown {{ setActive(['agency.dashboard']) }}">
          <a href="{{ route('agency.dashboard') }}" class="nav-link"><i class="fas fa-fire side-bar-icon"></i><span>Dashboard</span></a>
        </li>
        <li class="menu-header">Menu</li>
        <li class="dropdown
        {{ setActive([
          'agency.all-applications',
          'agency.new-arrival-application',
          'agency.completed-application',
          'agency.delivered-application',
          'agency.in-pay-process-application',
          'agency.refused-application',
          'agency.completed-application'
          ]) }}">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns side-bar-icon"></i> <span>Applications</span></a>
          <ul class="dropdown-menu">
            <li class="{{ setActive(['agency.all-applications']) }}"><a class="nav-link" href="{{ route('agency.all-applications') }}">All Application</a></li>
            <li class="{{ setActive(['agency.new-arrival-application'])}}"> <a class="nav-link" href="{{route('agency.new-arrival-application')}}">New Arrival</a></li>
            <li class="{{ setActive(['agency.delivered-application'])}}"><a class="nav-link" href="{{route('agency.delivered-application')}}">Delivered</a></li>
            <li class="{{ setActive(['agency.in-pay-process-application'])}}"><a class="nav-link" href="{{route('agency.in-pay-process-application')}}">In Pay Process</a></li>
            <li class="{{ setActive(['agency.refused-application'])}}"><a class="nav-link" href="{{route('agency.refused-application')}}">Refused</a></li>
            <li class="{{ setActive(['agency.completed-application'])}}"><a class="nav-link" href="{{route('agency.completed-application')}}">Completed</a></li>
          </ul>
        </li>
        <li class="dropdown {{ setActive(['agency.create-application']) }}">
          <a href="{{ route('agency.create-application') }}" class="nav-link"><i class="fas fa-user-plus side-bar-icon"></i><span>Create Application</span></a>
        </li>
      </ul>
 </aside>
  </div>