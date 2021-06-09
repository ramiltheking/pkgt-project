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
				$(".groups_list tr:last-of-type").after(`<tr><td class="group">${resp.group.name}</td></tr>`)
				$("#myInput").val("")
			}
		})
	}else{
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
		url:"/group/"+id,
		type:"delete",
		methods:"delete",
		success(e){
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
