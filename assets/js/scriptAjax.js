$(document).ready(function (){
    $('.fa-search').css('cursor','pointer');
    $('.fa-search').on('click', function(e){
    e.preventDefault();

        let mcle = $('#fa-search').val();
        console.log(mcle);
    })
})