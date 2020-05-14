$(document).ready( function(){
    $('#btn_product_image').click( function(){
        $('#product_image').click();
    });

    $("#product_image").change( function() {
        $( "#form_product_gallery" ).submit();
    });
});
