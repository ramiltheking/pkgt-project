@extends("layouts.app")

@section("title","Группы")

@section("content")

<h1>Админка</h1>
	<table class="groups_list">
        <tr>
            <th>Список групп</th>
		</tr>
        @if(count($list) != 0)
            @foreach($list as $item)
            <tr>
                <td class="group">{{$item->name}}</td>
            </tr>
            @endforeach
        @else
            <div class="alert alert-danger">Группы не обнаружены</div>
        @endif
	</table>
    {{$list->links()}}
	<div class="buttons">
		<button type="button" class="btn add btn-success">Добавить группу</button>
		<button type="button" class="btn filter btn-warning">Фильтровать группу</button>
		<button type="button" class="btn remove btn-danger">Удалить группу</button>
	</div>

	<div class="popUp none">
		<div>
			<div class="text">Введите название группы*:</div>
			<input type="text" name="name">
		</div>
        <div>
			<div class="text">Введите сокращенное название группы:</div>
			<input type="text" name="subname">
		</div>
		<button type="button" class="btn add-success none btn-primary">Добавить</button>
		<button type="button" class="btn btn-remove none btn-primary">Удалить</button>
	</div>

	<div class="overlay none"></div>

@endsection