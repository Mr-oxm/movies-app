<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\movie;
use Session;
use Illuminate\Support\Facades\Storage;

use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;

class MovieContoller extends Controller
{
    public function index(Request $request){
        //sql injection problem 
        $sortBy = $request->get('sort_by');

        //request when  and realtionshipsand helpers -- global class -> composer autoload
        if($sortBy=="mine"){
            $movies = Movie::where('user_id', Auth::id())->get();
        }else{
            $movies = Movie::orderBy($sortBy?: "name")->get();
        }
        
        return view('movies', ['movieList'=>$movies]);
    }

    public function create(Request $request){
        //view always snake_case   
        // folder for every action 
        return view('CreateNewMovie', ['movieData'=> null]);
    }

    public function create_movie(StoreMovieRequest $request){
        $data = $request->validated();

        $path = Storage::url($request->file('poster')->store('public'));
        $data = array_merge($request->except('poster'), [
            'user_id'=> Auth::id() ?? 1, 
            'url' => $path
        ]);

        Movie::create($data);
        
        return redirect()->route('movies.view');
    }
    
    public function retriveMovie(Request $request, $id){
        $movie = Movie::findOrFail($id);
        
        if($movie->user_id != Auth::id()){
            // tell the user aboout 
            return redirect()->route('movies.view');
        }

        return view('CreateNewMovie', ['movieData'=> $movie]);
    }

    public function details(Request $request, $id){
        $movie = Movie::findOrFail($id);

        return view('Movie_Details', ['movieData'=> $movie]);
    }
    
    public function edit_movie(UpdateMovieRequest $request, $id){
        $movie = Movie::findOrFail($id);

        if ($movie->user_id !== Auth::id()) {
            abort(403, 'you cant edit what u dont own');
        }

        $data = $request->validated();

        // delete the file 
        
        if ($request->hasFile('poster')) {
            $path = Storage::url($request->file('poster')->store('public'));
            $data = array_merge($request->except('poster'), [
                'url' => $path
            ]);
        }
        
        $movie->update($data);

        return redirect()->route('movies.view');
    }
    public function delete(Request $request, $id){
        $movie = Movie::findOrFail($id);

        $movie->delete();
        
        return redirect()->route('movies.view');
    }
    
}
