
var input;
var submit_form = false;
console.log(filter_selector);


$("body").on('beforeFilter', "#grid-id" , function(event) {
    return submit_form;
});

$("body").on('afterFilter', "#grid-id" , function(event) {
    submit_form = false;
});

function filter() {
    input = $(filter_selector);
    if(submit_form === false) {
        $("#search").val(input.val());
        submit_form = true;
        $("#grid-id").yiiGridView("applyFilter");
    }
}


$("thead").append('<tr id="grid-id-filters" class="filters"> </tr>');
$("#grid-id-filters").append('<input id="search" name="search" type="hidden" class="" placeholder="Search" >');
$('#search').val(searchValue);
$(filter_selector).focus().val(searchValue);
$(filter_selector).keyup($.debounce(350,filter));

$(document).on('pjax:success', function() {
    $("thead").append('<tr id=\"grid-id-filters\" class=\"filters\"> </tr>');
    $('#grid-id-filters').append('<input id="search" name="search" type="hidden" class="" placeholder="Search" >');
    $('#search').val(input.val());
    $(filter_selector).focus().val(input.val());
    $(filter_selector).keyup($.debounce(350,filter));
});