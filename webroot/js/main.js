$(function () {
    $('#serach-main-menu').on('input',function(){
        searchMenuItem(this)
    });
});

function searchMenuItem(input)
{
    var liList = $("#main-menu").find('li');
    var serach = $(input).val().toUpperCase();
    liList.each(function(){
        var menuName = $(this).children('a').text().trim().toUpperCase();
        if(menuName.indexOf(serach)>-1)
        {
            $(this).show();
        }
        else {
            $(this).hide();
        }
    });
}