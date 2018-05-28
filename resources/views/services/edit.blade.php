@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edytuj usługę</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('services.index') }}"> Anuluj</a>
            </div>
        </div>
    </div>


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('services.update',$service->id) }}" method="POST">
        @csrf
        @method('PUT')


        <div class="form-group row">
            <label for="name" class="col-sm-4 col-form-label text-md-right">{{ __('Nazwa') }}</label>
            <div class="col-md-6">
                <input type="text" name="name" value="{{ $service->name }}" class="form-control" required autofocus>
            </div>
        </div>


        <div class="form-group row">
            <label for="name"
                   class="col-sm-4 col-form-label text-md-right">{{ __('Cena') }}</label>
            <div class="col-md-6">
                <input type="text" name="price" value="{{ $service->price }}" class="form-control">

            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Zapisz</button>
        </div>


    </form>


@endsection