
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-header>
    </x-header>
    
    <body class="bg-base-300">
        <x-navbar>
        </x-navbar>

        <div  class="flex flex-row justify-center gap-24 py-4 h-fit">

            <!-- create form section section  -->
            <div class="flex flex-col items-center gap-16 bg-base-100 p-16 rounded-xl h-full ">
                <div>
                    <h1 class="text-4xl font-bold mb-2">{{$movieData->name}}</h1>
                    <h1 class="text-sm font-regular text-center">{{\Carbon\Carbon::parse($movieData->release_date)->format('Y')}}</h1>
                    @if ($movieData->user_id == Auth::id())
                        <div class="flex-row items-center flex justify-between gap-4 box-border w-full px-4 ">
                            <a href="{{route('movies.view_movie', $movieData->id)}}" class="btn flex-1 hover:bg-white/80 border-none bg-white text-base-200">
                                Edit
                            </a>
                            <a href="{{route('movies.delete', $movieData->id)}}" class="btn flex-1 hover:bg-red-[#ff6b00]/80 border-none bg-red-[#ff6b00] text-white">
                                Delete
                            </a>
                        </div>
                    @endif
                </div>

            </div>
            
            <div class="divider lg:divider-horizontal"></div> 

            {{-- poster preview --}}
            <div class="flex flex-col gap-4 items-center">
                <h1 class="font-bold text-4xl">Poster</h1>
                <img id="dynamicImage" src="{{$movieData->url}}" alt="poster" class="flex-1 rounded-xl w-72 h-80">
            </div>
        </div>
        

        <x-footer>
        </x-footer>
    </body>
</html>
