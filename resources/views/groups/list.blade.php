@extends("layouts.app")

@section("title","Группы")

@section("content")

<h1>Админка</h1>
<div class="buttons">
		<button type="button" class="btn add btn-success">Добавить группу</button>
		<input class="form-control" id="myInput" type="text" placeholder="Найти группу...">
	</div>
	<table class="groups_list">
        <tr>
            <th>Список групп</th>
		</tr>
        @if(count($list) != 0)
            @foreach($list as $item)
            <tr>
                <td class="group">
					<a href="/students/list?group={{$item->id}}">{{$item->name}}</a>
					<button type="button" data-id="{{$item->id}}" class="btn remove remove-group btn-danger"><i class="fas fa-times"></i></button>
				</td>
            </tr>
            @endforeach
        @else
            <div class="my-2 container">
				<div class="alert alert-danger">Группы не обнаружены</div>
			</div>
        @endif
	</table>



	<div class="popUp none">
		<div class="d-flex align-items-center flex-column">
			<div class="text">Введите название группы*:</div>
			<input type="text" name="name">
		</div>
        <div class="d-flex align-items-center flex-column">
			<div class="text">Введите сокращенное название группы:</div>
			<input type="text" name="subname">
		</div>
		<button type="button" class="btn add-success add-group none btn-primary">Добавить</button>
	</div>

	<div class="overlay none"></div>

@endsection