$(document).ready(function() {

	$('.complete').on('change', function() {
		var complete = 0;
		if ($(this).is(':checked')) {
			complete = 1;
		}
		$this = $(this);

		$.ajax({
			url: 'index.php?controller=orders&action=completeorder&id=' + $(this).val() + '&is_complete=' + complete,
			success: function() {
				if ($this.is(':checked')) {
					$this.parents('tr').css('background', 'lightGreen');
				} else {
					$this.parents('tr').css('background', 'white');
				}
			}
		});
	});

	//Chat functionality
	if ($('div.chat').length > 0) {

		var sendmsg = function() {
			$.ajax({
				url: 'index.php?controller=chat&action=sendmsg',
				type: 'post',
				data: {
					msg: $('#msg').val()
				},
				success: function(t) {

					var dt = new Date();
					var dateString = dt.getFullYear() + '-' + ((dt.getMonth()+1) < 10 ? '0' + (dt.getMonth()+1) : dt.getMonth()) + '-' + dt.getDate() + ' ' + dt.getHours() + ':' + ((dt.getMinutes() < 10)?('0' + dt.getMinutes()):dt.getMinutes()) + ':' + dt.getSeconds();

					$('#chatcontainer').val($('#chatcontainer').val() + '[' + dateString + '] ' + $('#username').val() + ': ' + $('#msg').val() + '\n');

					$('#msg').val('');
				}
			});
		}

		var loadmessages = function() {
			$.ajax({
				url: 'index.php?controller=chat&action=loadrecent',
				success: function(t) {
					$('#chatcontainer').val('');
					var json = $.parseJSON(t);
					$.each(json, function(index, value) {
						$('#chatcontainer').val($('#chatcontainer').val() + '[' + value.date_added + '] ' + value.username + ': ' + value.msg + '\n');
					});
				}
			});
		}

		$('#msg').on('keyup', function(e) {
			if (e.keyCode == 13) {
				sendmsg();
			}
		});

		$('#chatsend').click(function() {
			sendmsg();
		});

		setInterval(function() {
			loadmessages();
		}, 10000);

		//load messages on page load
		loadmessages();
	}

	setInterval(function() {
		$.ajax({
			url: 'index.php?controller=chat&action=loadunread',
			success: function(t) {
				if (t > 0) {
					$('#chatcnt').css('color', 'red');
				} else {
					$('#chatcnt').css('color', 'black');
				}
				$('#chatcnt').html(t);
			}
		});
	}, 30000);
});