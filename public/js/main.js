let popup = $(".popUp");
let overlay = $(".overlay");

function valueByName(name){
	return $(`input[name="${name}"]`).val()
}

$.ajaxSetup(
	{
		headers: {
			"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")
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

$(".add-success").on("click", function (e) {
	e.preventDefault();
	$(popup).addClass("none");
	$(overlay).addClass("none");

	let text = $(".popUp input").val();
	$(".add-success").addClass("none");
	let data = {
		name: valueByName("name"),
		slim_name: valueByName("subname")
	}
	if(data.name != "" && data.name != null){
		$.ajax({
			url:"/group",
			data:data,
			type:"POST",
			methods:"POST",
			success(resp){
				console.log(resp)
				$(".groups_list tr:last-of-type").after(`<tr><td class="group">${resp.group.name}</td></tr>`)
			}
		})
	}else{
		alert("Заполнены не все обязательные данные")
		return false;
	}
	$('.popUp input').val("");
})

/* ======================================== */
/*  Удаление */
$(".remove").on("click", function (e) {
	e.preventDefault();

	$(popup).removeClass("none");
	$(overlay).removeClass("none");
	$(".btn-remove").removeClass("none");
})

$(".btn-remove").on("click", function (e) {
	e.preventDefault();

	let arr = $(".group");
	let text = $(".popUp input").val();
	for (let i = 0; i < arr.length; i++) {
		let td = $(arr[i]).text();
		if (text == td) {
			console.log($($(arr[i]).parent()).remove());
		}
	}

	$('.popUp input').val("");
	$(popup).addClass("none");
	$(overlay).addClass("none");
	$(".btn-remove").addClass("none");
	
})

/* ======================================== */