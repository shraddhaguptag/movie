<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class MoviesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(Auth::user()->role_as == 0){
            $popularMovies = Http::withToken(config('services.tmdb.token'))
                ->get('https://api.themoviedb.org/3/movie/popular')
                ->json()['results'];
            
            return view('movies.index', ['popularMovies'=>$popularMovies]);
        }
        elseif(Auth::user()->role_as == 1){
            Session::flush();
            Auth::logout();
            return redirect('login');
        }
        else{
            return redirect('/login')->with('status',"You don't have access. Need to login");

        }

        }

        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movie = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/'.$id.'?append_to_response=credits,videos,images')
            ->json();

        return view('movies.show', ['movie'=>$movie]);
    }

}
