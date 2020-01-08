function reset() {
	$('#container').html('');
}


function printConfig(configurazioni) {

	reset();

	var target = $("#container");

	var template = $("#box-template").html();
	var compiled = Handlebars.compile(template);

	for (var i = 0; i < configurazioni.length; i++) {
		var conf = configurazioni[i];
		var confHTML = compiled(conf);
		target.append(confHTML);
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


function newConfig() {

	var newTitle = prompt("New Title");
	var newDesc = prompt("New Desc");

	$.ajax({

		url: "newConfig.php",
		method: "POST",
		data: {
			title: newTitle,
			description: newDesc
		},

		success: function (data) {

			if (data === true) {

				getAllConfig();
			} else {

				switch (data) {
					case -1: console.log("conn error"); break;
					case -2: console.log("param error"); break;

					default: console.log("unknown error");
				}
			}
		},

		error: function (error) {

			console.log("error", error);
		}
	});
}


function changeConf() {
	var me = $(this);
	var id = me.data('id');

	var newTitle = prompt("New Title");
	var newDesc = prompt("New Desc");

	$.ajax({

		url: "updateConf.php",
		method: "POST",
		data: {
			id: id,
			title: newTitle,
			description: newDesc
		},
		success: function (data) {
			if (data) {
				getAllConfig();
			}
		},
		error: function (error) {
			console.log("error", error);
		}
	});
}


function deleteConf() {
	var me = $(this);
	var id = me.data('id');

	$.ajax({

		url: "deleteConf.php",
		method: "POST",
		data: { id: id },
		success: function (data) {
			if (data) {
				getAllConfig();
			}
		},
		error: function (error) {
			console.log("error", error);
		}
	});
}


function init() {
	getAllConfig();
	$('#newConf').click(newConfig);
	$(this).on('click', '.changeConf', changeConf);
	$(this).on('click', '.deleteConf', deleteConf);
}


$(window).ready(init);
