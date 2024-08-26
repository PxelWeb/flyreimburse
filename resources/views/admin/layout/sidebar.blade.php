<div class="main-sidebar sidebar-style-2" id="sidebar">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <img src="{{ asset('areimburse login-logo-2.jpg') }}" alt="logo" width="250" class="shadow-light">
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <img src="{{ asset('areimburse logo-2.jpg') }}" alt="logo" width="50" class="shadow-light rounded-circle">
      </div>
      <ul class="sidebar-menu">
        <li class="menu-header" style="margin-top: 30px ">Dashboard</li>
        <li class="dropdown {{ setActive(['admin.dashboard']) }}">
          <a href="{{ route('admin.dashboard') }}" class="nav-link"><i class="fas fa-fire side-bar-icon"></i><span>Dashboard</span></a>
        </li>
        <li class="menu-header">Menu</li>
        <li class="dropdown
        {{ setActive([
          'admin.all-applications',
          'admin.new-arrival-application',
          'admin.completed-application',
          'admin.delivered-application',
          'admin.in-pay-process-application',
          'admin.refused-application',
          'admin.completed-application'
          ]) }}">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns side-bar-icon"></i> <span>Applications</span></a>
          <ul class="dropdown-menu">
            <li class="{{ setActive(['admin.all-applications']) }}"><a class="nav-link" href="{{ route('admin.all-applications') }}">All Application</a></li>
            <li class="{{ setActive(['admin.new-arrival-application'])}}"> <a class="nav-link" href="{{route('admin.new-arrival-application')}}">New Arrival</a></li>
            <li class="{{ setActive(['admin.delivered-application'])}}"><a class="nav-link" href="{{route('admin.delivered-application')}}">Delivered</a></li>
            <li class="{{ setActive(['admin.in-pay-process-application'])}}"><a class="nav-link" href="{{route('admin.in-pay-process-application')}}">In Pay Process</a></li>
            <li class="{{ setActive(['admin.refused-application'])}}"><a class="nav-link" href="{{route('admin.refused-application')}}">Refused</a></li>
            <li class="{{ setActive(['admin.completed-application'])}}"><a class="nav-link" href="{{route('admin.completed-application')}}">Completed</a></li>
          </ul>
        </li>

        <li class="dropdown
        {{ setActive([
          'admin.manage-user.index',
          'admin.manage-user.create'
          ]) }}">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-users side-bar-icon"></i></i> <span>Users</span></a>
          <ul class="dropdown-menu">
            <li class="{{ setActive(['admin.manage-user.index']) }}"><a class="nav-link" href="{{ route('admin.manage-user.index') }}">Manage User</a></li>
          </ul>
        </li>
        <li class="dropdown {{ setActive(['admin.create-application']) }}">
          <a href="{{ route('admin.create-application') }}" class="nav-link"><i class="fas fa-user-plus side-bar-icon"></i><span>Create Application</span></a>
        </li>
        <li class="{{ setActive(['admin.email-config.index']) }}"><a class="nav-link" href="{{ route('admin.email-config.index') }}"><i class="fas fa-cog side-bar-icon"></i><span>Email Configuration</span></a></li>


        <li class="dropdown {{ setActive(['admin.nomad-application.index']) }}"">
          <a href="{{ route('admin.nomad-application.index') }}" class="nav-link"><i class="fas fa-user-secret side-bar-icon"></i><span>Nomad Application</span></a>
        </li>
        
      </ul>
 </aside>
  </div>