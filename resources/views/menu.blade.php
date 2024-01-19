
<!--Wygląd menu-->
<div class="menu-area">
  <div class="limit-box">
    <nav class="main-menu">
      <ul class="menu-area-main">
         <li class="active">
           <a href="/">Home</a>
         </li>
         @auth
         @if(auth()->user()->isAdmin() or auth()->user()->isModerator())
         <li>
            <a href="/image/add">Add image</a>
         </li>
         @endif
         <li>
            <a href="/logout">Logout</a>
         </li>
         @if(auth()->user()->isAdmin())
         <li>
            Admin
         </li>
         @endif
         @if(auth()->user()->isModerator())
         <li>
            Moderator
         </li>
         @endif
         @endauth
         @guest
         <li>
            <a href="/login">Login</a>
         </li>
         <li>
            <a href="/register">Register</a>
         </li>
         @endguest
      </ul>
    </nav>
  </div>
</div>
