@extends("layouts.app")

@section("title","Главная")
@section("content")

<h1>Загрузите документ</h1>
<div class="download">
	<div class="download--zone">
		<input type="file" id="profile_pic" name="profile_pic" accept=".jpg, .jpeg, .png" onchange="previewFile()"><br>
		<button class="btn btn-success download--docs">Загрузить</button>
	</div>
	<div class="download--image">
		<img src="" height="200" alt="Image preview...">
	</div>
</div>


<!--
<div class="addInputs">
		<button id="add" type="button" class="btn btn-primary">Добавить кнопку</button>
		<div class="edit edit-tp btn-warning"></div>Редактирование
		<div class="edit edit-tp btn-primary"></div> Перемещение
	</div>

	<div class="inputs">
		<div class="abs">
			<input class="btn  btn-outline-primary">
			<input class="name" maxlength="15" type="text">
			<div class="edit btn-warning"></div>
		</div>

		<div class="abs">
			<input class="btn  btn-outline-primary">
			<input class="name" maxlength="15" type="text">
			<div class="edit btn-warning"></div>
		</div>

		<div class="abs">
			<input class="btn  btn-outline-primary">
			<input class="name" maxlength="15" type="text">
			<div class="edit btn-warning"></div>
		</div>

	</div>
	<div class="drag">
		<img src='https://i.postimg.cc/TYj2mm0K/39443-html-30da2d66.jpg' border='0' alt='39443-html-30da2d66' />
	</div>
	<div class="save">
		<button class="btn btn-success">Сохранить</button>
	</div>
-->

@endsection
