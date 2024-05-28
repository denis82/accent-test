@extends('web.layouts.layout')

@section('content')

<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    Список городов
                </h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Город</th>
                            <th style="width: 40px">Действие</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($model as $item)
                            <tr class="nav-pills">
                                <td>
                                    {{ $item['id']}}.
                                </td>
                                <td><a href="{{ '/' . $item['slug'] }}"
                                        class="nav-link {{ request()->is($item['slug']) ? 'active' : null }}">
                                        {{ $item['name']}}
                                    </a></td>
                                <td>
                                    <form action="{{ route('destroy.city', ['id' => $item['id']])}}" method="post"
                                        class="float-left">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" title="Удалить город"
                                            onclick="return confirm('Подтвердите удаление')">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Добавление города</h3>
            </div>
            <form id="formCity">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Город</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                            placeholder="Название города">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Символьный код</label>
                        <input type="text" name="slug" class="form-control" id="exampleInputPassword1"
                            placeholder="Символьный код">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Описание</label>
                        <input type="text" name="description" class="form-control" id="exampleInputPassword1"
                            placeholder="Описание">
                    </div>
                </div>
                <div class="card-footer">
                    <button id="addCity" type="button" class="btn btn-primary">Сохранить</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    window.onload = function () {
        $("#addCity").on("click", function () {
            var form = $("#formCity").serialize();
            console.log(form);

            $.ajax({
                url: "{{ route('create.city')}}",
                type: "POST",
                data: form,
                headers: {
                    "X-CSRF-Token": $('meta[name="csrf-token"]').attr("content")
                },

                success: function (data) {
                    window.location.reload();
                },
                error: function (msg) {

                    Object.keys(msg.responseJSON.errors).map(function (key) {
                        $('input[name=' + key + ']').addClass('is-invalid');
                        $('.alert-danger').append('<p>' + msg.responseJSON.errors[key] + '</p>');
                    });
                    $('.alert-danger').show();
                    alert("Ошибка");
                }
            });
        });
    };

</script>
@endsection()
