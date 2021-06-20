$(document).ready(function() {
    

    $('#city-list').change(function() {
        // var state= $('#country-list').val();
        // alert("in handler");
        var city = $('#city-list').val();
        // alert(state+"," +city+","+"hello");
        // alert(city+","+"hello");
        console.log(city);
        listRecords(city);
    });
    
   
});

function listRecords(city){
    $.ajax({
		type: "POST",
		url: "../general/search-general.php",
		data: 'city='+city,
		success: function(data){
			$('tbody').html(data);
		}
	});
}