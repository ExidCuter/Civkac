$(function(){
    console.log('we cool');
    $('#civkni').click(function(){
        console.log($('#text').val());
        $('.content').prepend(tweetTemplate($('.username').text(), $('.handle').text(), $('#text').val()));
        var text = $('#text').val();
        $.ajax({
            type: "POST",
            url: "scripts/tweet.php",
            data: {myData:text},
            success: function(data){
            },
            error: function(e){
                console.log(e.message);
            }
        });
    });
});


function tweetTemplate (user, handle, text){
    var tweet = '<div class="post"><div class="col-sm-2 coustom-col-2 "><div class="img-post-div "><img class="img-post img-circle" src="img/prof.jpg" alt=""></div></div><div class="post-name col-sm-10  coustom-col-10"><span> <b>'+user+'</b></span> <span>'+handle+'</span> <span> - </span> <span>now</span></div><div class="col-sm-10 coustom-col-10"><div class="post-text">'+text+'</div></div><div class="col-sm-12"><hr></div></div>';
    return tweet;
}
