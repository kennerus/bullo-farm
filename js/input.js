$('.another_place').focus(function () {
	$(this).addClass('activeInput');
	$(this).siblings('input[name="where_deliver"]').removeAttr('checked');
})

$(document).on('click', ('label[for="to_techpark"]'), function() {
	$(this).siblings('input[name="where_deliver"]').attr('checked', '');
	$(this).siblings('.activeInput').removeClass('activeInput');
})