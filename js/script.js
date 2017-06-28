$(function(){
    var x = true;
    $('#result').hide();
    $('#search').keyup(function(){
        var value = $(this).val();
        if (value !=="") {
            $.ajax({
                type: 'GET',
                url: 'scripts/findusers.php',
                data: 'q='+value,
                success: function(data){
                    $('#result').html(data);
                }
            });
            $('#result').show();

        }
        else {
            $('#result').hide();
        }
    });

    $('#dej').click(function(){
        $.ajax({
            type: 'GET',
            url: 'scripts/follow.php',
            data: 'q='+$('#dej').attr("koga"),
            success: function(){
                if (x) {
                    $('#dej').removeClass('btn-info').addClass('btn-danger').html("Nehaj slediti!");
                    x=false;
                }
                else {
                    $('#dej').removeClass('btn-danger').addClass('btn-info').html("Sledi!");
                    x=true;
                }
            }
        });
    });

    $('#nehi').click(function(){
        $.ajax({
            type: 'GET',
            url: 'scripts/follow.php',
            data: 'q='+$('#nehi').attr("koga"),
            success: function(){
                if (x) {
                    $('#nehi').removeClass('btn-danger').addClass('btn-info').html("Sledi!!");
                    x=false;
                }
                else {
                    $('#nehi').removeClass('btn-info').addClass('btn-danger').html("Nehaj slediti!");
                    x=true;
                }
            }
        });
    });

    console.log('we cool');
    $('#civkni').click(function(){
        console.log($('#text').val());
        $('.content').prepend(tweetTemplate($('.username').text(), $('.handle').text(), $('#text').val(), $('#myNavbar').attr('images')));
        var text = $('#text').val();
        $.ajax({
            type: "POST",
            url: "scripts/tweet.php",
            data: {myData:text},
            success: function(data){
                $('#text').val('');
            },
            error: function(e){
                console.log(e.message);
            }
        });
    });


});


function tweetTemplate (user, handle, text, img){
    var tweet = '<div class="post"><div class="col-sm-2 coustom-col-2 "><div class="img-post-div "><img class="img-post img-circle" src="'+img+'" alt=""></div></div><div class="post-name col-sm-10  coustom-col-10"><span> <b>'+user+'</b></span> <span>'+handle+'</span> <span> - </span> <span>now</span></div><div class="col-sm-10 coustom-col-10"><div class="post-text">'+text+'</div></div><div class="col-sm-12"><hr></div></div>';
    return tweet;
}
