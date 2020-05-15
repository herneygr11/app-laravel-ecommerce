$(document).ready(function() {
    let routeName = $("[name=routeName]").attr('content');

    if( routeName.includes( 'admin' ) ){
        $('.lk-dashboard').addClass('lk-activate');
    }
    if( routeName.includes( 'users' ) ){
        $('.lk-user').addClass('lk-activate');
    }
    if( routeName.includes( 'products' ) ){
        $('.lk-product').addClass('lk-activate');
    }
    if( routeName.includes( 'categories' ) ){
        $('.lk-category').addClass('lk-activate');
    }
});
