(function($){

  // Add membar
  jQuery('#sing_up_form').validate({
    submitHandler: function(){
      var postdata = jQuery('#sing_up_form').serialize() + "&action=mess_expenses&param=add_member";

      jQuery.post(ajaxurl,postdata,function(response){

        console.log(response);
      })
      .fail(function(response){
        alert(ajax.error);
      });
    }
  })

})(jQuery);