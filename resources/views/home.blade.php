@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <img src="{{Storage::disk('p')}}" alt="">
            
        </div>
    </div>
</div>
@endsection

<x-Modal id="prueba" title="{{getConfig('popup','title_1')}}" text="{{getConfig('popup','text_1')}}" buttonText="{{getConfig('popup','button_1')}}" buttonLink="{{getConfig('popup','link_1')}}" image="{{asset('/storage/' . getConfig('popup','image_1'))}}"/>