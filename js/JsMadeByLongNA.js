/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function openSecondPage(dishNumber)
{

    var menuForDate = document.getElementById("myTime").value;
    
    window.open("FoodSelector.php?dishNumber=" + dishNumber + "&menuForDate='"+menuForDate+"'", "_blank", "toolbar=no, scrollbars=no, resizable=no, top=200, left=500, width=400, height=400");
}