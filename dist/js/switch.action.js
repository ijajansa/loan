$(document).ready(function(){
    function URLParameterExist(field) {
        var url = window.location.href;
        if (url.indexOf(field + '=') != -1){
            return false;
        }else{
            return true;
        }
    };
    $('.btn-status').on('switchChange.bootstrapSwitch', function(event, state) {
        console.log(event); // jQuery event
        console.log(state); // true | false
        let status;
        if(state){
            status = "1";
        }else{
            status = "0";
        }
        var user_id = $(this).data("user-id");
        var post = { "id" : user_id, "status" : status };
        $.ajax({
            url: "/index.php?path=user&method=updatestatus",
            type: "POST",
            data:  post,
            dataType:'json',
            cache: false,
            beforeSend : function(){
                
            },
            success: function(data){
                let obj = JSON.parse(data);
                //toastr.success(obj.html, 'Info')
                toastr.info(obj.html, obj.title)
            },
            error: function(e){
                console.log(e);
            }          
        });

    });
    $("#assigntocommition").on('submit',(function(e){
        e.preventDefault();
        $.ajax({
            url: "/index.php?path=lead&method=assignemployeeandcommition",
            type: "POST",
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            beforeSend : function(){
                
            },
            success: function(data){
                let obj = JSON.parse(data);
                toastr.info(obj.html, obj.title)
            },
            error: function(e){
                alert(e);
                
            }          
        });
    }));

	$('.connector-list').select2({
        width: "200px" // need to override the changed default
    });
    
    $("#InputTransfer").on("change", function(e){
        //alert($(this).val());
        if($(this).val() == "online"){
           $("#payment-online").show();
           $("#payment-wallet").hide(); 
        }else if($(this).val() == "wallet"){
            $("#payment-online").hide();
            $("#payment-wallet").show(); 
        } else {
            $("#payment-online").hide();
            $("#payment-wallet").hide();
        }
    });

    $("#product_form").on('submit',(function(e){
        e.preventDefault();
        var action = $(this).attr("action");
        $.ajax({
            url: action,
            type: "POST",
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            beforeSend : function(){
                
            },
            success: function(data){
                let obj = JSON.parse(data);
                $(".product_error").text("");
                $(".is-invalid").removeClass("is-invalid");
                if(obj.errors){
                    $(obj.errors.date).each(function(index,valueofIndex){
                        $("#date_"+index).addClass("is-invalid");
                        //$("#date_error_"+index).text(valueofIndex);
                    });
                    $(obj.errors.employee_id).each(function(index,valueofIndex){
                        $("#employee_id_"+index).addClass("is-invalid");
                        //$("#employee_id_error_"+index).text(valueofIndex);
                    });
                }
                if(obj.fundserror){
                    alert(obj.fundserror);
                }

                if(obj.success){
                    alert(obj.success);
                    location.reload();
                }
            },
            error: function(e){
                alert(e);
                
            }          
        });
    }));

    $("#hm_product_form").on('submit',(function(e){
        e.preventDefault();
        var name = $("#inputname").val();
        var email = $("#inputemail").val();
        var mobile_number = $("#inputmobile_number").val();
        var error = false;
        if (URLParameterExist("client_id")) {
            if (name.length < 3) {
                $("#error_name").html("Enter full name");
                error = true;
            } else {
                $("#error_name").html("");
            }
            if (email.length < 9) {
                $("#error_email").html("Enter Valid Email");
                error = true;
            } else {
                $("#error_email").html("");
            }
            if (mobile_number.trim().length != 10) {
                $("#error_mobile_number").html("Enter Valid Mobile Number");
                error = true;
            } else {
                $("#error_mobile_number").html("");
            }
        }
        if (!error) {
        	var action = $(this).attr("action");
        	$.ajax({
            	url: action,
            	type: "POST",
            	data:  new FormData(this),
            	contentType: false,
            	cache: false,
            	processData:false,
            	beforeSend : function(){
                
            	},
            	success: function(data){
                	let obj = JSON.parse(data);
                	$(".product_error").text("");
                	$(".is-invalid").removeClass("is-invalid");
                		if(obj.errors){
                    		$(obj.errors.date).each(function(index,valueofIndex){
                        	$("#date_"+index).addClass("is-invalid");
                    	});
                    	$(obj.errors.employee_id).each(function(index,valueofIndex){
                        	$("#employee_id_"+index).addClass("is-invalid");
                    	});
                    	if(obj.errors.product){
                        	alert(obj.errors.product);
                    	}
                	}
                	if(obj.fundserror){alert(obj.fundserror)}
                	if(obj.success){
                    	alert(obj.success);
                    	window.location.href="/index.php?path=hm&method=list";
                	}
            	},
            	error: function(e){
                	alert(e);
            	}          
        	});
        }
    }));

    $("#InputAmount").keyup(function(){
        var amt = $(this).val();
        var tds = parseFloat((amt*5)/105).toFixed(2);
        var net = parseFloat((amt*100)/105).toFixed(2);
        $('#tds_text').html(tds);
        $('#tds_input').val(tds);
        $('#net_text').html(net);
        $('#net_input').val(net);
    });

    $("#requestOtpBtn").click(function(){
        var action = "/index.php?path=wallet&method=withdraw_otp";
        var btn = $("#requestOtpBtn");
        $.ajax({
            url: action,
            type: "GET",
            contentType: false,
            cache: false,
            processData:false,
            beforeSend : function(){
                btn.prop('disabled', true);
                btn.html("Please wait sending OTP ...");
            },
            success: function(data){
                let obj = JSON.parse(data);
                if(obj.status == "success"){
                    alert("OTP sent sucessfully on your registered Email id");
                    $('#submitBtn').prop('disabled', false);
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
            },
            error: function(e){
                alert(e);
                
            }          
        }); 
    })

    $("#commition_form").on('submit',(function(e){
        e.preventDefault();
        var action = $(this).attr('action');
        var trn = $("#trn").val();
        var amt = $("#commition_amount").val();
        if(amt == ""){
            alert("Please enter amount");
            return false;
        }
        if(trn == ""){
            alert("Please enter transaction number");
            return false;
        }
        $.ajax({
            url: action,
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            beforeSend : function(){},
            success: function(data){
                let obj = JSON.parse(data);
                if(obj.errors){
                    if(obj.errors.trn){
                        alert("Please enter transaction number");    
                    }
                    if(obj.errors.amount){
                        alert("Please enter amount");
                    }
                    alert(obj.errors.other_id);
                }
                if(obj.success){
                    alert("Commition added to wallet sucessfully");
                    location.reload();
                }
            },
            error: function(e){
                console.log(e);
            }
        });
    }));
});