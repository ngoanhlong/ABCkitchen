

function openSecondPage(dishNumber)
{
       window.open("../dishManagement/model/FoodSelector.php?dishNumber="+dishNumber, "_blank", "toolbar=no, scrollbars=no, resizable=no, top=200, left=500, width=400, height=400");
        
}

function updateInfo(dishNumber)
{
    window.open("../dishManagement/model/updateInfo.php?dishNumber="+dishNumber , "_blank", "toolbar=no, scrollbars=no, resizable=no, top=100, left=400, width=500, height=500");
}