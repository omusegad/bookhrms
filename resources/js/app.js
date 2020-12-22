require('./bootstrap');



// get number of days from
function getDate() {
    var start_date = document.getElementById("start_date").value;
    var end_date = document.getElementById("end_date").value;

    if (start_date || end_date) {
        start_date = new Date(start_date);
        end_date = new Date(end_date);
        var diff = start_date.getTime() - end_date.getTime();
        var days = diff / (1000 * 60 * 60 * 24);
        document.getElementById('days').val(days);
    }
    console.log(days);


}

getDate();