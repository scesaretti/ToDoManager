$(document).on('submit', '#task-form', function(){
// get form data
var form_data=$(this).serializeObject();
var payload = "{\"taskDescr\":\""+form_data["taskDescr"]+"\",\"taskPriority\":\""+form_data["taskPriority"]+"\"}";
$.ajax({
        url: initPath+"/create.php",
        type : "POST",
        contentType : 'application/json',
      	data : payload,
        success : function(result) {
	
        showTasks();
      },
       error: function(xhr, resp, text) {
         $('#message').html("Error in insert data");
         return false;

        }
});
 


});


