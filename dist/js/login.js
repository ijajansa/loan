$(document).ready(function(){
    $("#getloginotp").click(function(){
        var email = $("#email").val();
        var btn = $("#getloginotp");
        if(email == ""){
            $("#login-error").html("Please enter email");
        }else if(!isEmail(email)){
            $("#login-error").html("Please enter valid email");
        }else{
            $.ajax({
                url: "/index.php?path=user&method=loginotp&email="+email,
                type: "GET",
                //data:  new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                beforeSend : function(){
                    btn.html('Sending OTP ...');
                },
                success: function(data){
                    let obj = JSON.parse(data);
                    if(obj.success){
                        alert("OTP Send sucessfully");
                        $("#password_filed").hide();
                        $("#otp_filed").show();
                        $("#logintype").val("otp");
                        btn.prop('disabled', true);
                        var i = 60;
                        let myVar = setInterval(function(){
                            if(i>=0){
                                btn.html("Wait for "+ i +" second(s) to resend OTP");

                            }else{
                                btn.html("Resend OTP");
                                btn.prop('disabled', false);
                                clearInterval(myVar);
                            }
                            i--;
                        }, 1000);
                    }
                    if(obj.error){
                        alert(obj.error.email)
                    }
                    $("#getloginotp").html('Login with OTP');
                },
                error: function(e){
                    alert(e);
                }          
            });
        }
        /* $("#password_filed").hide();
        $("#otp_filed").hide(); */
    });
});

$("#email").click(function(){
    $("#login-error").html("");
});

function isEmail(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
}