let popup = $(".popUp");
let overlay = $(".overlay");

function valueByName(name) {
	return $(`input[name="${name}"]`).val()
}

$.ajaxSetup(
	{
		headers: {
			"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
		}
	}
)

$(".overlay").on("click", function (e) {
	$(popup).addClass("none");
	$(overlay).addClass("none");
	$('.popUp input').val("");
})


/*  Добавление */
$(".add").on("click", function (e) {
	e.preventDefault();
	$(popup).removeClass("none");
	$(overlay).removeClass("none");
	$(".add-success").removeClass("none");
})

$(".add-group").on("click", function (e) {
	e.preventDefault();
	$(popup).addClass("none");
	$(overlay).addClass("none");

	let text = $(".popUp input").val();
	$(".add-success").addClass("none");
	let data = {
		name: valueByName("name"),
		slim_name: valueByName("subname")
	}
	if (data.name != "" && data.name != null) {
		$.ajax({
			url: "/group",
			data: data,
			type: "POST",
			methods: "POST",
			success(resp) {
				$(".groups_list tr:last-of-type").after(`<tr><td class="group">${resp.group.name}</td></tr>`)
				$("#myInput").val("")
			}
		})
	} else {
		alert("Заполнены не все обязательные данные")
		return false;
	}
	$('.popUp input').val("");
})



$(".remove-group").on("click", function (e) {
	e.preventDefault();
	let id = $(this).attr("data-id")
	$(this).parent().remove();
	$.ajax({
		url: "/group/" + id,
		type: "delete",
		methods: "delete",
		success(e) {
			console.info("Group was deleted")
		}
	})
})

/* ======================================== */

$(document).ready(function () {
	$("#myInput").on("keyup", function () {
		var value = $(this).val().toLowerCase();
		$("table tr").filter(function () {
			$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
		});
	});
});


/* Координаты */

$(".abs").draggable();

function editor() {
	$(".edit").on("click", function () {
		let w = prompt("Введите ширину") + "px";
		let h = prompt("Введите высоту") + "px";

		let sibl = $(this).siblings(".btn");
		sibl.css("width", w);
		sibl.css("height", h);
	})
}

for (let c = 0, dist = 20; c < $(".abs").length; c++, dist += 240) {
	($(".abs")[c]).style.left = dist + "px"; // Удобное расположение элементов
}

$(".save button").on("click", function (e) {
	e.preventDefault();
	let inputs = $(".abs");
	let array = [];
	for (let i = 0, id = 0; i < inputs.length; i++, id++) {
		let nameofObj = inputs[i].querySelector('.name').value;
		let obj = {
			id: id,
			name: nameofObj,
			x: inputs[i].offsetLeft,
			y: inputs[i].offsetTop,
		}
		array.push(obj);
	}
	let arrJSON = JSON.stringify(array);
	console.log(arrJSON);



	$.ajax({
		url: '...',         /* Куда пойдет запрос */
		method: 'get',
		dataType: 'json',
		data: arrJSON,
		success: function (data) {
			console.log(data);
		}
	});
})

$("#add").on("click", function (e) {
	e.preventDefault();
	$(".addInputs").append('<div class="abs"><input class="btn  btn-outline-primary"><input class="name" maxlength="15" type="text"><div class="edit btn-warning"></div></div>');
	$(".abs").draggable();

	editor();
})



editor();

$("#edit--open").on("click", function (e) {
	e.preventDefault();
	$(".name").removeClass("none");
})

$("#edit--close").on("click", function (e) {
	e.preventDefault();
	$(".name").addClass("none");
})

$("#preview").on("click", function (e) {
	e.preventDefault();

})

/* Прелоадер картинки */
function previewFile() {
	var preview = document.querySelector('img');
	var file = document.querySelector('input[type=file]').files[0];
	var reader = new FileReader();

	reader.onloadend = function () {
		preview.src = reader.result;
	}

	if (file) {
		reader.readAsDataURL(file);
	} else {
		preview.src = "";
	}
}





//Students


$(".add").on("click", function (e) {
	e.preventDefault();
	$(popup).removeClass("none");
	$(overlay).removeClass("none");
})

$(".student-add").on("click", function (e) {
	e.preventDefault();
	$(popup).addClass("none");
	$(overlay).addClass("none");

	let text = "" + $("#name").val() + " " + $("#surname").val() + " " + $("#middlename").val();

	let data = {
		"name": text,
		"group_id": $(".group_id").attr("id")
	}
	if (data.name != "") {
		$.ajax({
			url: "/students",
			data: data,
			type: "POST",
			methods: "POST",
			success(resp) {
				$("table").append('<tr><td  class="group"><div>' + text + '</div><button type="button" class="btn remove btn-danger">Удалить студента</button></td></tr>');
				$('.popUp input').val("");
			}
		})
	}
	else {
		alert("Заполните все обязательные данные")
	}
})


