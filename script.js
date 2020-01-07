function reset() {
	$('#container').html('');
}


function printConfig(data) {

	reset();

	var target = $("#container");

	var template = $("#box-template").html();
	var compiled = Handlebars.compile(template);

	for (var i = 0; i < data.length; i++) {
		var tab = data[i];
		var tabHTML = compiled(tab);
		target.append(tabHTML);
	}

}


function getAllConfig() {

	$.ajax({

		url: 'getAllConfigs.php',
		mathod: 'GET',
		success: function (data) {

			printConfig(data);
		},
		error: function (error) {

			console.log('error', error);
		}
	});
}


function addNewConfig() {

	var x = $(this);

	$.ajax({

		url: "addNewConfig.php",
		method: "POST",
		data: x.serialize(),

		success: function (data) {

			if (data) {
				getAllConfig();
			}
		},

		error: function (error) {
			console.log("error", error);
		}
	});

	return false;

}


function init() {

	getAllConfig();
	$('#myForm').submit(addNewConfig);
}


$(window).ready(init);
