@extends("layouts.app")

@section("title","Главная")
@section("content")






<div class="addInputs">
		<button id="add" type="button" class="btn btn-primary">Добавить кнопку</button>

		<button id="edit--open" type="button" class="btn btn-primary">Показать названия</button>
		<button id="edit--close" type="button" class="btn btn-primary">Скрыть названия</button>

		<button id="preview" type="button" class="btn  btn-dark">Предпосмотр</button>

		<div class="edit edit-tp btn-warning"></div>Редактирование
		<div class="edit edit-tp btn-primary"></div> Перемещение
	</div>


	<div class="inputs">
		<div class="abs">
			<div class="text"></div>

			<div class="inputs--area">
				<input class="btn  btn-outline-primary">
				<input class="name" maxlength="15" type="text">
				<div class="edit btn-warning"></div>
			</div>
		</div>

		<div class="abs">
			<div class="text"></div>

			<div class="inputs--area">
				<input class="btn  btn-outline-primary">
				<input class="name" maxlength="15" type="text">
				<div class="edit btn-warning"></div>
			</div>
		</div>

		<div class="abs">
			<div class="text"></div>
			
			<div class="inputs--area">
				<input class="btn  btn-outline-primary">
				<input class="name" maxlength="15" type="text">
				<div class="edit btn-warning"></div>
			</div>
		</div>

	</div>

	<div class="download">
	<div class="download--zone">
		<input type="file" id="profile_pic" name="profile_pic" accept=".jpg, .jpeg, .png" onchange="previewFile()"><br>
	</div>
	<div class="download--image">
		<img src="" height="" alt="Image preview..." download>
	</div>
</div>

	<!--
	<div class="drag">
		<img src='https://i.postimg.cc/TYj2mm0K/39443-html-30da2d66.jpg' border='0' alt='39443-html-30da2d66' />
	</div>
	-->
	<div class="save">
		<button class="btn save--image btn-success">Сохранить</button>
		<div class="box"></div>
	</div>


@endsection
