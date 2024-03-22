
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
                    <h1 class="text-4xl font-bold mb-2">{{$movieData? 'Edit Your Movie': 'Create New Movie'}}</h1>
                    <h1 class="text-sm font-regular text-center">{{$movieData? 'Enhance your stories!': 'Share new stories!'}}</h1>
                </div>
                <form action="{{$movieData? route('movies.edit_movie', $movieData->id) :route('movies.create_movie')}}" method="post" class=" flex-col flex gap-4" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="name" placeholder="Name" value="{{$movieData? $movieData->name: ''}}" class="focus:border-[#ff6b00]  input input-bordered  w-full max-w-xs"/>

                    <input id="imageUrlInput" type="file" name="poster" placeholder="URL" value="{{$movieData? $movieData->url: ''}}" class="focus:border-[#ff6b00]  input input-bordered  w-full max-w-xs" onchange="loadFile(event)"/>

                    <input type="date" name="release_date" placeholder="date" value="{{$movieData? \Carbon\Carbon::parse($movieData->release_date)->format('Y-m-d'): ''}}" class="focus:border-[#ff6b00]  input input-bordered  w-full max-w-xs" />
                    <button type="submit" name="create" class="btn bg-[#ff6b00] text-white mt-6">{{$movieData? 'Edit': 'Create'}}</button>
                </form>
            </div>
            
            <div class="divider lg:divider-horizontal"></div> 

            {{-- poster preview --}}
            <div class="flex flex-col gap-4 items-center">
                <h1 class="font-bold text-4xl">Poster</h1>
                <img id="dynamicImage" src="{{$movieData? $movieData->url: "https://tube.marefa.org/view/img/notfound_portrait.jpg"}}" alt="poster" class="flex-1 rounded-xl w-72 h-80">
            </div>
        </div>
        

        <script>
            var loadFile = function(event) {
            var reader = new FileReader();
            reader.onload = function(){
                var output = document.getElementById('dynamicImage');
                output.src = reader.result;
                };
                reader.readAsDataURL(event.target.files[0]);
            };
            // function changeImage() {
            //     var imageUrl = document.getElementById('imageUrlInput').value;
            //     document.getElementById('dynamicImage').src = imageUrl;
            // }
            
            // document.getElementById('imageUrlInput').addEventListener('input', function() {
            //     event.target?.result?.toString()
            // });
        </script>
        <x-footer>
        </x-footer>
    </body>
</html>
