$('#btnclosetask').click(function()
{
});


$.ajax({
        url: initPath+"/update.php",
        type : "POST",
        contentType : 'application/json',
        data : form_data["idtask"],
        success : function(result) {
        showTask();
      },
       error: function(xhr, resp, text) {
         $('#message').html("Error in closing task");
        return false;

        }
});
 



}
