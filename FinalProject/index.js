var isOpen = false;
var picClick = false;

function addToQuickLinks(data) {
    console.log(data);
    $("#quick").append("<li><a href="+data.url+">"+data.title+"</a></li>");
}

function addToVideoLinks(data) {
    $("#video").append("<li><a href="+data.id+">"+data.title+"</a></li>");
}

$(document).ready(function() {
    // Hide set zip
    $("#myForm").hide();

    // Hide large picture of me
    $("#bigme").hide();

    // Get weather
    $.ajax({
        url: "https://ceclnx01.cec.miamioh.edu/~campbest/weather.php/v1/54321/" + localStorage.getItem("zip"),
        success: function(data) {
            $("#location").append(data.location);
            $("#temp").append(data.currentTemperature);
            $("#conditions").append(data.currentConditions);
            $("#forecast").append(data.forecast);
        }
    })

    // Get Quick Links
    $.ajax({
        type: 'GET',
        url: "http://cainsr2.383.csi.miamioh.edu/cse383-f19-cainsr2/FinalProject/rest.php/v1/quickLink",
        success: function(data) {
                for (let key in data) {
                    addToQuickLinks(data[key]);
                }
        }
    })

    // Get Video Links
    $.ajax({
        type: 'GET',
        url: "http://cainsr2.383.csi.miamioh.edu/cse383-f19-cainsr2/FinalProject/rest.php/v1/videoLink",
        success: function(data) {
            for (let key in data) {
                addToVideoLinks(data[key]);
            }
        }
    })
})

$(document).on('click', "#setWeather", function () {
    if (!isOpen) { $("#myForm").show(); }
    else { $("#myForm").hide();}
    isOpen = !isOpen;
})

$(document).on('click', "#smallme", function() {
    if ( !picClick ) { $("#bigme").show(); }
    else { $("#bigme").hide(); }
    picClick = !picClick;
})

function setZip() {
    localStorage.setItem("zip", $("#zip").val());
    location.reload();
}