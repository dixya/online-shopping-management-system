$(document).ready(function() 
{
	$( "#slider_price" ).slider({
				range: true,
				min: 0,
				max: 10000,
				step:500,
				values: [ 0, 10000 ],
				slide: function( event, ui ) {
					$( "#app_min_price" ).text(ui.values[0] + "$");
					$( "#app_max_price" ).text(ui.values[1] + "$");

					$( "#min_price" ).val(ui.values[0]);
					$( "#max_price" ).val(ui.values[1]);
				},
				stop: function( event, ui ) {
					var nr_total = getEstatesNumber(ui.values[0], ui.values[1]);
					$("#number_results").text(nr_total);
					update_products();
				},
	});
	$("#app_min_price").text( $("#slider_price").slider("values", 0) + "$");
	$("#app_max_price").text( $("#slider_price").slider("values", 1) + "$");	
});
function getEstatesNumber(min_price, max_price)
{
	var number_of_estates = 0;
    $.ajax(
    {
        type: "POST",
		url: 'estates.php',
        dataType: 'json',
		data: {'minprice': min_price, 'maxprice':max_price},
        async: false,
        success: function(data)
        {
			number_of_estates = data;
        }
    });
    return number_of_estates;
}


function update_products(){

min_value = jQuery("#min_price").val();
max_value = jQuery("#max_price").val();
	$.ajax({
        type: 'POST',
        url: 'http://localhost/online_shopt/ajax.php',
        data: {min_price:min_value, max_price:max_value},
        success: function(data) {
            jQuery("#data_product").html(data);
        }
   
})
}