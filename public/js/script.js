
$(document).ready(function () {
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
        $(this).toggleClass('active');
    });

    $('.dropdown').hover(function() {
        $(this).find('.dropdown-menu').stop(true, true).delay(100).fadeIn(500);
    }, function() {
        $(this).find('.dropdown-menu').stop(true, true).delay(100).fadeOut(500);
    });


    $("input[name='themeValue']").change(function() {

        var name = $('input[type="radio"]:checked').val();
        if ($('input[type="radio"]:checked').length >= "0") {
            $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')} });
            $.ajax({
                url: 'set' ,
                type: "POST",
                data: {theme:name},
                success: function( response ) {
                    if(response.status){
                        if(name == 'v1'){
                            $( "#card-1" ).removeClass( "card-bg-color-2" ).addClass( "card-bg-color-1" );
                            $( "#card-2" ).removeClass( "card-bg-color-1" ).addClass( "card-bg-color-2" );
                        }
                        else if(name == 'v2'){
                            $( "#card-1" ).removeClass( "card-bg-color-1" ).addClass( "card-bg-color-2" );
                            $( "#card-2" ).removeClass( "card-bg-color-2" ).addClass( "card-bg-color-1" );
                        }

                        setTimeout(function(){
                            window.location.reload(true);
                        }, 1000);
                    }
                }
            });
        }
        return false;
    });


    // $('.date').datepicker({
    //     format: 'mm-dd-yyyy'
    // });
});