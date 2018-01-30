// open subject list
var id = document.getElementById('header_select');

function openList(subject, subjectList) {
    var list = subject.querySelector('.' + subjectList);

    subject.querySelector('img').classList.toggle('rotate180');
    list.classList.toggle('open_list');

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

id.addEventListener('click', function() {
    openList(id, 'filter__select_list');
});

replaceSubject(id, 'filter__select_list', 'filter__select_active');

$(document).ready(function () {
    $('.catalogue__slider').slick({
        slidesToShow: 3,
        slidesToScroll: 3,
        appendArrows: $('.catalogue-index__nav')
    })
});