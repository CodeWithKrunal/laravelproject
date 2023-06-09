<nav class="flex justify-between items-center mb-4">
    <a href="{{url('/')}}">
        <img class="w-24" src="<?php echo url('public/images/logo.png') ?>" alt="" class="logo"/>
    </a>
    <ul class="flex space-x-6 mr-6 text-lg">
       @auth
        <li>
            <span class="font-bold uppercase">
                Welcome {{auth()->user()->name}}
            </span>
        </li>
        <li>
            <a href="{{url('')}}/listings/manage" class="hover:text-laravel">
                <i class="fa-solid fa-gear"></i>
                Manage Listing</a
            >
        </li>

        <li>
            <form method="post" action="{{url('')}}/logout">
                @csrf
                <button type="submit"><i class="fa-solid fa-door-closed"></i> LogOut</button>
            </form>
        </li>
       @else

        <li>
            <a href="{{url('')}}/register" class="hover:text-laravel">
                <i class="fa-solid fa-user-plus"></i> Register</a>
        </li>
        <li>
            <a href="{{url('')}}/login" class="hover:text-laravel">
                <i class="fa-solid fa-arrow-right-to-bracket"></i>
                Login</a
            >
        </li>
        @endauth
    </ul>
</nav>
