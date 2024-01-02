@extends('layouts.app')

@section('content')
   

    <div class="card text-center">
        <div class="row justify-content-lg-center">
               <div class="col-md-6">
                <iframe style="height:100%;width:100%;" class="" src="https://www.youtube.com/embed/{{ $movie['videos']['results'][0]['key'] }}?autoplay=1" style="border:0;" allow="encrypted-media" allowfullscreen id="myiframe"></iframe>

               </div>

         <div class="col-md-3">
        <div class="container">
            <img width="50%" height="100" class="img-fluid img-thumbnail" src="{{ 'https://image.tmdb.org/t/p/w500/'.$movie['poster_path'] }}" alt="poster">
            
        </div>   
         </div>
    </div>      
    </div>
   
@endsection