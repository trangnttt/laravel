// get country local ip
$.ajax( "https://extreme-ip-lookup.com/json/" )
.done(function(response) {
  $("#country").html(response.country);
  $.get('https://api.openweathermap.org/data/2.5/weather?q='+ response.country +'&appid=d40c03017c03d0394354ac0941e2b271&units=metric', function(wResponse){
    $("#weather").html(wResponse.main.temp_max+'&#8451;, '+ wResponse.name);
  })
});

