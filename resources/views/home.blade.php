@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div>
                <button id="save" action="{{route('upload')}}">save image</button>
                <input type="file" id="image">
            </div>
            <div style="width:800px;height:800px;border:2px dotted gray;margin:20px;">
                <canvas id="canvas"></canvas>
            </div>
        </div>
    </div>
@endsection
