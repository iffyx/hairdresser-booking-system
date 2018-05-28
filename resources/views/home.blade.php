@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Panel administracyjny</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                        Zarządzaj:
                        <a href="{{ url('/services') }}">usługami</a>
                        <a href="{{ url('/reservations') }}">rezerwacjami</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
