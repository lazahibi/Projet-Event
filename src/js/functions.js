      $('document').ready(function(){
        $('.disponibilite').hide();
    });
    $("[id^='part']").click(function() {
        if( $('#part1').is(':checked')) {
            $('.disponibilite').show();
        } else {
            $(".disponibilite").hide();
            $('[id^=hid]').prop('checked', false);
        }
    });


    
    $('.confirmation').on('click', function () {
        return confirm('Supprimer cet événement ?');
    });

