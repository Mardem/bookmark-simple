
<!-- Modal -->
<div class="modal fade" id="modal-hours" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Novo horário</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('save-hours') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="day">Dia da semana</label>
                        <select name="day_id" class="form-control">
                            @foreach($days as $day)
                                <option value="{{ $day->id }}">{{ $day->day_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="hour">Hora na semana</label>
                        <input type="time" id="hour" class="form-control" name="hour">
                    </div>
                    <button class="btn btn-sm btn-success">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal-days" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Novo dia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('bookmark.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="day">Dia da semana</label>
                        <input type="text" name="day_name" class="form-control" placeholder="Digite o dia da semana">
                    </div>

                    <button class="btn-success btn-sm" type="submit">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</div>
