$(document).on('submit', '#task-form', function(){
// get form data
var form_data=JSON.stringify($(this).serializeObject());
$.ajax({
    url: initPath+"/create.php",
    type : "POST",
    contentType : 'application/json',
    data : form_data,
    success : function(result) {
        showTask();
    },
    error: function(xhr, resp, text) {
        console.log(xhr, resp, text);
    }
});
 
return false;


});


