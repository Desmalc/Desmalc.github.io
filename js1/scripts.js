    $('#Reservemodal').on('show.bs.modal', function (event) {
  var button = $(event.reservebutton) // Button that triggered the modal
        var recipient = button.data('reservebutton');});
    $(document).ready(function (){
            $('#reservebutton').click(function (){
                $('#Reservemodal').modal('toggle');});
        });
    $(document).ready(function (){
            $('#modalbutton').click(function (){
                $('#loginModal').modal('toggle');});
        });
$(document).ready(function(){
    $('#mycarousel').carouse({ interval: 2000 });
        $("#carouselButton").click(function(){
                if ($("#carouselButton").children("span").hasClass('fa-pause')) {
                    $("#mycarousel").carousel('pause');
                    $("#carouselButton").children("span").removeClass('fa-pause');
                    $("#carouselButton").children("span").addClass('fa-play');
                }
                else if ($("#carouselButton").children("span").hasClass('fa-play')){
                    $("#mycarousel").carousel('cycle');
                    $("#carouselButton").children("span").removeClass('fa-play');
                    $("#carouselButton").children("span").addClass('fa-pause');                    
                }
            });
});
                               
    