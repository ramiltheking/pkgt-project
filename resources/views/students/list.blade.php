@extends("layouts.app")

@section("title","Студенты группы {$group->name}")

@section("content")
<h1>Админка</h1>

<div class="buttons">
    <button type="button" class="btn add btn-success">Добавить стундента</button>
    @if(count($students) != 0)
        <input class="form-control" id="myInput" type="text" placeholder="Найти студента...">
    @endif
</div>
    @if(count($students) != 0)
        <table>
            <tr class="begin">
                <th>Список групп</th>
            </tr>
            @foreach($students as $student)
            <tr>
                <td class="group">
                    {{$student->name}}
                    <button type="button" data-id="{{$student->id}}" class="btn remove remove-student btn-danger">Удалить студента</button>
                </td>
            </tr>
            @endforeach
        </table>
    @else
        <div class="alert alert-warning">Студенты не найдены</div>
    @endif


    <div class="popUp none">
        <div>
            <div class="text">Введите имя:</div>
            <input type="text" id="name">
            <div class="text">Введите фамилию:</div>
            <input type="text" id="surname">
            <div class="text">Введите отчество</div>
            <input type="text" id="middlename">
            <input type="hidden" class="group_id" id="{{$group->id}}"> <!-- id группы-->
        </div>
        <button type="button" class="btn add-success student-add btn-primary">Добавить</button>
    </div>

    <div class="overlay none"></div>
@endsection