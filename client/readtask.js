function showTasks()
{
    $.getJSON(initPath+"read.php", function(data){
        $.each(data.records, function(i,item) {
            appendToTaskTable(item);
        });
    });
}

function appendToTaskTable(item)
{
    var state="Open";
    if (item.taskstate==1)
    {
        state="Open";
    } 
     else 
    {
        state="Closed";
    }                 
    $( "#task_table" ).append("<tr> <td>" + item.taskdescr + "</td>" +
                                   "<td>" + item.taskdate + "</td>" +
                                   "<td>" + item.taskpriority + "</td>" +
                                   "<td>" + state + "</td>"+
                                   "<td><button id=\"btnclosetask\">Close Task</button></td>" +

          "</tr>");
}
