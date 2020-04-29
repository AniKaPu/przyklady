
let cookie = new Cookie(true);
cookie.init();

$('.wpcf7-list-item-label a').click(function (e) {
    e.preventDefault();
});

var galleryId = 1;
$('.wp-block-gallery').each(function(i, s){
    var $this = $(this);
    $this.attr('id', galleryId++);
    var figcaption = $this.find('figcaption');
    if (figcaption.length > 0) {
        figcaption.each(function () {
            var figitem = $(this);
            var figtext = figitem[0].outerText;
            figitem.parent().find('a').attr('data-caption', figtext)
        });
    }
    $this.find('a').attr('data-fancybox', galleryId);
});


var allImg = document.querySelectorAll('img');
var siteName = document.body.getAttribute('data-site');
if (allImg !== null){
[...allImg].forEach(function(el){
    var alt = el.getAttribute('alt');
    if ((alt === null) || (alt === '') ){
        el.setAttribute('alt', siteName );
    }
})
}

var actuelsSlider = new Swiper ('#actuelsSlider',{
    slidesPerView: 1,
    spaceBetween: 30,
    centeredSlides: true,
    grabCursor: true,
    breakpoints:{
        720:{
           slidesPerView:2,
            spaceBetween:30,
        },
        1200:{
            slidesPerView:3,
            spaceBetween:30,
        }
    },
    navigation: {
        nextEl: '.post-button-next',
        prevEl: '.post-button-prev',
      },
});

/////funkcja do fixed menu 
var scrollDelta = 5;
var elementPosition = $('.navbar').offset(); 
var prevScrollpos = window.pageYOffset; 
$(window).scroll(function(){
    var currentScrollPos = window.pageYOffset; 
        if($(window).scrollTop() > elementPosition.top - 70){ 
            var deltaNow = prevScrollpos + currentScrollPos;
            if((prevScrollpos > currentScrollPos)
             && ($(window).scrollTop() > elementPosition.top - 70)){ 

              $('.navbar').addClass('scrollingUp');
              $('.navbar').removeClass('navbarDefault');
             
        }else { // to się dzieje jeżeli scrollowanie jest w dół
            $('.navbar').removeClass('scrollingUp');
           
            $('.page-content').addClass('pageContentOnScrol');
        }   
        prevScrollpos = currentScrollPos; 
    } else{ 
            $('.navbar').removeClass('scrollingUp');
            $('.navbar').addClass('navbarDefault');
            $('.page-content').addClass('pageContentOnScrol');
            
           
            
    }
});



