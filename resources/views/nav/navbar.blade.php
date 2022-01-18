<nav class="navbar navbar-dark bg-dark">
 <div class="container">
    <a href="#" class="navbar-brand brand">
      <i class="fas fa-cart-plus cart"></i>Met Store
    </a>
    <ul class="main-menu">
       <li><a href="/">Home</a></li>
      <!-- check if user is authorized -->
      @auth
        <li><a href="#" class="user-name">{{Auth::user()->name }}</a></li>
        <li><a href="#" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              Logout
            </a>
            <form action="{{route('logout.user')}}" id="logout-form" method="POST" style="display:none;">
               @csrf
           </form>
        </li>
      @else
        <li><a href="{{ route('register.view')}}">Register</a></li>
        <li><a href="{{ route('login.view')}}">Login</a></li>
      @endauth
      <!-- end auth -->
        <li><a href="#">Shop</a></li>
        <li><a href="#">About Us</a></li>
        <li><a href="#">Contact Us</a></li>
    </ul>
 </div>
</nav>