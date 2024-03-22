
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-header>
    </x-header>
    <body class="bg-base-300">
        <x-navbar>
        </x-navbar>

        <div  class="grid grid-cols-4 box-border gap-4 p-4 ease-in-out w-3/5 m-auto">

            <!-- movie card -->
            <div class="flex flex-col gap-4 items-center w-full h-auto bg-base-100 scale-100 hover:scale-105 cursor-pointer rounded-md overflow-hidden group transition ease-in-out auto-cols-fr font-[roboto]">
                <a href="#" class="relative">
                    <img class="w-60 h-80 blur-none group-hover:blur-sm	transition ease-in-out" src="{{$movieData->url}}" alt="{{$movieData->name}}">
                    <div class="absolute  hidden opacity-0 group-hover:opacity-100 group-hover:flex flex-col justify-around bottom-0 w-full h-full bg-black/40 transition ease-in-out">
                        <div class="flex flex-col items-center gap-4">
                            <p class=" px-4 font-bold text-xl text-white  ease-in-out text-center"> {{$movieData->name}}</p>
                            <span class=" px-4 text-white/80  ease-in-out text-center">{{\Carbon\Carbon::parse($movieData->release_date)->format('Y')}}</span>
                        </div>
                        <div class="flex-row items-center flex justify-between gap-4 box-border w-full px-4 ">
                            <button class="btn flex-1 hover:bg-white/80 border-none bg-white text-base-200">Edit</button>
                            <button class="btn flex-1 hover:bg-[#ff6b00]/80 border-none bg-[#ff6b00] text-white">Delete</button>
                        </div>
                    </div>
                </a>
            </div>
            
        </div>

        <x-footer>
        </x-footer>
    </body>
</html>
