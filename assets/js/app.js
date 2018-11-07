/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */
const $ = require('jquery');
// JS is equivalent to the normal "bootstrap" package
// no need to set this to a variable, just require it
require('bootstrap');
require('@fortawesome/fontawesome-free');
require('jquery.easing');
import ScrollReveal from 'scrollreveal'
require('magnific-popup');
require('../scss/global.scss');
require('@fortawesome/fontawesome-free/scss/fontawesome.scss');
// any CSS you require will output into a single css file (app.css in this case)
require('../css/app.css');

// Need jQuery? Install it with "yarn add jquery", then uncomment to require it.
// var $ = require('jquery');

(function($) {
  "use strict"; // Start of use strict
    // Smooth scrolling using jQuery easing
    $('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function() {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html, body').animate({
                  scrollTop: (target.offset().top - 56)
                }, 1000, "easeInOutExpo");
                return false;
            }
        }
    });
    
    function isValidEmailAddress(emailAddress) {
        var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
        return pattern.test(emailAddress);
    };
    
    $('#application_submit').on('click', function(e){
        //make sure no inputs are left emtpy
        var email = $('#form_email').val();
        var emailValid = $('.valid-email');
        var emailInvalid = $('.invalid-email');
        
        var firstname = $('#form_firstname').val();
        var lastname = $('#form_lastname').val();
        var nameValid = $('.valid-name');
        var nameInvalid = $('.invalid-name');
        
        var address = $('#form_address').val();
        var country = $('#form_country').val();
        var zip = $('#form_zip').val();
        var addressValid = $('.valid-address');
        var addressInvalid = $('.invalid-address');
        
        
        
        var q1 = $('#form_q1').val();
        var q1Valid = $('.valid-q1');
        var q1Invalid = $('.invalid-q1');
        
        var fileExt = $('#form_resumeFile_file').val().split('.').pop().toLowerCase();
        var fileValid = $('.valid-file');
        var fileInvalid = $('.invalid-file');
        
        var error = false;
        
        if($.inArray(fileExt, ['pdf']) == -1) {
            error = true;
            fileValid.hide();
            fileInvalid.show();
        }
        else
        {
            fileInvalid.hide();
            fileValid.show();
        }
        
        //check the email input
        if(email == null || email == '')
        {
            //show email error
            error = true;
            emailValid.hide();
            emailInvalid.show();
        }
        else
        {
            //check to make sure this has a email format with regex
            if(isValidEmailAddress(email))
            {
                //show email valid
                emailInvalid.hide();
                emailValid.show();
            }
            else
            {
                //show email error
                error = true;
                emailValid.hide();
                emailInvalid.show();
            }
        }
        //check name inputs
        if(firstname == null || firstname == '' || lastname == null || lastname == '')
        {
            //show name error
            error = true;
            nameValid.hide();
            nameInvalid.show()
        }
        else
        {
            //show name valid
            nameInvalid.hide();
            nameValid.show();
        }
        //check address inputs
        if(address == null || address == '' || zip == null || zip == '')
        {
            //show address error
            error = true;
            addressValid.hide();
            addressInvalid.show();
        }
        else
        {
            //show address valid
            addressInvalid.hide();
            addressValid.show();
        }
        if(q1 == null || q1 == '')
        {
            //q1 error
            error = true;
            q1Valid.hide();
            q1Invalid.show();
        }
        else
        {
            //show q1 valid
            q1Invalid.hide();
            q1Valid.show();
            
        }
        if(error == false)
        {
            $('form#application_form').submit();
        }
    });
    
    $("#information_submit").on('click', function(e){
        //make sure no inputs are left emtpy
        var email = $('#info_form_email').val();
        var emailValid = $('.valid-email1');
        var emailInvalid = $('.invalid-email1');
        
        var firstname = $('#info_form_firstname').val();
        var lastname = $('#info_form_lastname').val();
        var nameValid = $('.valid-name1');
        var nameInvalid = $('.invalid-name1');
        
        var address = $('#info_form_address').val();
        var country = $('#info_form_country').val();
        var zip = $('#info_form_zip').val();
        var addressValid = $('.valid-address1');
        var addressInvalid = $('.invalid-address1');
        
        var error = false;
        //check the email input
        if(email == null || email == '')
        {
            //show email error
            error = true;
            emailValid.hide();
            emailInvalid.show();
        }
        else
        {
            //check to make sure this has a email format with regex
            if(isValidEmailAddress(email))
            {
                //show email valid
                emailInvalid.hide();
                emailValid.show();
            }
            else
            {
                //show email error
                error = true;
                emailValid.hide();
                emailInvalid.show();
            }
        }
        //check name inputs
        if(firstname == null || firstname == '' || lastname == null || lastname == '')
        {
            //show name error
            error = true;
            nameValid.hide();
            nameInvalid.show()
        }
        else
        {
            //show name valid
            nameInvalid.hide();
            nameValid.show();
        }
        //check address inputs
        if(address == null || address == '' || zip == null || zip == '')
        {
            //show address error
            error = true;
            addressValid.hide();
            addressInvalid.show();
        }
        else
        {
            //show address valid
            addressInvalid.hide();
            addressValid.show();
        }
        if(error == false)
        {
            $('form#information_form').submit();
        }
    });
    
    // Closes responsive menu when a scroll trigger link is clicked
    $('.js-scroll-trigger').click(function() {
      $('.navbar-collapse').collapse('hide');
    });

    // Activate scrollspy to add active class to navbar items on scroll
    $('body').scrollspy({
      target: '#mainNav',
      offset: 57
    });

    // Collapse Navbar
    var navbarCollapse = function() {
      if ($("#mainNav").offset().top > 100) {
        $("#mainNav").addClass("navbar-shrink");
      } else {
        $("#mainNav").removeClass("navbar-shrink");
      }
    };
    // Collapse now if page is not at top
    navbarCollapse();
    // Collapse the navbar when page is scrolled
    $(window).scroll(navbarCollapse);

    // Scroll reveal calls
    window.sr = ScrollReveal();

    sr.reveal('.sr-icon-1', {
      delay: 200,
      scale: 0
    });
    sr.reveal('.sr-icon-2', {
      delay: 400,
      scale: 0
    });
    sr.reveal('.sr-icon-3', {
      delay: 600,
      scale: 0
    });
    sr.reveal('.sr-icon-4', {
      delay: 800,
      scale: 0
    });
    sr.reveal('.sr-button', {
      delay: 200,
      distance: '15px',
      origin: 'bottom',
      scale: 0.8
    });
    sr.reveal('.sr-contact-1', {
      delay: 200,
      scale: 0
    });
    sr.reveal('.sr-contact-2', {
      delay: 400,
      scale: 0
    });
    
    // Magnific popup calls
    //$('.popup-gallery').magnificPopup({
    //    delegate: 'a',
    //    type: 'image',
    //    tLoading: 'Loading image #%curr%...',
    //    mainClass: 'mfp-img-mobile',
    //    gallery: {
    //        enabled: true,
    //        navigateByImgClick: true,
    //        preload: [0, 1]
    //    },
    //    image: {
    //        tError: '<a href="%url%">The image #%curr%</a> could not be loaded.'
    //    }
    //});
})(jQuery); // End of use strict
