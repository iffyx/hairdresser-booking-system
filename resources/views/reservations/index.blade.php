@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 class="text-center">Rezerwacje</h2>
            </div>
            <div class="text-center p-3">
                <a class="btn btn-success" href="{{ route('reservations.create') }}"> Stwórz nową rezerwację</a>
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
            <th style="width: 5%">Nr</th>
            <th>Imię</th>
            <th>Nazwisko</th>
            <th style="width: 11%">Telefon</th>
            <th>E-mail</th>
            <th>Usługa</th>
            <th style="width: 11%">Data</th>
            <th style="width: 10%">Godzina</th>
            <th style="width: 10%"></th>
        </tr>
        @foreach ($reservations as $reservation)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $reservation->name }}</td>
                <td>{{ $reservation->surname }}</td>
                <td>{{ $reservation->mobile }}</td>
                <td>{{ $reservation->email }}</td>
                <td>{{ $reservation->service }}</td>
                <td>{{ $reservation->date }}</td>
                <td>{{ $reservation->time }}</td>
                <td>
                    <form action="{{ route('reservations.destroy',$reservation->id) }}" method="POST">

                        <a class="btn btn-primary" href="{{ route('reservations.edit',$reservation->id) }}">Edytuj</a>

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