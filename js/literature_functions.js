
$( function() {
    $( "#slider-range" ).slider({
        range: true,
        min: 0,
        max: 500,
        values: [ 75, 300 ],
        slide: function( event, ui ) {
            $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
        }
    });
    $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
        " - $" + $( "#slider-range" ).slider( "values", 1 ) );
} );

//TODO: Type rauslöschen, wenn es schonmal angewählt wurde
//Typefeld

$("#click_type").click(

    function (e){
        e.preventDefault();

        $("#add_target").append('<div class="form-group">\n' +
            '                            <div class="input-group input-group-sm">\n' +
            '                                <span class="input-group-addon">Type</span>\n' +
            '                                <input type="text" class="form-control form-control-sm bfh-number" ' +
            'id="product_price" placeholder="Journal article, in collection..." data-min="0" data-max="9999999">\n' +
            '                            </div>\n' +
            '                        </div>')

    });
//Publisherfeld
$("#click_publisher").click(

    function (e){
        e.preventDefault();

        $("#add_target").append('<div class="form-group">\n' +
            '                            <div class="input-group input-group-sm">\n' +
            '                                <span class="input-group-addon">Publisher</span>\n' +
            '                                <input type="text" class="form-control form-control-sm bfh-number" ' +
            'id="product_price" placeholder="Publisher" data-min="0" data-max="9999999">\n' +
            '                            </div>\n' +
            '                        </div>')

    });
//Journalfeld
$("#click_journal").click(

    function (e){
        e.preventDefault();

        $("#add_target").append('<div class="form-group">\n' +
            '                            <div class="input-group input-group-sm">\n' +
            '                                <span class="input-group-addon">Journal</span>\n' +
            '                                <input type="text" class="form-control form-control-sm bfh-number" ' +
            'id="product_price" placeholder="Journal name" data-min="0" data-max="9999999">\n' +
            '                            </div>\n' +
            '                        </div>')

    });

//Journalfeld
$("#click_timespan").click(

    function (e){
        e.preventDefault();

        $("#add_target").append('<div id="slider-range"></div>')

    });


