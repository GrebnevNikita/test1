function ajax(data) {
    var d='';
    $.ajax({
        async: false,
        type: "POST",
        url: '/test1/functions.php',
        data: data,
        success: function (result) {
            d = result;
        }
    });
    return d;
}


function get_affiliated_societies_staff_with_types_by_affiliated_societies_id(id) {
    $('#content_main_right').html(
        ajax({
            action: 'get_affiliated_societies_staff_with_types_by_affiliated_societies_id',
            id: id
        }));

}