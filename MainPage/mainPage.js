function goToExam() {
    location.href = '../Exam/exam1.php';
}
function goToReview() {
    location.href = '../Review/review.php';
}
function goToExport() {
    location.href = '../Export/export.html';
}
//Menu
function openLeftMenu() {
    document.getElementById("leftMenu").style.display = "block";
}

function closeLeftMenu() {
    document.getElementById("leftMenu").style.display = "none";
}


// Drop zone functions
function uploadFile() {
    var input = document.getElementById('fileUpload');
    var infoArea = document.getElementById('insideText');
    var fileName = input.files[0].name;

    //Shows the chosen file name
    infoArea.textContent = 'File name: ' + fileName;

    //Shows the buttons only after uploading csv file
    var button = document.getElementById('upload').addEventListener("click", function () { document.getElementById('buttons').style.display = "inline-block"; })
}
