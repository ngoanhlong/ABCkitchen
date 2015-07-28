
function sendRequest(dishNumber)
{
    if (confirm("Bạn có chắc chắn những thay đổi này ? "))
    {
        var dishName = document.getElementById("dishName").value;
        var description = document.getElementById("description").value;
        var price = document.getElementById("price").value;
        var expenseType = document.getElementById("expenseType").value;
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
        xmlhttp.open("GET", "updateOk.php?dishNumber=" + dishNumber + "&dishName='" + dishName + "'&description='" + description + "'&price=" + price +"&expenseType="+expenseType, true);
        xmlhttp.send();
        alert("updateOk.php?dishNumber=" + dishNumber + "&dishName='" + dishName + "'&description='" + description + "'&price=" + price +"&expenseType="+expenseType);
        alert("Cập nhật thay đổi thành công!");
    }
}