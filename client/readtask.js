function showTasks()
{
    $.getJSON(initPath+"read.php", function(data){
        $.each(data.records, function(i, item) {
            appendToTaskTable(item);
        });
    });
}

function appendToTaskTable(item){
    $( "#task_table" ).append("<tr> <td>" + item.taskdescr + "</td>" +
                                   "<td>" + item.taskdate + "</td>" +
                                   "<td>" + item.taskpriority + "</td>" +
                                   "<td>" + item.taskstate + "</td>" +

                              "</tr>" );
}
