// Write on keyup event of keyword input element
$("#excerptSearch").keyup(function(){
    var search = $(this).val().toLowerCase();

    //method based on code from https://stackoverflow.com/questions/20567426/search-html-table-with-js-and-jquery

    var name = '#' + getActiveExcerpt() + ' tbody tr';
    // Show only matching TR, hide rest of them
    $.each($(name), function() {
        if($(this).text().toLowerCase().indexOf(search) === -1)
            $(this).hide();
        else
            $(this).show();
    });
});

function getActiveExcerpt(){

    var excerpt;

    excerpt = $("#v-pills-tab").find(".active").attr('id');
    return excerpt;

}


