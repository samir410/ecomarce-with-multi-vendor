
const site_url = "http://127.0.0.1:8000/";



$("body").on("keyup","#search", function(){

    let text = $("#search").val();

    if (text.length > 0) {
        $.ajax({
            data: {search:text},
            url : site_url + "search-product",
            method: 'POST',
            beforeSend : function(request){
                request.setRequestHeader('X-CSRF-TOKEN', $("meta[name='csrf-token']").attr('content'));
            },
            success:function(result){
                $("#search-results").html(result);
            }
        });
    } else {
        $("#search-results").html(""); 
    }
});
