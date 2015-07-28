
function sendRequest(employeeNumber)
{
    if (confirm("Bạn có chắc chắn những thay đổi này ? "))
    {
        var employeeName = document.getElementById("employeeName").value;
        var employeeType = document.getElementById("employeeType").value;
        var gender = document.getElementById("gender").value;
        
        var xmlhttp;
        if (window.XMLHttpRequest)
        {// code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        }
        else
        {// code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function ()
        {

        };
        xmlhttp.open("GET", "updateOk.php?employeeNumber=" + employeeNumber + "&employeeName='" + employeeName + "'&employeeType='" + employeeType + "'&gender=" + gender, true);
        xmlhttp.send();
        alert("Cập nhật thay đổi thành công!");
    }
}