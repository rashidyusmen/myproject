$(document).ready(function() {

	var getid = $('#buyid').val();

	$('#buy').click(function() {
		window.location = "index.php?frontcontroller=orders&id=" + getid;
	});

	setInterval(function() {
		$.ajax({
			url: 'index.php?frontcontroller=orders&frontaction=basket',
			success: function(t) {
				if (t > 0) {
					$('#basket').css('color', 'blue');
				} else {
					$('#basket').css('color', 'red');
				}
				$('#basket').html(t);
			}
		});
	}, 1000);


	//Chat functionality
	if ($('div.chat').length > 0) {

		var sendmsg = function() {
			$.ajax({
				url: 'index.php?frontcontroller=chat&frontaction=index',
				type: 'post',
				data: {
					msg: $('#webmsg').val()
				},
				success: function(t) {

					var dt = new Date();
					var dateString = dt.getFullYear() + '-' + ((dt.getMonth()+1) < 10 ? '0' + (dt.getMonth()+1) : dt.getMonth()) + '-' + dt.getDate() + ' ' + dt.getHours() + ':' + ((dt.getMinutes() < 10)?('0' + dt.getMinutes()):dt.getMinutes()) + ':' + dt.getSeconds();

					$('#chatcontainerweb').val($('#chatcontainerweb').val() + '[' + dateString + '] ' + $('#webusername').val() + ': ' + $('#webmsg').val() + '\n');

					$('#webmsg').val('');
				}
			});
		}

		var loadmessages = function() {
			$.ajax({
				url: 'index.php?frontcontroller=chat&frontaction=loadrecent',
				success: function(t) {
					$('#chatcontainerweb').val('');
					var json = $.parseJSON(t);
					$.each(json, function(index, value) {
						$('#chatcontainerweb').val($('#chatcontainerweb').val() + '[' + value.date_added + '] ' + value.username + ': ' + value.msg + '\n');
					});
				}
			});
		}

		$('#webmsg').on('keyup', function(e) {
			if (e.keyCode == 13) {
				sendmsg();
			}
		});

		$('#webchatsend').click(function() {
			sendmsg();
		});

		setInterval(function() {
			loadmessages();
		}, 10000);

		//load messages on page load.
		loadmessages();
	}

});