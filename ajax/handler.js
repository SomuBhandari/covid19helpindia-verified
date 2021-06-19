function getCity(val) {
	$.ajax({
		type: "POST",
		url: "../general/getcity.php",
		data:'state_id='+val,
		beforeSend: function() {
			$("#city-list").addClass("loader");
		},
		success: function(data){
			$("#city-list").html(data);
			$("#city-list").removeClass("loader");
		}
	});
}

