$(".ifActive").click(function(){
    
    $(".ifActive").removeClass("active");
    $(this).addClass("active");
    console.log( $(this) );

})