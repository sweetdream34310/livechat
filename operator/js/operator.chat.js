history.navigationMode='compatible';var rlsbint=jaksSSEop=null;var windowscount=0;var chatboxcount=0;working=false;var prev_length=new Array();$(document).ready(function(){$(document).on("click",".minimize_chatbox",function(e){e.preventDefault();$(this).closest('.chatbox').find('.chat_area,.chat_message,.chat_info').css('height','0px');$(this).closest('.chatbox').css('height','25px');$(this).css('display','none');$(this).closest('.chatbox').find('.maximize_chatbox').css('display','inline');$(this).closest('.chatbox').data('chatbox_status',2)});$(document).on("click",".maximize_chatbox",function(e){e.preventDefault();$(this).closest('.chatbox').find('.chat_area').css('height','210px');$(this).closest('.chatbox').find('.chat_message').css('height','55px');$(this).closest('.chatbox').find('.chat_info').css('height','20px');$(this).closest('.chatbox').css('height','300px');$(this).closest('.chatbox').find('.header_bg_blink').removeClass("header_bg_blink").addClass("header_bg_default");$(this).css('display','none');$(this).closest('.chatbox').find('.minimize_chatbox').css('display','inline');$(this).closest('.chatbox').find('.header .new_message').remove();$(this).closest('.chatbox').find('.chat_message textarea').focus();$(this).closest('.chatbox').data('chatbox_status',1)});$(document).on("click",".close_chatbox",function(e){e.preventDefault();var closed_pos=parseInt($(this).closest('.chatbox').css('right'));chatboxcount--;$(this).closest('.chatbox').remove();$('.chatbox').each(function(){var prev_pos=parseInt($(this).css('right'));if(prev_pos!=10&&(prev_pos>closed_pos)){var nu_pos=prev_pos-225;$(this).css('right',nu_pos+'px')}})});$(document).on("click",".jakweb-oponline",function(e){e.preventDefault();var substr=$(this).attr('data-user').split(':#:');var ouserid=substr[0];var ousername=substr[1];if($('div[title="'+ouserid+'"]').length>0){}else{PopupChat(ouserid,ousername,1)}});$(document).on("click",".chatbox",function(){$textarea=$('.chat_message textarea',this);$textarea.focus()});$(document).on('focus',".chat_message textarea",function(){var chatbox=$(this).closest('.chatbox');this_chatbox_headerbg=$('.header',chatbox);this_chatbox_headerbg.removeClass("header_bg_blink").addClass("header_bg_default");chatbox.removeClass("cb_default").addClass("cb_highlight");chatbox.data('focused',1);chatbox.data('havenewmessage',0)});$(document).on("blur",".chat_message textarea",function(){var chatbox=$(this).closest('.chatbox');chatbox.removeClass("cb_highlight").addClass("cb_default");chatbox.data('focused',0)});$(document).on("keypress",".chat_message textarea",function(e){if(e.keyCode==13&&!e.shiftKey){e.preventDefault();var to_id=$(this).closest('.chatbox').data('uid');var this_chat_window_id=$(this).closest('.chatbox').attr('id');var this_textarea=$(this);if(!this_textarea.val())return false;if(working)return false;working=true;var request=$.ajax({async: true,url:ls.main_url+'ajax/operatorchat.php',type:"POST",data:'page=send-msg&uid='+ls.opid+'&uname='+ls.oname+'&to_id='+to_id+'&message='+encodeURIComponent(this_textarea.val()),dataType:"json",cache:false});request.done(function(msg){if(msg.status==1){liveChat();this_textarea.val('')}else{}working=false})}})});function sseJAKOPC(uid){if(typeof(EventSource)!=="undefined"){rlsbint=true;jaksSSEop=new EventSource(ls.main_url+"ajax/operatorchat_html5.php?id=check_only&opid="+uid);jaksSSEop.onmessage=function(event){var idledata=$.parseJSON(event.data);handleOPC(idledata)}}else{operatorIdle();if(!jaksSSEop&&!rlsbint)rlsbint=setInterval(function(){operatorIdle()},3000)}}function operatorIdle(){var request;if(typeof request!=='undefined')request.abort();var request=$.ajax({async: true,url:ls.main_url+'ajax/operatorchat.php',type:"POST",data:"id=check_only",dataType:"json",timeout:3000,cache:false});request.done(function(idledata){handleOPC(idledata)})}function handleOPC(msg){if(msg.startcalling){[].forEach.call(msg.win,function(res){var substr=res.split(':#:');if(ls.opid!=substr[0]){if($('div[data-uid="'+substr[0]+'"]').length==0){PopupChat(substr[0],substr[1],1)}}})}}function liveChat(){$('.chatbox').each(function(){var is_typing;var this_chatbox=$(this);var this_chatbox_chat_area=$('.chat_area',this);var this_chatbox_headerbg=$('.header',this);var this_chatbox_header=$('.header p',this);var this_chatbox_max_btn=$('.header .maximize_chatbox',this);var this_chatbox_id=$(this).data('uid');var this_newmessage=$('.header p .new_message',this);if(this_chatbox.data('havenewmessage')==1&&this_chatbox.data('fistload')==1){if(this_chatbox.data('blink')==0){this_chatbox_headerbg.removeClass("header_bg_default").addClass("header_bg_blink");this_chatbox.data('blink',1)}else{this_chatbox.data('blink',0);this_chatbox_headerbg.removeClass("header_bg_blink").addClass("header_bg_default")}}var request=$.ajax({async: true,type:"POST",url:ls.main_url+'ajax/operatorchat.php',data:'page=load-msg&uid='+ls.opid+'&partner_id='+this_chatbox_id+'&is_typing='+is_typing,dataType:"json",timeout:3000,cache:false});request.done(function(data){if(data.status){this_chatbox_chat_area.html(data.msg);if(prev_length[this_chatbox_id]!=data.msg.length){if(data.msg.indexOf('Last message sent at')==-1){if(this_chatbox.data('focused')!=1&&this_chatbox.data('havenewmessage')!=1){if(this_chatbox.data('fistload')==1){this_chatbox.data('havenewmessage',1)}}}if(this_chatbox.data('fistload')!=1){this_chatbox.data('fistload',1)}this_chatbox_chat_area.animate({scrollTop:9999999},200)}prev_length[this_chatbox_id]=data.msg.length}else{}})})}function PopupChat(partner_id,partner_username,chatbox_status){windowscount++;chatboxcount++;var wctr=windowscount;$('body').append('<div class="chatbox cb_default" id="chat_window_'+wctr+'" data-uid="'+partner_id+'">'+'<div class="header header_bg_default" title="'+partner_username+'">'+'<p>'+partner_username+'</p>'+'<a href="javascript:void(0)" class="close_chatbox" title="close chat window">X</a>'+'<a href="javascript:void(0)" class="minimize_chatbox" title="minimize chat window">_</a>'+'<a href="javascript:void(0)" class="maximize_chatbox" title="maximize chat window">&#8254;</a>'+'</div>'+'<div class="chat_area" title="'+partner_username+'">'+'</div>'+'<div class="chat_message">'+'<textarea></textarea>'+'</div>'+'</div>');if(chatbox_status==2){$('#chat_window_'+wctr).css('height','0px');$('#chat_window_'+wctr).css('height','25px');$('#chat_window_'+wctr+',.minimize_chatbox').css('display','none');$('#chat_window_'+wctr+',.maximize_chatbox').css('display','inline')}var nu_w_pos=0;if(chatboxcount==1){nu_w_pos=10}else{nu_w_pos=((chatboxcount-1)*225)+10}$('#chat_window_'+wctr).css('right',nu_w_pos+'px');$('#chat_window_'+wctr).data('chatbox_status',chatbox_status);$('#chat_window_'+wctr).data('partner_id',partner_id);$('#chat_window_'+wctr).data('partner_username',partner_username);if(rlsbint){clearInterval(rlsbint);rlsbint=null}rlsbint=setInterval("liveChat();",3000)}