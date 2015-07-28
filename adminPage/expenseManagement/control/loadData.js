
function loadExpenseData(page, recordNumber, c)
{
    var year = document.getElementById("year").value;
    var month = document.getElementById("month").value;
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
            document.getElementById("loadExpenseData").innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open("GET", "../expenseManagement/model/loadExpenseData.php?page="+page+"&recordNumber="+recordNumber+"&c='%"+c+"%'&year="+year+"&month="+month, true);
    xmlhttp.send();
    
}

function deleteAnExpense(dishNumber)
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
    }

    if (confirm("Bạn chắc chắn Xóa hoàn toàn khoản chi này ???"))
    {
        xmlhttp.open("GET", "../expenseManagement/model/deleteADish.php?dishNumber=" + dishNumber, true);
        alert("Bạn đã xóa thành công món ăn này");
        xmlhttp.send();
        loadExpenseData(1, 10, '');
        
    }
}


