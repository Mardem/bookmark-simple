@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="#desgraca">Sai daqui desgraça</a>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <button type="button" class="btn btn-primary btn-sm float-right ml-2" data-toggle="modal" data-target="#modal-days">
                            Novo dia
                        </button>
                        <button type="button" class="btn btn-primary btn-sm float-right " data-toggle="modal" data-target="#modal-hours">
                            Novo horário
                        </button>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <p>Dias da semana</p>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Dia</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($days as $day)
                                        <tr>
                                            <td scope="row">{{ $day->id }}</td>
                                            <td>{{ $day->day_name }}</td>
                                            <td>Editar | Apagar</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-sm-6">
                                <p>Horários dos dias</p>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Dia</th>
                                        <th>Hora</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($hours as $hour)
                                        <tr>
                                            <td scope="row">{{ $hour->id }}</td>
                                            <td>{{ $hour->day->day_name }}</td>
                                            <td>{{ $hour->hour }}</td>
                                            <td>Editar | Apagar</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center" style="margin-top: 50px">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h3>Faça seu agendamento</h3>

                        <form action="{{ url('save-bookmark') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="days">Dia</label>
                                        <select name="day" id="days" class="form-control">
                                            <option>--- Selecione ---</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6" id="col-hour" style="display: none">
                                    <div class="form-group">
                                        <label for="hour">Hora</label>
                                        <select name="hours" id="hours" class="form-control"></select>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <button class="btn btn-danger" id="desgraca">Oi</button>
    <br><br><br>
    @component('bookmark.components.modals', ['days' => $days])@endcomponent

@endsection
@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script>
        $(document).ready(() => {
            $.get(window.location.origin + '/api/hours-day')
                .then((response) => {
                    let html = '';
                    response.forEach((e) => {
                        html += `<option value="${e.id}">${e.day_name}</option>`
                    });

                    $('#days').append(html);
                }).catch((err) => {
                alert('Houve um erro ao carregar os dados');
            });

            $('#days').on('change', function () {
                $.get(window.location.origin + '/api/get-hours-by-day', {
                    'id': $(this).val()
                }).then((response) => {
                    let html = '';

                    response.forEach((e) => {
                        html += `<option value="${e.hour}">${e.hour}</option>`
                    });
                    $('#hours').html(html);

                    $('#col-hour').css('display', 'block');
                }).catch((err) => {
                    console.log('erro', err)
                })
            })
        });
    </script>
@endpush
