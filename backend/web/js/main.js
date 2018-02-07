$(function(){
    var i = $('#countid').val();
    for(var j=1; j <= i; j++)
    {
        $('#modalButton'+j+'').click(function(){
            $('#modal').modal('show')
            .find('#modalContent')
            .load($(this).attr('value'));
        });
    }
});