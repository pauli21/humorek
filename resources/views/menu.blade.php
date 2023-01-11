
<!--Wygląd menu-->
<div class="menu-area">
  <div class="limit-box">
    <nav class="main-menu">
      <ul class="menu-area-main">
         <li class="active">
           <a href="/">Home</a>
         </li>
         <li>
            <a href="/image/add">Add image</a>
         </li>
         @auth
         <li>
            <a href="/logout">Logout</a>
         </li>
         @endauth
         @guest
         <li>
            <a href="/login">Login</a>
         </li>
         <li>
            <a href="/register">Register</a>
         </li>
         @endguest
         <li>
            <a href="#"><img src="/images/search_icon.png" alt="#" /></a>
         </li>
      </ul>
    </nav>
  </div>
</div>
