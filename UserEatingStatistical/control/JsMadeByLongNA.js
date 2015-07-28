

function openSecondPage(dishNumber)
{
       window.open("UserEatingStatistical/model/FoodSelector.php?dishNumber="+dishNumber, "_blank", "toolbar=no, scrollbars=no, resizable=no, top=200, left=500, width=400, height=400");
        
}

function updateInfo(expenseNumber)
{
    window.open("UserEatingStatistical/model/updateInfo.php?expenseNumber="+expenseNumber , "_blank", "toolbar=no, scrollbars=no, resizable=no, top=100, left=400, width=500, height=500");
}