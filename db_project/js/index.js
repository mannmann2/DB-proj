$(document).ready(function(e)
{
	$.ajax({
	  url: "localhost/db/get.php"
	}).done(function(data) {
	  	$('#movieList').html(data);  
	  });
});