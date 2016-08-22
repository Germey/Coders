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
            ele.appendTo($('#masonry')).removeClass('none').addClass('isotope-item');
        });
        $('#masonry').css('height', 'inherit');
        var $container = $('#masonry');
        $container.imagesLoaded( function(){
            $container.isotope({
                itemSelector : '.masonry_item'
            });
        });
    });

});





