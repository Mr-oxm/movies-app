
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-header>
    </x-header>
    <body class="bg-base-300">
        <x-navbar>
        </x-navbar>

        <div  class="flex flex-row justify-around py-4 h-fit items-center">
            <!-- log in section  -->
            <div class="flex flex-col items-center gap-16 bg-base-100 p-16 rounded-xl">
                <div>
                    <h1 class="text-4xl font-bold mb-2">Log in</h1>
                    <h1 class="text-sm font-regular">Welcome back!</h1>
                </div>
                <form action="{{route("login.auth")}}" method="post" class=" flex-col flex gap-4">
                    @csrf
                    <input type="email" name="email" placeholder="Email" class="focus:border-[#ff6b00]  input input-bordered  w-full max-w-xs" />
                    <input type="password" name="password" placeholder="Password" class="focus:border-[#ff6b00]  input input-bordered  w-full max-w-xs" />
                    <button type="submit" name="login" class="btn bg-[#ff6b00] text-white mt-6">Log in</button>
                </form>
            </div>

        </div>

        <x-footer>
        </x-footer>
    </body>
</html>
