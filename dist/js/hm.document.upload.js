$(document).ready(function(){
    
    $('.modal').on('shown.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var doctype = button.data('doctype');
        var pid = button.data('pid'); // Extract info from data-* attributes
        var modal = $(this)
        modal.find('.modal-title').text(doctype)
        modal.find('#name').val(doctype)
        modal.find('#pid').val(pid)
        //modal.find('.modal-body input').val(doctype)
    });

    $("#sign, #resend").click(function(e){
        e.preventDefault();
        $("#accept-box").hide();
        $("#otp-box").show();
        $.ajax({
            url: "/index.php?path=dsa&method=sendotp",
            type: "POST",
            contentType: false,
            cache: false,
            processData:false,
            success: function(data){
                let obj = JSON.parse(data);
            },
            error: function(e){
                alert(e);
            }          
        });
        
    });

    $(".form").on('submit',(function(e) {
        e.preventDefault();
        var form = $(this);
        var pid = form.find('#pid').val();
        $.ajax({
            url: "/index.php?path=document&method=upload",
            type: "POST",
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            beforeSend : function(){
                $(".file-error").each(function(){
                    $(this).hide();
                });
            },
            success: function(data){
                let obj = JSON.parse(data);
                if(obj=='invalid'){
                    alert("Invalid File !");
                }else if(obj.error){
                    //console.log(obj);
                    var str = obj.option.toString();
                    var result = str.split('_');
                    $("#error_"+result[0]).text(obj.error.image);
                    $("#error_"+result[0]).show();
                }else{
                    $("#"+pid).html(obj.html).fadeIn();
                    $('.form').each(function(){
                        $(this).trigger("reset");
                    });
                    $('.modal').each(function(){
                        $(this).modal('hide');
                    }); 
                }
            },
            error: function(e){
                alert(e);
            }          
        });
    }));
    $("#form").on('submit',(function(e) {
        e.preventDefault();
        var form = $(this);
        var pid = form.find('#pid').val();
        $.ajax({
            url: "/index.php?path=document&method=uploaduser",
            type: "POST",
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            beforeSend : function(){
                $(".file-error").each(function(){
                    $(this).hide();
                });
            },
            success: function(data){
                let obj = JSON.parse(data);
                if(obj=='invalid'){
                    alert("Invalid File !");
                }else if(obj.error){
                    //console.log(obj);
                    var str = obj.option.toString();
                    var result = str.split('_');
                    $("#error_"+result[0]).text(obj.error.image);
                    $("#error_"+result[0]).show();
                }else{
                    $("#"+pid).html(obj.html).fadeIn();
                    $('.form').each(function(){
                        $(this).trigger("reset");
                    });
                    $('.modal').each(function(){
                        $(this).modal('hide');
                    }); 
                }
            },
            error: function(e){
                alert(e);
            }          
        });
    }));

    $("#form-agreement").on('submit',(function(e) {
        e.preventDefault();
        var form = $(this);
        $.ajax({
            url: "/index.php?path=dsa&method=checkotp",
            type: "POST",
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success: function(data){
                let obj = JSON.parse(data);
                if(obj.status=='error'){
                    alert(obj.msg);
                }else{
                    $('.form').each(function(){
                        $(this).trigger("reset");
                    });
                    $('.modal').each(function(){
                        $(this).modal('hide');
                    });

                    alert(obj.msg);
                    document.location.href="/index.php?path=user&method=logout";
                }
            },
            error: function(e){
                alert(e);
            }          
        });
    }));

    $("#comment_form").on('submit',(function(e) {
        e.preventDefault();
        var form = $(this);
        $.ajax({
            url: "/index.php?path=yojana&method=comment&type=comment",
            type: "POST",
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            beforeSend : function(){
                
            },
            success: function(data){
                let obj = JSON.parse(data);
                var html = "";
                $.each(obj,function(i,v){
                    html += '<div class="time-label">';
                    html += '<span class="bg-yellow">' + v.created_at + '</span>';
                    html += '</div>';
                    html += '<div>';
                    html += '<i class="fas fa-comment-alt bg-purple"></i>';
                    html += '<div class="timeline-item">';
                    html += '<h3 class="timeline-header"><a href="#">' + v.commented_by + '</a>' + v.comment + '</h3>';
                    html += '</div>';
                    html += '</div>';
                });
                form.trigger("reset");
                //$("#comment_status").modal('toggle');
                $("#comment_container").html(html);
            },
            error: function(e){
                alert(e);
            }          
        });
    }));

    $("#note-form").on('submit',(function(e) {
        e.preventDefault();
        var form = $(this);
        $.ajax({
            url: "/index.php?path=yojana&method=comment&type=note",
            type: "POST",
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            beforeSend : function(){
                
            },
            success: function(data){
                let obj = JSON.parse(data);
                var html = "";
                $.each(obj,function(i,v){
                    html += '<div class="time-label">';
                    html += '<span class="bg-yellow">' + v.created_at + '</span>';
                    html += '</div>';
                    html += '<div>';
                    html += '<i class="fas fa-comment-alt bg-purple"></i>';
                    html += '<div class="timeline-item">';
                    html += '<h3 class="timeline-header"><a href="#">' + v.commented_by + '</a>' + v.comment + '</h3>';
                    html += '</div>';
                    html += '</div>';
                });
                form.trigger("reset");
                //$("#comment_status").modal('toggle');
                $("#note_container").html(html);
            },
            error: function(e){
                alert(e);
            }          
        });
    }));

    $("#other_document_form").on('submit',(function(e) {
        e.preventDefault();
        if($.trim($("#other_document_name").val()) == ""){
            alert("Please enter document name");
            return false;
        }
        var form = $(this);
        var cc = $("#other_document_container");
        var cs = $("#other_document_modal");
        $.ajax({
            url: "/index.php?path=document&method=uploadhmdoc",
            type: "POST",
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            beforeSend : function(){
                
            },
            success: function(data){
                let obj = JSON.parse(data);
                
                if(obj.error){
                    var err = "";
                    $.each(obj.error, function (key, val) {
                        err += val+", ";
                    });
                    err = err.slice(0,-2);
                    alert(err);
                    return false;
                }else{
                    console.log(obj);
                    //return false;
                    var html = "";
                    html += '<div class="col-md-3">';
                    html += '<div class="form-group required">';
                    html += '<div class="custom-file">';
                    html += obj.html;
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';
                    cc.append(html);
                    form.trigger("reset");
                    cs.modal('toggle');
                }
                
            },
            error: function(e){
                alert(e);
            }          
        });
    }));

    $("#chat_document_form").on('submit',(function(e) {
        e.preventDefault();
        if($.trim($("#document_name").val()) == ""){
            alert("Please enter document name");
            return false;
        }
        var form = $(this);
        //var cc = $("#comment_container");
        var cs = $("#chat_document_modal");
        $.ajax({
            url: "/index.php?path=document&method=chatuploadhm",
            type: "POST",
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            beforeSend : function(){
                
            },
            success: function(data){
                let obj = JSON.parse(data);
                console.log(obj);
                //return false;
                var html = "";
                html += '<div class="col-md-3">';
                html += '<div class="form-group required">';
                html += '<div class="custom-file">';
                html += obj.html;
                html += '</div>';
                html += '</div>';
                html += '</div>';
                //cc.append(html);
                form.trigger("reset");
                cs.modal('toggle');
                updateComments();
            },
            error: function(e){
                alert(e);
            }          
        });
    }));

    $("#payment_done_form").on('submit',(function(e) {
        e.preventDefault();
        if($.trim($("#transaction_number").val()) == ""){
            alert("Please enter document name");
            return false;
        }
        var form = $(this);
        var cs = $("#payment_done_modal");
        $.ajax({
            url: "/index.php?path=document&method=paymentdone",
            type: "POST",
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            beforeSend : function(){
                
            },
            success: function(data){
                let obj = JSON.parse(data);
                form.trigger("reset");
                cs.modal('toggle');
                alert("Thanks for submiting Payment proof");
                location.reload();
            }          
        });
    }));
    
    $(".option-select").change(function(){
        var el = $(this).val();
        $("#"+el).siblings(".file-input-container").css({"display": "none"});
        $("#"+el).siblings(".file-input-container").children("input").attr("disabled", true);
        $("#"+el).css({"display": "block"});
        $("#"+el).children("input").attr("disabled", false);
    });
    if(typeof agree !== 'undefined'){
        if(agree){
            $('html, body').animate({
                scrollTop: $("#kyc-panel").offset().top
            }, 2000);
        }
    }
    
    /* $("#add-comment").click(function(){
        $("#comment-form").submit();
    }); */
    $("#comment-form").on("submit",(function(e){
        e.preventDefault();
        var postData = new FormData(this);
        var form = $(this);
        console.log(postData);
        var comment = $("#commentbox").val();
        //formData.append("postData",postData );
        
        if(comment != ""){
            $.ajax({
                url: "/index.php?path=document&method=commenthm",
                type: "POST",
                data:  new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                beforeSend : function(){
                    
                },
                success: function(data){
                    let obj = JSON.parse(data);
                    var html = "";
                    $.each(obj,function(i,v){
                        html += '<div class="time-label">';
                        html += '<span class="bg-yellow">' + v.created_at + '</span>';
                        html += '</div>';
                        html += '<div>';
                        html += '<i class="fas fa-comment-alt bg-purple"></i>';
                        html += '<div class="timeline-item">';
                        html += '<h3 class="timeline-header"><a href="#">' + v.commented_by + '</a>' + v.comment + '</h3>';
                        html += '</div>';
                        html += '</div>';
                    });
                    $("#commentbox").val("");
                    $("#comment_container").html(html);
                },
                error: function(e){
                    alert(e);
                }          
            });
        }
         
    }));

    $("#review-form").on("submit",(function(e){
        e.preventDefault();
        if($(".rev").is(':checked')){
            $.ajax({
                url: "/index.php?path=hm&method=add_review",
                type: "POST",
                data:  new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                beforeSend : function(){
                   $("#add-review").prop('disabled', true);
                   $("#add-review").html('Wait Review Submiting ... ');
                },
                success: function(data){
                    let obj = JSON.parse(data);
                    alert("Review Submited Sucessfully!!!");
                    location.reload();
                },
                error: function(e){
                    alert(e);
                }          
            });
        }else{
            alert('You must select feeling emojis');
            $('#emoji-Box').css('border',"solid thin #ff0000");
        }
    }));

    $(".imgbgchk").click(function(){
        $(".imgbgchk").css("width","32px");
        $(this).css("width","64px");
        var title = $(this).attr('title'); 
        $("#selected-review").html(title);
        $('#emoji-Box').css('border',"none");
    });

    function GetURLParameter(sParam){
        var sPageURL = window.location.search.substring(1);
        var sURLVariables = sPageURL.split('&');
        for (var i = 0; i < sURLVariables.length; i++) {
            var sParameterName = sURLVariables[i].split('=');
            if (sParameterName[0] == sParam){
                return sParameterName[1];
            }
        }
    };
    var fileId = GetURLParameter('id');
    //
    function updateComments(){
        $.ajax({
            url: "/index.php?path=document&method=commenthm&file_id="+fileId,
            type: "GET",
            contentType: false,
            cache: false,
            processData:false,
            beforeSend : function(){
                
            },
            success: function(data){
                let obj = JSON.parse(data);
                
                var html = "";
                $.each(obj,function(i,v){
                    html += '<div class="time-label">';
                    html += '<span class="bg-yellow">' + v.created_at + '</span>';
                    html += '</div>';
                    html += '<div>';
                    html += '<i class="fas fa-comment-alt bg-purple"></i>';
                    html += '<div class="timeline-item">';
                    html += '<h3 class="timeline-header"><a href="#">' + v.commented_by + '</a>' + v.comment + '</h3>';
                    html += '</div>';
                    html += '</div>';
                });
                $("#comment_container").html(html);
                var scrollto = $("#comment_container").prop("scrollHeight")+100;
                $('#comment_container').scrollTop(scrollto);
            },
            error: function(e){
                alert(e);
            }          
        });
    }
    
    updateComments();

    $(".dial").knob();

    $(".order_status").on("change",function(){
        var order_id = $(this).data('id');
        var status = $(this).val();
        if(confirm("Confirm to change Order status")){
            $.ajax({
                url: "/index.php?path=yojana&method=changeOrderStatus&order_id="+order_id+"&status="+status,
                type: "GET",
                contentType: false,
                cache: false,
                processData:false,
                beforeSend : function(){
                    
                },
                success: function(data){
                    //let obj = JSON.parse(data);
                    alert("Order status changed sucessfully");
                    location.reload();
                },
                error: function(e){
                    alert(e);
                }          
            });
        }
        
    });

    $("#selectClient").select2();
    $("#selectService").select2();

    $("#addService").click(function(){
        var sid = $("#selectService").val();
        $.ajax({
            url: "/index.php?path=hm&method=select_service&id="+sid,
            type: "GET",
            contentType: false,
            cache: false,
            processData:false,
            beforeSend : function(){
               $(this).prop('disabled',true); 
            },
            success: function(data){
                let obj = JSON.parse(data);
                 if(obj.status == 'success'){
                    $("#addedService").prepend(obj.html);
                    $(this).prop('disabled',false);
                    $(obj.element_id).fadeIn(1000);
                }
                $("#selectService").val('').trigger('change');
            },
            error: function(e){
                alert(e);
            }          
        });
        if($(this).data('sub') == 1){
            var ssid = $("#selectServiceOption").val();
            
            $.ajax({
                url: "/index.php?path=hm&method=select_service_sub&id="+ssid,
                type: "GET",
                contentType: false,
                cache: false,
                processData:false,
                beforeSend : function(){
                   $(this).prop('disabled',true); 
                },
                success: function(data){
                    let obj = JSON.parse(data);
                     if(obj.status == 'success'){
                        $("#addedService").prepend(obj.html);
                        $(this).prop('disabled',false);
                        $(obj.element_id).fadeIn(1000);
                    }
                    $('#optionselect').hide();
                    $("#selectService").val('').trigger('change');
                },
                error: function(e){
                    alert(e);
                }          
            });
        }
    });

    $('#selectService').on('select2:select', function (e) {
        //alert("selected");
        var sid = $("#selectService").val();
        $.ajax({
            url: "/index.php?path=hm&method=has_child&id="+sid,
            type: "GET",
            contentType: false,
            cache: false,
            processData:false,
            beforeSend : function(){
               $(this).prop('disabled',true); 
            },
            success: function(data){
                let obj = JSON.parse(data);
                if(obj.has_child == '1'){
                    var html = '<label for="selectClient" class="control-label">Select Option</label>';
                    html += '<select name="service_option_id" id="selectServiceOption" class="form-control">';
                    html += '<option value="">Select option</option>';
                    $.each(obj.child_data, function(index, element) {
                        html += '<option value="'+element.id+'">' + element.category + " | " + element.product + "(&#8377; " + element.price +')</option>';
                    });
                    html += '</select>';
                    $("#optionselect").show();
                    $('#addService').data('sub','1');
                }else{
                    html = "";
                    $("#optionselect").hide();
                    $('#addService').data('sub','0');
                }

                $("#optionselect").html(html);
            },
            error: function(e){
                alert(e);
            }          
        });
    });

    $("#addedService").on("click",".trash",function(){
        //alert("remove clicked");
        var current = $(this).closest("tr");
        var pid = $(this).data('pid');
        $(".sub_"+pid).fadeOut(1000,function(){
            $(".sub_"+pid).remove();
        })
        current.fadeOut(1000,function(){
            current.remove();
        });
        
    });

    $("#addedService").on('keyup','.var-price', function(){
        var key = $(this).data('key');
        $('#var-disc-price-'+key).text($(this).val());
    });

    $("#addedService").on('click','.apply-occational',function(){

        var sid = $(this).data('pkey');
        $(this).siblings("#coupon_form_"+sid).show();
        $(this).hide();
    });

    $("#addedService").on('click','.remove-occational',function(){

        var sid = $(this).data('pkey');
        $.ajax({
            url: "/index.php?path=hm&method=select_service_with_standard&id="+sid,
            type: "GET",
            //data:  new formData,
            contentType: false,
            cache: false,
            processData:false,
            beforeSend : function(){
               //$(this).prop('disabled',true); 
            },
            success: function(data){
                let obj = JSON.parse(data);
                 if(obj.status == 'success'){
                    $(obj.element_id).html(obj.html);
                    //$(this).prop('disabled',false);
                    $(obj.element_id).fadeIn(1000);
                }
                //$("#selectService").val('').trigger('change');
            },
            error: function(e){
                alert(e);
            }          
        });
        
    });

    $("#addedService").on('click','.coupon_form_button',function(e){
        e.preventDefault();
        var pid = $(this).siblings('input[name="id"]').val();
        var code = $(this).siblings('select[name="code"]').val();
        
        $.ajax({
            url: "/index.php?path=hm&method=select_service_with_occasional&id="+pid+"&code="+code,
            type: "GET",
            //data:  new formData,
            contentType: false,
            cache: false,
            processData:false,
            beforeSend : function(){
               //$(this).prop('disabled',true); 
            },
            success: function(data){
                let obj = JSON.parse(data);
                 if(obj.status == 'success'){
                    $(obj.element_id).html(obj.html);
                    //$(this).prop('disabled',false);
                    $(obj.element_id).fadeIn(1000);
                }
                //$("#selectService").val('').trigger('change');
            },
            error: function(e){
                alert(e);
            }          
        });
    });
    
});