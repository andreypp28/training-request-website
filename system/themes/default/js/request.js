$('#request-form').submit(function(e) {
    e.preventDefault();
    
    $.ajax({
      url: base_url + 'home/submit_request',
      type: 'post',
      dataType: 'json',
      data: $(this).serialize(),
      beforeSend : function (){
        $.blockUI({overlayCSS: { backgroundColor: '#00f'}}); 
      },
      success: function(res) {
          $.unblockUI();
          
          if(res.status == 0)
          {
              $.growl.error({message: res.msg, duration:3000});  
          }
          else
          {
              $.growl.notice({message: res.msg, duration:3000});  
              $('#request-form')[0].reset();
          }
      }
    });
    ;
});