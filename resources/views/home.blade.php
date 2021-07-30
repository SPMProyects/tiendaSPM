@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#prueba">
                        Launch static backdrop modal
                    </button>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<x-Modal id="prueba" title="{{getConfig('popup','title_1')}}" text="{{getConfig('popup','text_1')}}" buttonText="{{getConfig('popup','button_1')}}" buttonLink="{{getConfig('popup','link_1')}}" image="{{asset('/storage/' . getConfig('popup','image_1'))}}"/>