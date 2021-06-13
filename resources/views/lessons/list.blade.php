@extends("layouts.app")

@section("title","Группы")

@section("content")

<div class="container">
    <h1>Админка</h1>
    <div class="d-flex w-100 justify-content-between my-2">
        <div class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Добавить предмет</div>
    </div>

        <table>
            <tr>
                <td>Название</td>
                <td>Удалить</td>
            </tr>
            @foreach($lessons as $lesson)
                <tr>
                    <td>{{$lesson->name}}</td>
                    <td>
                        <button class="btn btn-danger delete-lesson" id="{{$lesson->id}}"><i class="fas fa-times"></i></button>
                    </td>
                </tr>
            @endforeach
        </table>
    @if(count($lessons) == 0)
        <div class="alert alert-warning">Lessons not found</div>
    @endif
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Добавить предмет</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="form-group">
                            <label for="name">Введите название:</label>
                            <input id="name" class="form-control" placeholder="Название предмета" type="text">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                    <button type="button" class="btn btn-primary add-lesson">Добавить</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
