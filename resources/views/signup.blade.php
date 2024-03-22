<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-header>
    </x-header>
    <body class="bg-base-300">
        <x-navbar>
        </x-navbar>

        <div  class="flex flex-row justify-around py-4 h-fit">

            <!-- sign up section  -->
            <div class="flex flex-col items-center gap-16 bg-base-100 p-16 rounded-xl h-full">
                <div>
                    <h1 class="text-4xl font-bold mb-2">Sign up</h1>
                    <h1 class="text-sm font-regular">Start your journey!</h1>
                </div>
                <form action="{{route("signup.register")}}" method="post" class=" flex-col flex gap-4" id="signupForm">
                    @csrf
                    <input type="text" name="name" placeholder="Name" class="focus:border-[#ff6b00]  input input-bordered  w-full max-w-xs"/>
                    <input type="email" name="email" placeholder="Email" class="focus:border-[#ff6b00]  input input-bordered  w-full max-w-xs" />
                    <input type="password" name="password" id="password" placeholder="Password" class="focus:border-[#ff6b00]  input input-bordered  w-full max-w-xs" />
                    <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" class="focus:border-[#ff6b00]  input input-bordered  w-full max-w-xs" />
                    <button type="submit" name="signup" class="btn bg-[#ff6b00] text-white mt-6">Sign Up</button>
                </form>
            </div>
        </div>

        <x-footer>
        </x-footer>

        <script>
            document.getElementById('signupForm').addEventListener('submit', function(event) {
                var password = document.getElementById('password').value;
                var confirmPassword = document.getElementById('confirm_password').value;
                
                if (password !== confirmPassword) {
                    alert("Passwords do not match.");
                    event.preventDefault();
                }
            });
        </script>
    </body>
</html>
