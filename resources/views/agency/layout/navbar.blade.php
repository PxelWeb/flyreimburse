@php
    $applications = App\Models\Application::orderBy('created_at','desc')->where('user_id',Auth::user()->id)->take(10)->get();
    $seen = App\Models\Application::where('seen',0)->where('user_id',Auth::user()->id)->count();

@endphp

<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        </ul>
    </form>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg {{ $seen > 0 ? 'beep' : '' }}"><i class="far fa-bell"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
                <div class="dropdown-header">Notifications
                    <div class="float-right">
                        <a class='notification btn' style="color: #004aad;">Mark All As Read</a>
                    </div>
                </div>
                <div class="dropdown-list-content dropdown-list-icons">
                @foreach ($applications as $application)
                    <a href="{{ route('agency.application-details',$application->id) }}" class="dropdown-item dropdown-item-unread">
                        <div class="dropdown-item-icon bg-primary text-white">
                            <i class="fas fa-bell"></i>
                        </div>
                        <div class="dropdown-item-desc">
                            {{ explode(',',$application->username)[0] }} has applied !
                            <div class="time text-primary">{{calculateTime($application->created_at)}}</div>
                        </div>
                    </a>
            
                @endforeach
                </div>
                {{-- <div class="dropdown-footer text-center">
                    <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                </div> --}}
            </div>
        </li>
        <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <div class="d-sm-none d-lg-inline-block">Hi, {{auth()->user()->name ?? ''}}</div></a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="{{ route('agency.profile.index') }}" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Profile
                </a>
                <div class="dropdown-divider"></div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{route('logout')}}" onclick="event.preventDefault();
                                                this.closest('form').submit()"
                       class="dropdown-item has-icon text-danger">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </form>
            </div>
        </li>
        </li>
    </ul>
</nav>


@push('scripts')
<script>
    $(document).ready(function(){
        $('.notification').on('click',function(e){
            e.preventDefault();

            $.ajax({
                method: 'PUT',
                url: '{{ route('agency.update-notification') }}',

                success:function(data){
                    $('.notification-toggle').removeClass('beep');
                    console.log(data);
                },error: function(data){
                    console.error(data);
                }
            })
        })
    })
</script>
@endpush