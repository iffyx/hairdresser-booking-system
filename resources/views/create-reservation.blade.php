@extends('layouts.welcome')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Rezerwacja') }}</div>

                    <div class="card-body">
                        <form action="{{ route('store2') }}" method="POST">
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
                                        <input type="date" name="date" value="" class="form-control">
                                    </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-sm-4 col-form-label text-md-right">{{ __('Godzina') }}</label>
                                <div class="col-md-6">
                                        <select name="time" value="" class="form-control">
                                            <option class="option" id="9:00:00" value="9:00">9:00</option>
                                            <option class="option" id="9:30:00" value="9:30">9:30</option>
                                            <option class="option" id="10:00:00" value="10:00">10:00</option>
                                            <option class="option" id="10:30:00" value="10:30">10:30</option>
                                            <option class="option" id="11:00:00" value="11:00">11:00</option>
                                            <option class="option" id="11:30:00" value="11:30">11:30</option>
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
        var words = <?php echo json_encode($time, JSON_PRETTY_PRINT) ?>;

        var n = document.getElementsByClassName('option');
        for (var i = 0; i < n.length; i++) {
            n[i].disabled = false;
        }
        for (let i = 0; i < words.length; i++) {
            if (words[i].date == this.value) {
                let time = words[i].time;
                console.log(time);
                document.getElementById(time).disabled = true;
            }
        }
    });
</script>
@endsection