$(document).ready(function() {
    // удаление
    $(".del").click(function(){
        var res = confirm("Вы уверены?");
        if(!res) return false;
    });

    // поиск
    $.fn.searchFunction = function(route) {
        $(this).keyup(function(){
            var txt = $(this).val();
            if(txt !== '') {
                $.ajax({
                    url:route,
                    method:"post",
                    data:{search:txt},
                    dataType:"text",
                    success:function(data) {
                        $('body').html(data);
                    }
                });
            }
            else {
                $.ajax({
                    url:route,
                    method:"post",
                    data:{search:''},
                    dataType:"text",
                    success:function(data) {
                        $('body').html(data);
                    }
                });
            }
        });
    };

    $('#search_text').searchFunction("/");
    $('#search_text_admin').searchFunction("/admin");
});