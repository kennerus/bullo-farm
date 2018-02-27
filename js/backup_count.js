$(document).on('click', '.minus', function () {
    var $input = $(this).parent().find('input');
    var count = parseInt($input.val()) - 1;
    count = count < 1 ? 0 : count;
    $input.val(count);
    $input.change();
	id = $(this).parents('.modal_desc').attr('id').replace('modal_desc','');

	var currentModal = $('#modal2'+id);
	currentModal.find('.order__desc-number').first().text(count + ' шт.');
	currentModal.find('#order__desc-number2').val(count);
	var oneItemCost = $(this).parents('.modal_desc').find('.price__one-item');
	var allItemsCost = oneItemCost.html() * count;
	var prepayVal = $(this).parents('.modal_desc').find('.prepay input').attr('value').slice(0, -1);
	
	currentModal.find('.order__desc-number .crossed').html(allItemsCost);
	$(this).parents('.modal_desc').find('.prepay').val();
	currentModal.find('.order__desc-number .final__pirce').html(allItemsCost);
    return false;
});

$(function() {
    var countInputs = $('.catalogue-pre__number-preorder input');
    countInputs.each(function() {
        if($(this).val() === '') {
            $(this).val('0');
        }
    })
})

$(document).on('click', '.plus', function () {
	id = $(this).parents('.modal_desc').attr('id').replace('modal_desc','');
	var currentModal = $('#modal2'+id);
    var $input = $(this).parent().find('input');
    $input.val(parseInt($input.val()) + 1);
    $input.change();
	currentModal.find('.order__quantity .order__desc-number').first().text($input.val() + ' шт.');
	currentModal.find('#order__desc-number2').val($input.val());

	var prepayVal = $(this).parents('.modal_desc').find('.prepay input').attr('value').slice(0, -1);
	var oneItemCost = $(this).parents('.modal_desc').find('.price__one-item');
	var allItemsCost = oneItemCost.html() * $input.val();
	currentModal.find('.order__desc-number .crossed').html(allItemsCost);
	

    return false;
});

$(document).on('click', '.minus-p', function () {
    var $input = $(this).parent().find('input');
    var count = parseInt($input.val()) - 10;
    var counter = count + '%';
    $input.attr('value', count);
    if(count <= 0) {
        $input.val('0');
    }
    else {
        $input.val(counter);
    }
    $input.change();
    return false;
});

$(document).on('click', '.plus-p', function () {
    var $input = $(this).parent().find('input');
    var count = parseInt($input.val()) + 10;
    var counter = count + '%';
    $input.attr('value', count);
    $input.val(counter);
    $input.change();
    return false;
});

