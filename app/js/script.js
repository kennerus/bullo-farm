// contacts subject list
var subject = document.getElementById('header_select');
var subjectList = document.querySelector('.filter__select_list');

// open subject list
subject.addEventListener('click', function() {
    subject.querySelector('img').classList.toggle('rotate180');
    subjectList.classList.toggle('open_subject');

    if (subjectList.style.maxHeight) {
        subjectList.style.maxHeight = null;
    }
    else {
        subjectList.style.maxHeight = subjectList.scrollHeight + 30 + "px";
    }
})

// change subject
function replaceSubject() {
    var activeSubject = document.querySelector('.filter__select_active');
    var subjectElement = subjectList.querySelectorAll('li');

    for(var i = 0; i < subjectElement.length; i++) {
        subjectElement[i].addEventListener('click', function() {
            activeSubject.innerHTML = activeSubject.innerHTML.replace(activeSubject.innerHTML, this.innerHTML);
        });
    }
}
replaceSubject();

$(document).ready(function() {
    $('.catalogue__slider').slick({
        slidesToShow: 3,
        slidesToScroll: 3,
        appendArrows: $('.catalogue-index__nav')
    })
})