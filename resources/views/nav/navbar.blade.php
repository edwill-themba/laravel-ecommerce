<div class="top-header">
  <div class="container">
     <div class="social-media">
        <ul>
           <strong> Follow Us On</strong>
           <li><a href="#"><img src="/theme_images/f.png"></a></li>
           <li><a href="#"><img src="/theme_images/g-icon.png"></a></li>
           <li><a href="#"><img src="/theme_images/I.png"></a></li>
           <li><a href="#"><img src="/theme_images/flickr_vut.png"></a></li>
        </ul>
     </div>
  </div>
</div>
<nav class="navbar navbar-dark bg-dark">
 <div class="container">
    <a href="/" class="navbar-brand brand">
       Met<span>Store</span><i class="fas fa-cart-plus cart"></i>
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
        <li><a href="{{ route('products.index')}}">Shop</a></li>
        <li><a href="{{ route('cart.index')}}">Cart</a></li>
        <li><a href="#">About Us</a></li>
        <li><a href="#">Contact Us</a></li>
    </ul>
    <div class="contact">
       <i class="fas fa-envelope email"></i>
       <span>info@met-store.com</span>
    </div>
    <div class="toggle">
       <input type="checkbox" name="checkbox" id="checkbox">
       <label for="checkbox">
          <i class="fas fa-bars bars" onclick="showNavbar()"></i>
          <i class="fas fa-times times" onclick="hideNavbar()"></i>
       </label>
    </div>
 </div>
</nav>