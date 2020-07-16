
$(document).ready(function () {

    $.ajax({
        type: 'GET',
        url: "http://cainsr2.383.csi.miamioh.edu/cse383-f19-cainsr2/FinalProject/rest.php/v1/quickLink",
        success: function (data) {
            for (let key in data) {
                addToTable(data[key]);
            }
        }
    })
})

function deleteEntry(entry) {
    var obj = {"token" : entry};
    obj = JSON.stringify(obj);
    console.log(obj);

    $.ajax({
        type: 'DELETE',
        url: "http://cainsr2.383.csi.miamioh.edu/cse383-f19-cainsr2/FinalProject/rest.php/v1/quickLink",
        data: obj,
        success: function(data) {
            console.log(data);
        }
    })
}

function addToTable(entry) {
    var thing = entry;
    console.log(thing);
    var result="<tr>"
    result += "<td>"+entry.id+"</td>";
    result += "<td>"+entry.title+"</td>";
    result += "<td>"+entry.url+"</td>";
    result += "<td><button class=\"btn\" onClick=\"deleteEntry(" + thing.id + ")\">Delete</button></td>";
    result += "</tr>";
    $("#table").append(result);
}