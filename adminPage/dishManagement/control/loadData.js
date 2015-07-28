
function loadDishData(page, recordNumber, c)
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
            document.getElementById("loadDishData").innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open("GET", "../dishManagement/model/loadDishData.php?page="+page+"&recordNumber="+recordNumber+"&c='%"+c+"%'", true);
    xmlhttp.send();
    
}

function deleteADish(dishNumber)
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
            document.getElementById("createNewOrUpdate").innerHTML = xmlhttp.responseText;
        }
    }

    if (confirm("Bạn chắc chắn Xóa hoàn toàn món này chứ ?"))
    {
        xmlhttp.open("GET", "../dishManagement/model/deleteADish.php?dishNumber=" + dishNumber, true);
        alert("Bạn đã xóa thành công món ăn này");
        xmlhttp.send();
        
        
    }
}


