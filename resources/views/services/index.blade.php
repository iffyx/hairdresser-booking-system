@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 class="text-center">Usługi</h2>
            </div>
            <div class="text-center p-3">
                <a class="btn btn-success" href="{{ route('services.create') }}"> Stwórz nową usługę</a>
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>Nr</th>
            <th>Usługa</th>
            <th>Cena</th>
            <th></th>
        </tr>
        @foreach ($services as $service)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $service->name }}</td>
                <td>{{ $service->price }}</td>
                <td>
                    <form action="{{ route('services.destroy',$service->id) }}" method="POST">

                        <a class="btn btn-primary" href="{{ route('services.edit',$service->id) }}">Edytuj</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Usuń</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <a class="btn btn-primary" href="{{ route('home') }}"> Wróć</a>
        </div>
    </div>

@endsection