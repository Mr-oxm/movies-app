
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-header>
    </x-header>
    <body class="bg-base-300">
        <x-navbar>
        </x-navbar>

        <div  class="grid grid-cols-4 box-border gap-4 ease-in-out w-3/5 m-auto">

            <form id="movieForm" class="col-span-4 flex flex-row gap-4 justify-between items-center" action="{{ route('movies.view') }}" method="GET">
                <h1 class="text-base-content text-2xl font-bold ">Movie list</h1>
                <input type="hidden" name="sort_by" id="sort_by">
                <details class="dropdown dropdown-end">
                    <summary class="m-1 btn">Sort By</summary>
                    <ul class="p-2 shadow menu dropdown-content z-[1] bg-base-100 rounded-box w-52">
                        <li><a onclick="setSortBy('name')">Name</a></li>
                        <li><a onclick="setSortBy('release_date')">Date</a></li>
                        <li><a onclick="setSortBy('mine')">Mine</a></li>
                    </ul>
                </details>
                <!-- <details class="dropdown">
                    <summary class="m-1 btn">Order</summary>
                    <ul class="p-2 shadow menu dropdown-content z-[1] bg-base-100 rounded-box w-52">
                        <li><a onclick="setOrder('asc')">Asc</a></li>
                        <li><a onclick="setOrder('desc')">Desc</a></li>
                    </ul>
                </details> -->
            </form>


            @foreach ($movieList as $movie)
            <!-- movie card -->
            <div class="flex flex-col gap-4 items-center w-full h-auto bg-base-100 scale-100 hover:scale-105 cursor-pointer rounded-md overflow-hidden group transition ease-in-out auto-cols-fr font-[roboto]">
                <a href="{{route('movies.details', $movie->id)}}" class="relative">
                    <img class="w-60 h-80 blur-none group-hover:blur-sm	transition ease-in-out" src="{{asset($movie->url)}}" alt="{{$movie->name}}">
                    <div class="absolute  hidden opacity-0 group-hover:opacity-100 group-hover:flex flex-col justify-around bottom-0 w-full h-full bg-black/40 transition ease-in-out">
                        <div class="flex flex-col items-center gap-4">
                            <p class=" px-4 font-bold text-xl text-white  ease-in-out text-center"> {{$movie->name}}</p>
                            <span class=" px-4 text-white/80  ease-in-out text-center">{{\Carbon\Carbon::parse($movie->release_date)->format('Y')}}</span>
                        </div>
                        @if ($movie->user_id == Auth::id())
                            <div class="flex-row items-center flex justify-between gap-4 box-border w-full px-4 ">
                                <a href="{{route('movies.view_movie', $movie->id)}}" class="btn flex-1 hover:bg-white/80 border-none bg-white text-base-200">
                                    Edit
                                </a>
                                <a href="{{route('movies.delete', $movie->id)}}" class="btn flex-1 hover:bg-red-[#ff6b00]/80 border-none bg-red-[#ff6b00] text-white">
                                    Delete
                                </a>
                            </div>
                        @endif
                    </div>
                </a>
            </div>
            @endforeach
            
        </div>

        <x-footer>
        </x-footer>

        <script>
            function setSortBy(value) {
                document.getElementById('sort_by').value = value;
                updateFormAction();
            }

            function updateFormAction() {
                var form = document.getElementById('movieForm');
                form.action = "{{ route('movies.view') }}?" + new URLSearchParams(new FormData(form)).toString();
                form.submit();
            }
        </script>
    </body>
</html>
