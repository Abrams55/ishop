
$('#currencis').change(function(){
    var currenci = $(this).select().val();

    $.ajax({
        method: 'POST',
        url: '/currencis/change',
        data: {
            currenci: currenci
        },
        success: function(data){
            if(data) {
                $('#currencis').html(data);
                location.reload();
            }
        }
    });
});