$(function () {
    let modalSlipper = $('#modal-video-slipper')
    modalSlipper.modal('show')

    modalSlipper.on('hide.bs.modal', function (event) {
        document.getElementById('video-slipper').pause()
    })

    // Corusel de productos
    // $('#productos').owlCarousel({
    //     loop: true,
    //     margin: 10,
    //     autoplay: true,
    //     autoplaySpeed: 2000,
    //     responsiveClass: true,
    //     responsive: {
    //         0: {
    //             items: 1,
    //             nav: true
    //         },
    //         600: {
    //             items: 1,
    //             nav: false
    //         },
    //         1000: {
    //             items: 1,
    //             nav: false,
    //         }
    //     }
    // })

    // Cambiar imagen con el click

    $('.color').on('click', function () {
        $('.producto-img').fadeOut(1000, function () {
            $(this).fadeIn(1000)
            $('.producto-img').attr('src', 'img/slippersocks/SlipperSocks_2.jpg')
        })
    })

    $('.dropdown-marcas').on('click', function () {
        $('.item-logo-marca').toggle('slow')
    })
    // // Cambiar imagen img
    //
    // $('.card-img-top').on('mouseenter', function () {
    //     $(this).attr('src', 'img/Black-Floral.jpeg')
    // })
    // $('.card-img-top').on('mouseout', function () {
    //     $(this).attr('src', 'img/black2.jpg')
    // })

    $("#mailventas").click(function () {
        $("#rowventas").toggle({ display: "contents" });
    });

})

