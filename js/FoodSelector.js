
function dishCancel(dishNumber, menuForDate)
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
    
        if(confirm("Bạn đồng ý hủy món này chứ"))
        {
        xmlhttp.open("GET","FoodSelectorAjaxCancel.php?dishNumber="+dishNumber+"&menuForDate='"+menuForDate+"'",true);
        xmlhttp.send("FoodSelectorAjaxCancel.php?dishNumber="+dishNumber+"&menuForDate='"+menuForDate+"'");
        alert("Bạn đã hủy thành công món an này");  
        showPage(1);
        }
}

//var app = angular.module('myApp', []);
//app.controller('myController', function($scope)
//{
//    var xmlhttp;
//	if (window.XMLHttpRequest)
//	  {// code for IE7+, Firefox, Chrome, Opera, Safari
//	  xmlhttp=new XMLHttpRequest();
//	  }
//	else
//	  {// code for IE6, IE5
//	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
//	  }
//	xmlhttp.onreadystatechange=function()
//	  {
//	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
//		{
//		
//		}
//	  }
//    
//    $scope.buttonOk = true;
//    $scope.dishOk = function(dishNumber, menuForDate)
//    {
//        alert("FoodSelectorAjaxOk.php?dishNumber="+dishNumber+"&menuForDate='"+menuForDate+"'");
//        if(confirm("Ban chac chan chon mon an nay chu"))
//        {
//        $scope.buttonOk = !$scope.buttonOk;
//        xmlhttp.open("GET","FoodSelectorAjaxOk.php?dishNumber="+dishNumber+"&menuForDate='"+menuForDate+"'",true);
//        xmlhttp.send();
//        
//        alert("Ban da chon thanh cong mon an nay");   
//        }
//        
//    };
//    $scope.dishCancel = function(dishNumber, userName)
//    {
//        alert("FoodSelectorAjaxOk.php?dishNumber="+dishNumber+"&menuForDate='"+menuForDate+"'");
//        if(confirm("Ban chac chan chon huy chon mon nay chu"))
//        {
//        $scope.buttonOk = !$scope.buttonOk;
//        xmlhttp.open("GET","FoodSelectorAjaxCancel.php?dishNumber="+dishNumber+"&userName="+userName,true);
//        xmlhttp.send();
//        alert("Ban da Huy thanh cong mon an nay");        }
//    };
//});
//
