
$(function(){
    console.log("werks");

    $('#reg-button').click(function() {
        var ok = true;
        if($('#name').val()===""){
            $('#wrongname').html("Narobe ime");
            console.log("name");
            ok = false;
        }
        else {
            $('#wrongname').html("");
            }
        if($('#handle').val()===""){
            $('#wronghandle').html("Narobe handle");
            console.log("handle");
            ok = false;
        }
        else {
            $('#wronghandle').html("");
        }
        if($('#email').val()===""){
            $('#wrongemail').text("Narobe email");
            console.log("email");
            ok = false;
        }
        else {
            if(!validateEmail($('#email').val())){
                $('#wrongemail').text("Narobe email");
                console.log("email2");
                ok = false;
            }
            else {
                $('#wrongemail').html("");
            }
        }
        if($('#pwd1').val()===""){
            $('#passmach').text("Narobe geslo");
            console.log("pass");
            ok = false;
        }
        else {
            $('#passmach').html("");
        }
        if($('#pwd2').val()===""){
            $('#passmach2').text("Narobe geslo");
            console.log("pass2");
            ok = false;
        }
        else {
            $('#passmach2').html("");
        }
        if($('#pwd1').val()!==$('#pwd2').val()){
            $('#passmach').text("Gesla nista enaka");
            $('#passmach2').text("Gesla nista enaka");
            ok = false;
        }
        else {
            $('#passmach').html("");
            $('#passmach2').html("");
        }
        if(ok){
            $('#register-form').submit();
        }
    });
});


function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}
