

function openSecondPage(employeeNumber)
{
       window.open("../employeeManagement/model/FoodSelector.php?employeeNumber="+employeeNumber, "_blank", "toolbar=no, scrollbars=no, resizable=no, top=200, left=500, width=400, height=400");
        
}

function updateInfo(employeeNumber)
{
    window.open("../employeeManagement/model/updateInfo.php?employeeNumber="+employeeNumber , "_blank", "toolbar=no, scrollbars=no, resizable=no, top=100, left=400, width=500, height=500");
}