jQuery(document).ready(function ($) {
    var offset;
    var count;
    if (admin_options_obj.lastCommentId) {
        $('#wpdiscuz_synch_comments_count').keyup(function () {
            if (isNaN(parseInt($(this).val()))) {
                $('#wpdiscuz_synch_comments').attr('disabled', 'disabled');
            } else {
                $('#wpdiscuz_synch_comments').removeAttr('disabled');
                count = Math.abs($(this).val());
            }
        });
    }

    $('#wpdiscuz_synch_comments').click(function () {
        offset = 0;
        $(this).attr('disabled', 'disabled');
        window.onbeforeunload = confirmExit;
        function confirmExit() {
            return "";
        }
        var progressDiv = '<div id="wpdiscuz_progressbar" class="wpdiscuz_progressbar" style="width:1%;">1%</div>';
        document.getElementById('wpdiscuz_progressbar_wrapper').innerHTML = progressDiv;
        count = count > 100 ? 100 : count;
        count = count < 10 ? 10 : count;
        synchronizeComments(count, 0);
    });
    function synchronizeComments(count, synchronizedComments) {
        $.ajax({
            type: 'POST',
            url: ajaxurl,
            data: {
                action: 'synchronizeComments',
                commentsCountPerRequest: count,
                synchronizedComments: synchronizedComments,
                offset: offset
            }
        }).done(function (response) {
            try {
                offset++;
                var width, text;
                var obj = $.parseJSON(response);
                var wpdiscuzProgress = obj.wpdiscuz_progress;
                var synchronizedComments = obj.synchronizedComments;
                if (isNaN(parseInt(wpdiscuzProgress))) {
                    width = 100;
                    text = wpdiscuzProgress;
                } else {
                    width = wpdiscuzProgress;
                    text = wpdiscuzProgress + ' %';
                }
                var progressDiv = '<div id="wpdiscuz_progressbar" class="wpdiscuz_progressbar" style="width:' + width + '%;">' + text + '</div>';
                document.getElementById('wpdiscuz_progressbar_wrapper').innerHTML = progressDiv;

                if (parseInt(wpdiscuzProgress) < 100) {
                    synchronizeComments(count, synchronizedComments);
                } else {
                    window.onbeforeunload = null;
                }
            } catch (e) {
                console.log(e);
            }
        });
    }
});

