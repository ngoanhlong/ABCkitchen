
function loadEmployeeData(page, recordNumber, c)
{
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
        if (xmlhttp.readyState === 4 && xmlhttp.status === 200)
        {
            document.getElementById("loadEmployeeData").innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open("GET", "../employeeManagement/model/loadEmployeeData.php?page="+page+"&recordNumber="+recordNumber+"&c='%"+c+"%'", true);
    xmlhttp.send();
}

function deleteAnEmployee(employeeNumber)
{
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
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            
        }
    }

    if (confirm("Bạn chắc chắn Xóa nhân viên này chứ ?"))
    {
        xmlhttp.open("GET", "../employeeManagement/model/deleteAnEmployee.php?employeeNumber=" + employeeNumber, true);
        alert("Bạn đã xóa thành công nhân viên này");
        xmlhttp.send();
        
        
    }
}


