$(document).ready(function(){
    $(".done-notification").click(function(){
        var id = $(this).data('id');
        var p = $(this).parent();
        var btn = $(this);
        if (confirm("Is this task done?") == true) {
            $.ajax({
                url: "/index.php?path=sale&method=set_notification_status&id="+id,
                type: "GET",
                //data:  new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                beforeSend : function(){
                    
                },
                success: function(data){
                    alert("Notification set successfully");
                    p.css("text-decoration", "line-through");
                    btn.hide();
                },
                error: function(e){
                    alert(e);
                }          
            });
        }
    });

    $(".done-reminder").click(function(){
        var id = $(this).data('id');
        var p = $(this).parent();
        var btn = $(this);
        if (confirm("Is this task done?") == true) {
            $.ajax({
                url: "/index.php?path=sale&method=set_reminder_status&id="+id,
                type: "GET",
                //data:  new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                beforeSend : function(){
                    
                },
                success: function(data){
                    alert("Reminder set successfully");
                    p.css("text-decoration", "line-through");
                    btn.hide();
                    
                },
                error: function(e){
                    alert(e);
                }          
            });
        }
    });

    $("#lead_type").on("change", function(){
        var type = $(this).val();
        var status = $("#lead_status").val();
        var export_url = "/index.php?path=sale&method=export&type="+type+"&status="+status;
        $("#export_link").attr("href", export_url);
    });
    $("#lead_status").on("change", function(){
        var type = $("#lead_type").val();
        var status = $(this).val();
        var export_url = "/index.php?path=sale&method=export&type="+type+"&status="+status;
        $("#export_link").attr("href", export_url);
    });

    var note = $('#note'),
		ts = new Date(2022, 9, 24),
		newYear = true;
		console.log(ts);
	
	if((new Date()) > ts){
		// The new year is here! Count towards something else.
		// Notice the *1000 at the end - time must be in milliseconds
		ts = (new Date()).getTime() + 10*24*60*60*1000;
		newYear = false;
	}

    $('#countdown').countdown({
		timestamp	: ts,
		callback	: function(days, hours, minutes, seconds){
			
			var message = "";
			
			message += days + " day" + ( days==1 ? '':'s' ) + ", ";
			message += hours + " hour" + ( hours==1 ? '':'s' ) + ", ";
			message += minutes + " minute" + ( minutes==1 ? '':'s' ) + " and ";
			message += seconds + " second" + ( seconds==1 ? '':'s' ) + " <br />";
			
			if(newYear){
				message += "left until the new year!";
			}
			else {
				message += "left to 10 days from now!";
			}
			
			note.html(message);
		}
	});

    $("#proceed_btn").click(function(){
        var emp_type = $("#employment_type").val();
        console.log(emp_type);
        var has_cc = $("#has_cc").val();
        console.log(has_cc);
        var error = false;
        if(emp_type == ""){
            alert("Eployement Type is required");
            error = true;
        }
        if(has_cc == ""){
            alert("Please select yes or no from already have active credit card");
            error = true;
        }
        if(!error){
            if(has_cc == "No"){
                if(emp_type == "Salaried"){
                    $("#salaried").show();
                    $("#self_employed").hide();
                }else{
                    $("#self_employed").show();
                    $("#salaried").hide();
                }
                $("#proceed_container").hide();
            }else{
                $("#cc_form").submit();
            }
        }
    });

    $("#employment_type").on("change", function(){
        $("#self_employed").hide();
        $("#salaried").hide();
        $("#proceed_container").show();
    });
    $("#has_cc").on("change", function(){
        $("#self_employed").hide();
        $("#salaried").hide();
        $("#proceed_container").show();
    });
});