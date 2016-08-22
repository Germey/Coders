$(function() {
    $.getJSON('coders.json', function(data) {
        $.each(data, function(index, item) {
            var ele = $('#template').clone().removeAttr('id');
            ele.find('.coder-url').attr('href', item.url);
            ele.find('.coder-image').attr('src', item.image);
            ele.find('.coder-title').text(item.subtitle).attr('href', item.url);
            ele.find('.coder-subtitle').text(item.subtitle);
            ele.find('.coder-description').text(item.description);
            ele.find('.coder-user').text(item.user);
            ele.appendTo($('#masonry'));
            setTimeout(function() {
                var offset = $('#footer').offset().top;
                if (offset < $(window).height()) {
                    ele.addClass('fadeInUp').removeClass('none');
                } else {
                    ele.addClass('fadeInUp');
                }
            }, index * 500);
        });
        $('#masonry').css('height', 'inherit');
    });

    $(window).scroll(function() {
        var scroll_height = $(window).height() + $(this).scrollTop();
        var offset = $('#footer').offset().top;
        var extras = $('#masonry > .masonry_item:not(:visible)');
        extras.each(function(index) {
            var ele = $(this);
            if (scroll_height > offset) {
                setTimeout(function() {
                    ele.removeClass('none');
                }, index * 1000);
            }
        });
    });

})


