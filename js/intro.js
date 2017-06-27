$(function(){
    console.log("werks");
    $('#reg-button').click(function() {
        if($('#pwd1').val()===$('#pwd2').val()){
            $('#register-form').submit();
        }
        else {
            $('#passmach').text("Gesla nista enaka");
            $('#passmach2').text("Gesla nista enaka");
        }
    });
});
