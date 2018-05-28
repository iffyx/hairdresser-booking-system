@extends('layouts.welcome')
@section('content')

    @if (!empty($success))
        <p class="text-center">
        {{ $success }}
            </p>
    @endif

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Rezerwacja') }}</div>

                    <div class="card-body">
                        <form action="{{ route('customerReservation') }}" method="POST">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-sm-4 col-form-label text-md-right">{{ __('Imię') }}</label>
                                <div class="col-md-6">
                                    <input type="text" name="name" value="" class="form-control" required autofocus>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="name"
                                       class="col-sm-4 col-form-label text-md-right">{{ __('Nazwisko') }}</label>
                                <div class="col-md-6">
                                    <input type="text" name="surname" value="" class="form-control">

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name"
                                       class="col-sm-4 col-form-label text-md-right">{{ __('Telefon') }}</label>
                                <div class="col-md-6">
                                    <input type="text" name="mobile" value="" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-sm-4 col-form-label text-md-right">{{ __('E-mail') }}</label>
                                <div class="col-md-6">
                                        <input type="email" name="email" value="" class="form-control">
                                    </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-sm-4 col-form-label text-md-right">{{ __('Usługa') }}</label>
                                <div class="col-md-6">
                                        <select name="service_id" value="" class="form-control">
                                            @foreach($services as $key => $val)
                                                <option value="{{$key}}">{{$val}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-sm-4 col-form-label text-md-right">{{ __('Data') }}</label>
                                <div class="col-md-6">
                                        <input type="date" name="date" id="my-date-input" value="" class="form-control">
                                    </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-sm-4 col-form-label text-md-right">{{ __('Godzina') }}</label>
                                <div class="col-md-6">
                                        <select name="time" value="" class="form-control">
                                            <option class="option" id="10:00:00" value="10:00">10:00</option>
                                            <option class="option" id="10:30:00" value="10:30">10:30</option>
                                            <option class="option" id="11:00:00" value="11:00">11:00</option>
                                            <option class="option" id="11:30:00" value="11:30">11:30</option>
                                            <option class="option" id="12:00:00" value="12:00">12:00</option>
                                            <option class="option" id="12:30:00" value="12:30">12:30</option>
                                        </select>
                                    </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">Zapisz</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
</div>

    <script>
        $('input[type="date"]').change(function () {
            var datetime = <?php echo json_encode($time, JSON_PRETTY_PRINT) ?>;

            var n = document.getElementsByClassName('option');
            for (var i = 0; i < n.length; i++) {
                n[i].disabled = false;
            }
            for (let i = 0; i < datetime.length; i++) {
                if (datetime[i].date == this.value) {
                    let time = datetime[i].time;
                    console.log(time);
                    document.getElementById(time).disabled = true;
                }
            }
        });

        var now = new Date(),
            minDate = now.toISOString().substring(0,10);
        $('#my-date-input').prop('min', minDate);

    </script>

@endsection