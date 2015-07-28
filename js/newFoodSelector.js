/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function dishOk(dishNumber, menuForDate)
{
    var xmlhttp;
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		
		}
	  }
    
        if(confirm("Bạn chắc chắn chọn món này chứ ???"))
        {
        xmlhttp.open("GET","FoodSelectorAjaxOk.php?dishNumber="+dishNumber+"&menuForDate='"+menuForDate+"'",true);
        xmlhttp.send();
        alert("Ban da chon thanh cong mon an nay");   
        }
}