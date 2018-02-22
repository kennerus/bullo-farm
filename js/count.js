$(document).on('click', '.minus', function () {
    var $input = $(this).parent().find('input');
    var count = parseInt($input.val()) - 10;
    count = count <= 1 ? 0 : count;
    $input.val(count);
    $input.change();
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
    var $input = $(this).parent().find('input');
    $input.val(parseInt($input.val()) + 10);
    $input.change();
    return false;
});

$(document).on('click', '.minus-p', function () {
    var $input = $(this).parent().find('input');
    var count = parseInt($input.val()) - 10;
    var counter = count + '%';
    if(count <= 0) {
        console.log(123)
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
    $input.val(counter);
    $input.change();
    return false;
});