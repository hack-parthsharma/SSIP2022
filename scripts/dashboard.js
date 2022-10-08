$(document).ready(function () {


     var currentdate = new Date();
     var datetime = "Now: " + currentdate.getDate() + "/"
          + (currentdate.getMonth() + 1) + "/"
          + currentdate.getFullYear() + " @ "
          + currentdate.getHours() + ":"
          + currentdate.getMinutes() + ":"
          + currentdate.getSeconds();

     var greeting = $(".greeting");
     greeting.text();

     if (currentdate.getHours() < 12) {
          greeting.text("Good Morning ,");
     }
     else if (currentdate.getHours() > 11 && currentdate.getHours() < 17) {
          greeting.text("Good Afternoon ,");
     }
     else if (currentdate.getHours() > 16 && currentdate.getHours() < 19) {
          greeting.text("Good Evening ,");
     }
     else {
          greeting.text("Good Night ,");
     }


});
// table show
function AllFilesTable() {
     $(".col4").addClass("active");
     $(".col5").removeClass("active");
}

function MissingRequestTable() {
     $(".col5").addClass("active");
     $(".col4").removeClass("active");
};



function newFileOpen() {
     $(".newfilemodel").addClass("active");
};
function newFileClose() {
     $(".newfilemodel").removeClass("active");
};



function viewFileModelOpen() {
     $(".viewfilemodel").addClass("active");
}
function viewFileModelClose() {
     $(".viewfilemodel").removeClass("active");
}



updateList = function () {
     var input = document.getElementById('file');
     var output = document.getElementById('filelist');

     output.innerHTML = '<ul style="list-style-type: none;">';
     for (var i = 0; i < input.files.length; ++i) {
          output.innerHTML += '<li>' + input.files.item(i).name + '</li>';
     }
     output.innerHTML += '</ul>';
}

$('#request-check').change(function () {
     if ($('#request-check').is(':checked')) {
          $('.third').addClass("active");
     } else {
          $('.third').removeClass("active");
     }
});