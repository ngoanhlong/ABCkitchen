/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function confirmOkThisFood()
{
    
    var order = confirm("Bạn thật sự muốn đặt món ăn này chứ, bạn cũng có thể abcxyz");
//    var order = 
    if(order === true)
    {
        alert("Bạn đã đặt thành công món ăn này");
    }
    
}



function openSecondPage(dishNumber, menuForDate)
{
    
        window.open("FoodSelectorRegisterResult.php?dishNumber="+dishNumber+"&menuForDate='"+menuForDate+"'", "_blank", "toolbar=no, scrollbars=no, resizable=no, top=200, left=500, width=400, height=400");
}