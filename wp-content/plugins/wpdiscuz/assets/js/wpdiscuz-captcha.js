jQuery(document).ready(function ($) {
    var mainWrapperUniqueId = getUniqueID($('.wc_main_comm_form'), 1);

    $(document).delegate('.wc_captcha_refresh_img', 'click', function () {
        changeCaptchaImage($(this));
    });

    $(document).delegate('.wc_field_captcha', 'focus', function () {
        changeCaptchaImage($(this));//messig avelcnel cuyc tal
    });

    wpdiscuzTimeoutForCaptcha(mainWrapperUniqueId, 30 * 60 * 1000);

    /*=======================FUNCTIONS===================================*/
    function wpdiscuzTimeoutForCaptcha(uniqueId, time) {
        wpdiscuzRemoveExpiredClass(uniqueId);
        setTimeout(function () {
            captchaExpiredTime(uniqueId);
            wpdiscuzAddExpiredClass(uniqueId);
        }, time);
    }

    function wpdiscuzAddExpiredClass(uniqueId) {
        if ($('#wc-secondary-form-wrapper-' + uniqueId).hasClass('wc-secondary-forms')) {
            $('#wc-secondary-form-wrapper-' + uniqueId + ' .wc_field_captcha').addClass('wpdiscuz-expired');
        } else {
            $('#wc-main-form-wrapper-' + uniqueId + ' .wc_field_captcha').addClass('wpdiscuz-expired');
        }
    }

    function wpdiscuzRemoveExpiredClass(uniqueId) {
        if ($('#wc-secondary-form-wrapper-' + uniqueId).hasClass('wc-secondary-forms')) {
            $('#wc-secondary-form-wrapper-' + uniqueId + ' .wc_field_captcha').removeClass('wpdiscuz-expired');
        } else {
            $('#wc-main-form-wrapper-' + uniqueId + ' .wc_field_captcha').removeClass('wpdiscuz-expired');
        }
    }

    function captchaExpiredTime(uniqueId) {
        $.ajax({
            type: 'POST',
            url: wpdiscuz_ajax_obj.url,
            data: {
                wpdiscuz_uniqueId: uniqueId,
                action: 'setCaptchaExpired'
            }
        });
    }

    function changeCaptchaImage(reloadImage) {
        var captchaImg = $(reloadImage).prev().children('.wc_captcha_img');
        var src = captchaImg.attr('src');
        var new_src = src.substring(0, src.lastIndexOf('=')) + '=' + Math.random();
        captchaImg.attr('src', new_src);
        var isMain = reloadImage.parents('.wc-form-wrapper').hasClass('wc-secondary-forms') ? 0 : 1;
        var uniqueId = getUniqueID(reloadImage, isMain);
        var time = isMain ? 30 * 60 * 1000 : 15 * 60 * 1000;
        wpdiscuzTimeoutForCaptcha(uniqueId, time);
    }
});