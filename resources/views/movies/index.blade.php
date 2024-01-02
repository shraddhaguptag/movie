@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 pt-16">
        <h2 class="uppercase tracking-wider text-lg font-semibold">Popular Movies</h2>


        <div class="card text-center">
            <div class="row justify-content-md-center">
                    @foreach ($popularMovies as $movie)

             <div class="col-md-3">
            <div class="container">
                <a href="{{ url('movie',$movie['id']) }}">
                <img width="50%" height="100" class="img-fluid img-thumbnail" src="{{ 'https://image.tmdb.org/t/p/w500/'.$movie['poster_path'] }}" alt="poster">
                </a>
            </div>
            <div class="card-body">
            <h6 class="card-title">{{ $movie['title'] }}</h6>
                <i class="fas fa-star"><span class="ml-1"><strong>Rating: </strong>{{$movie['vote_average']}}</span></i>
                <p class="tahun"><small>{{$movie['release_date']}}</small></p>
            </div>
             </div>
             @endforeach
        </div>      
        </div>
    </div>
@endsection