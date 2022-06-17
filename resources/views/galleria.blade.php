@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @foreach($images as $image)
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{asset($image->link)}}">
                </div>
            @endforeach
        </div>
    </div>
@endsection
