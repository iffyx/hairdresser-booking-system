@extends('layouts.welcome')
@section('content')

    <table class="table table-bordered">
        <th>Usługa</th>
        <th>Cena</th>
            @foreach($services as $service)
                <tr>
                    <td> {{$service->name}}</td>
                    <td> {{$service->price}} zł</td>
                </tr>
            @endforeach
        </table>

@endsection