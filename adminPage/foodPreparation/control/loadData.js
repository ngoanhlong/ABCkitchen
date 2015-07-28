
function loadData()
{
    var menuForDate = document.getElementById("menu").value;
    loadDishMenuData(1, 10, '');
    loadMenuData(1, menuForDate);
}

function loadDishMenuData(page, recordNumber, c)
{
    var menuForDate = document.getElementById("menu").value;
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
            document.getElementById("loadDishMenuData").innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open("GET", "../foodPreparation/model/loadDishMenuData.php?page=" + page + "&recordNumber=" + recordNumber + "&c='%" + c + "%'&menuForDate='"+menuForDate +"'", true);
    xmlhttp.send();
}

function addNewDishIntoMenu(dishNumber, menuForDate)
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
    if (confirm("Bạn chắc chắn muốn thêm món ăn này vào Menu ??? "))
    {
        xmlhttp.onreadystatechange = function ()
        {
            
        };
        xmlhttp.open("GET", "../foodPreparation/model/addNewDish.php?dishNumber=" + dishNumber+"&menuForDate='"+menuForDate+"'", true);
        xmlhttp.send();
        loadMenuData(1, menuForDate);
        loadDishMenuData(1,10,'');
        alert("Thêm món ăn thành công! ");
    }
}
//
//function deleteADish(dishNumber)
//{
//    var xmlhttp;
//    if (window.XMLHttpRequest)
//    {// code for IE7+, Firefox, Chrome, Opera, Safari
//        xmlhttp = new XMLHttpRequest();
//    }
//    else
//    {// code for IE6, IE5
//        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
//    }
//    xmlhttp.onreadystatechange = function ()
//    {
//        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
//        {
//            document.getElementById("createNewOrUpdate").innerHTML = xmlhttp.responseText;
//        }
//    }
//
//    if (confirm("Bạn chắc chắn Xóa hoàn toàn món này chứ ?"))
//    {
//        xmlhttp.open("GET", "../foodPreparation/model/deleteADish.php?dishNumber=" + dishNumber, true);
//        alert("Bạn đã xóa thành công món ăn này");
//        xmlhttp.send();
//
//
//    }
//}


function loadMenuData(page, menuForDate)
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
            document.getElementById("loadMenuData").innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open("GET", "../foodPreparation/model/loadMenuData.php?page="+page+"&menuForDate='"+menuForDate+"'", true);
    xmlhttp.send();
    loadDishMenuData(1, 10, '');
}

function deleteADishFromMenu(ID, menuForDate)
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
    if (confirm("Bạn chắc chắn xóa món ăn này khỏi menu ??? "))
    {
        xmlhttp.onreadystatechange = function ()
        {
            
        };
        xmlhttp.open("GET", "../foodPreparation/model/deleteADish.php?ID=" + ID, true);
        xmlhttp.send();
        loadMenuData(1, menuForDate);
        loadDishMenuData(1,10,'');
        alert("Đã xóa thành công! ");
    }
}