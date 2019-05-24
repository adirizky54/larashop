$('[data-toggle="tooltip"]').tooltip()

var swiperbanner = new Swiper('#shop-hero-slider', {
    speed: 1000,
    loop: true,
    threshold: 50,
    autoplay: {
        delay: 5000
    },
    pagination: {
        el: '.swiper-pagination',
        dynamicBullets: true,
    }
});
var swiperlatest = new Swiper('#latest-product', {
    slidesPerView: 5,
    slidesPerGroup: 5,
    spaceBetween: 15,
    loopFillGroupWithBlank: true,
    breakpoints: {
        992: {
            slidesPerView: 4,
            slidesPerGroup: 4,
            spaceBetween: 15,
        },
        768: {
            slidesPerView: 3,
            slidesPerGroup: 3,
            spaceBetween: 15,
        },
        640: {
            slidesPerView: 2,
            slidesPerGroup: 2,
            spaceBetween: 15,
        },
        320: {
            slidesPerView: 1,
            slidesPerGroup: 1,
            spaceBetween: 5,
        }
    },
    nextButton: ".swiper-jwl .swiper-button-next",
    prevButton: ".swiper-jwl .swiper-button-prev",
});
var swiperfeatured = new Swiper('#product-featured', {
    slidesPerView: 5,
    slidesPerColumn: 2,
    spaceBetween: 15,
    breakpoints: {
        1024: {
            slidesPerView: 4,
            slidesPerColumn: 2,
            spaceBetween: 15,
        },
        768: {
            slidesPerView: 3,
            slidesPerColumn: 2,
            spaceBetween: 15,
        },
        640: {
            slidesPerView: 2,
            slidesPerColumn: 2,
            spaceBetween: 15,
        },
        320: {
            slidesPerView: 1,
            slidesPerColumn: 2,
            spaceBetween: 5,
        }
    }
});
var swiperarrivals = new Swiper('#product-arrivals', {
    observer: true,
    observeParents: true,
    slidesPerView: 5,
    slidesPerColumn: 2,
    spaceBetween: 15,
    breakpoints: {
        1024: {
            slidesPerView: 4,
            slidesPerColumn: 2,
            spaceBetween: 15,
        },
        768: {
            slidesPerView: 3,
            slidesPerColumn: 2,
            spaceBetween: 15,
        },
        640: {
            slidesPerView: 2,
            slidesPerColumn: 2,
            spaceBetween: 15,
        },
        320: {
            slidesPerView: 1,
            slidesPerColumn: 2,
            spaceBetween: 5,
        }
    }
});
var swiperonsale = new Swiper('#product-onsale', {
    observer: true,
    observeParents: true,
    slidesPerView: 5,
    slidesPerColumn: 2,
    spaceBetween: 15,
    breakpoints: {
        1024: {
            slidesPerView: 4,
            slidesPerColumn: 2,
            spaceBetween: 15,
        },
        768: {
            slidesPerView: 3,
            slidesPerColumn: 2,
            spaceBetween: 15,
        },
        640: {
            slidesPerView: 2,
            slidesPerColumn: 2,
            spaceBetween: 15,
        },
        320: {
            slidesPerView: 1,
            slidesPerColumn: 2,
            spaceBetween: 5,
        }
    }
});
var swipernews = new Swiper('#news-swiper', {
    slidesPerView: 3,
    slidesPerGroup: 3,
    spaceBetween: 15,
    loopFillGroupWithBlank: true,
    breakpoints: {
        992: {
            slidesPerView: 3,
            slidesPerGroup: 3,
            spaceBetween: 15,
        },
        768: {
            slidesPerView: 2,
            slidesPerGroup: 2,
            spaceBetween: 15,
        },
        640: {
            slidesPerView: 1,
            slidesPerGroup: 1,
            spaceBetween: 5,
        }
    },
    nextButton: ".swiper-jwl .swiper-button-next",
    prevButton: ".swiper-jwl .swiper-button-prev",
});

var shopPriceFilterVal = [0, 2000000];

$('#shop-price-slider').each(function () {
    noUiSlider.create(this, {
        start: shopPriceFilterVal,
        connect: true,
        range: {
            'min': 0,
            'max': 2000000,
        },
        format: {
            to: function (value) {
                return accounting.formatMoney(value, "Rp", 0, ".", ".")
            },
            from: function (value) {
                return value.replace(/[\$\,]/g, '');
            }
        }
    })
    .on('update', function (values) {
        $('#price_min').val(values[0]);
        $('#price_max').val(values[1]);
        console.log(values[1]);
    });
});

$('#price_min').on('change', function () {
    var val = parseInt(this.value.replace(/^\s+|\s+$|\$/g, ''));
    $('#shop-price-slider')[0].noUiSlider.set([
        isNaN(val) ? shopPriceFilterVal[0] : val,
        null
    ]);
});

$('#price_max').on('change', function () {
    var val = parseInt(this.value.replace(/^\s+|\s+$|\$/g, ''));
    $('#shop-price-slider')[0].noUiSlider.set([
        null,
        isNaN(val) ? shopPriceFilterVal[1] : val
    ]);
});