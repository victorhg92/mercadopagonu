function checkout(){
	$.ajax({
		method: "POST",
		headers: {
			"X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content");
		},
		success: function(){			

		}
	});
}