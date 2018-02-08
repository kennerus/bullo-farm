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

if (idHeader) {
    idHeader.addEventListener('click', function() {
        openList(idHeader, 'filter__select_list', 'filter__select');
    });

    replaceSubject(idHeader, 'filter__select_list', 'filter__select_active');
}
if (idDelivery) {
    idDelivery.addEventListener('click', function() {
        openList(idDelivery, 'filter__select_list', 'filter__select');
    });
    replaceSubject(idDelivery, 'filter__select_list', 'filter__select_active');
}

//tabs 
function openTab(evt, tabName) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].classList.remove('db');
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" modal__nav_active", "");
    }

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(tabName).classList.add('db')
    evt.currentTarget.className += " modal__nav_active";
}

// // Get the element with id="defaultOpen" and click on it
// var defaultOpen = document.getElementsByClassName("defaultOpen");



// if(defaultOpen) {
//     defaultOpen.click();
// }


$(function () {

    // $('#preorder__tel').mask('+7 (999) 999-99-99');

    $(document).on('click', '.send-request', function(event) {
        event.preventDefault();

        $('.fancybox-close-small').click();
        $('#sent').fadeIn();

        return false;
    })

    $(document).on('click', '.sent__close, .sent__overlay', function() {
        $('#sent').fadeOut();
    })

    $('[data-fancybox]').fancybox({
        smallBtn : true,
        buttons: false
    })

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

        $('.news__blocks').slick({
            dots: true,
            slidesToShow: 1,
            centerMode: true,
            appendArrows: false,
            variableWidth: true,
            infinite: true
        })
    }

});