<!-- start Navabar -->
<div class="flex flex-row box-border py-4 px-14 w-full justify-around	items-center bg-base-100 mb-4 sticky top-0 z-50 ">
    <!-- title  -->

    <h1 class="text-[#ff6b00] text-2xl font-bold">
        .NFQ Movies     
    </h1>

    <!-- Nav Links -->
    <li class="flex flex-row justify-end gap-8 w-1/5 items-center">
        @auth
            <a href="{{route('movies.view')}}" class=" font-bold text-base-content  decoration-0 hover:text-white ">Movies</a>
            <a href="{{route('movies.create')}}" class=" font-bold text-white hover:bg-[#ff6b00]/80 btn bg-[#ff6b00]">Create</a>
            <a href="{{route('signout')}}" class=" font-bold btn">Sign out</a>

        @endauth
        
        @guest
            @if (Route::currentRouteName() === 'signup.view')
                <a href="{{route('login.view')}}" class=" font-bold btn">Log in</a>
            @elseif (Route::currentRouteName() === 'login.view')
                <a href="{{route('signup.view')}}" class=" font-bold btn">Sign up</a>
            @endif

        @endguest
    </li>
</div>
<!-- end Navbar -->