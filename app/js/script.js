// open subject list
var idHeader = document.getElementById('header_select');
var idDelivery = document.getElementById('delivery_select');
function openList(subject, subjectList, filterWrap) {
    var list = subject.querySelector('.' + subjectList);
    var wrap = subject.querySelector('.' + filterWrap);

    subject.querySelector('img').classList.toggle('rotate180');
    list.classList.toggle('open_list');
    wrap.classList.toggle('filter__select_opened');

    if (list.style.maxHeight) {
        list.style.maxHeight = null;
    }
    else {
        list.style.maxHeight = list.scrollHeight + 30 + "px";
    }
}

// change subject
function replaceSubject(subject, subjectList, activeSubject) {
    var list = subject.querySelector('.' + subjectList);
    var declaredSubject = subject.querySelector('.' + activeSubject);
    var subjectElement = list.querySelectorAll('li');

    for (var i = 0; i < subjectElement.length; i++) {
        subjectElement[i].addEventListener('click', function () {
            declaredSubject.innerHTML = declaredSubject.innerHTML.replace(declaredSubject.innerHTML, this.innerHTML);
        });
    }
}

idHeader.addEventListener('click', function() {
    openList(idHeader, 'filter__select_list', 'filter__select');
});
idDelivery.addEventListener('click', function() {
    openList(idDelivery, 'filter__select_list', 'filter__select');
});

replaceSubject(idHeader, 'filter__select_list', 'filter__select_active');
replaceSubject(idDelivery, 'filter__select_list', 'filter__select_active');

$(document).ready(function () {
    $('.catalogue__slider').slick({
        slidesToShow: 3,
        slidesToScroll: 3,
        appendArrows: $('.catalogue-index__nav'),
        responsive: [
            {
              breakpoint: 1024,
              settings: {
                centerMode: true,
                slidesToShow: 1,
                variableWidth: true
              }
            }
        ]
    })

    if($(window).width() < 767) {
        $('.features__blocks').slick({
            dots: true,
            slidesToShow: 1,
            centerMode: true,
            appendArrows: false,
            variableWidth: true,
            infinite: false
        })

        $('.news__blocks_slick').slick({
            dots: true,
            slidesToShow: 1,
            centerMode: true,
            appendArrows: false,
            variableWidth: true,
            infinite: true
        })
    }
});

