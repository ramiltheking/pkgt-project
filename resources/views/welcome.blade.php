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


    <div>Чтобы сохранить без обрезки, долистайте страницу до начала</div>
	<div class="download">
	<div class="download--zone">
		<input type="file" id="profile_pic" name="profile_pic"  accept=".jpg, .jpeg, .png" onchange="previewFile()"><br>

		<div class="save">
		<button class="btn save--image btn-success">Сохранить</button>
		<div class="box"></div>
	</div>

	</div>

	
	<div class="download--image">
		<img src="" alt="Image preview..." style="width: 100%;">
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
	</div>
</div>

<script type="module">  
		document.querySelector(".save--image").addEventListener("click", function(e){
			e.preventDefault();
			const { jsPDF } = window.jspdf;
			/*const doc = new jsPDF('p', 'mm', [297, 210]);*/
			const doc = new jsPDF('p', 'pt','a4',true);
			
			html2canvas(document.querySelector(".download--image")).then(function(canvas) {		
				let my_screen = canvas;	

				let w = parseInt(canvas.style.width, 10);
				let h = parseInt(canvas.style.height, 10);

				doc.addImage(my_screen, "PNG", 25, 15, 500, 419);		
				doc.save("a4.pdf");
			});			
		})  			
</script>


@endsection
