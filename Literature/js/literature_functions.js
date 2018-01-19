
//Slider Script

$( function() {
    $( "#slider-range" ).slider({
        range: true,
        min: 1950,
        max: 2018,
        values: [ 1980, 2000 ],
        slide: function( event, ui ) {
            $( "#amount" ).val( "from " + ui.values[ 0 ] + " to " + ui.values[ 1 ] );
        }
    });
    $( "#amount" ).val( "from " + $( "#slider-range" ).slider( "values", 0 ) +
        " to " + $( "#slider-range" ).slider( "values", 1 ) );
} );


//Disable Year when Slider Acitvated
$("#button_range").click(

    function (e){
        e.preventDefault();

        if($(this).hasClass('active')){
            $(this).removeClass('active');
            $("#inputYear").prop('disabled', false)
        } else {
            $(this).addClass('active');
            $("#inputYear").prop('disabled', true)
        }

    });

//Disable QuickSearch when advanced search activated
$("#advancedSearchLink").click(

    function (e){
        e.preventDefault();

        if($(this).hasClass('active')){
            $(this).removeClass('active');
            $("#quickSearch").prop('disabled', false)
            $("#quickSearchButton").prop('disabled', false)
        } else {
            $(this).addClass('active');
            $("#quickSearch").prop('disabled', true)
            $("#quickSearchButton").prop('disabled', true)
            $("#quickSearch").val('');
        }

    });

//Build HTML form for each selected kind
function buildAppend(name) {
    var result = '<div class="form-group row">\n' +
        '                            <label for="input'+name+'" class="col-sm-2 col-form-label col-form-label-sm">'+name+'</label>\n' +
        '                            <div class="col-sm-10">\n' +
        '                                <input type="text" class="form-control form-control-sm" id="input'+name+'" placeholder="'+name+'">\n' +
        '                            </div>\n' +
        '                        </div>';
    return result;

}
//Typefeld

$("#click_type").click(

    function (e){
        e.preventDefault();

        if($("#selectType" ).length == 0){
            $.ajax({

                type: "POST",
                url: "Literature/lit_getTypes.php",
                success: function(output)

                {
                    $("#add_target").append(output);
                }

            })

        }

    });

//Publisherfeld
$("#click_publisher").click(

    function (e){
        e.preventDefault();

        if($("#inputPublisher" ).length == 0) {
            $("#add_target").append(buildAppend('Publisher'));
        }
    });
//Journalfeld
$("#click_journal").click(

    function (e){
        e.preventDefault();

        if($("#inputJournal" ).length == 0) {
            $("#add_target").append(buildAppend('Journal'));
        }
    });

//Journalfeld
$("#click_timerange").click(

    function (e){
        e.preventDefault();

        $("#add_target").append('<div><div id="slider-range"></div></div>');

    });


