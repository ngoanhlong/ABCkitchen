
var app = angular.module('myApp', []);
app.controller('myController', function ($scope) {
    $scope.checkUpdate = false;
    $scope.checkInput = true;

    $scope.$watch('imageName', function () {
        $scope.completeCreateNewemployee();
    });
    $scope.$watch('employeeName', function () {
        $scope.completeCreateNewemployee();
    });
    $scope.$watch('description', function () {
        $scope.completeCreateNewemployee();
    });
    $scope.$watch('price', function () {
        $scope.completeCreateNewemployee();
    });
    
    $scope.$watch('employeeNumber', function () {
        $scope.completeCreateNewEmployee()();
    });
    $scope.$watch('employeeName', function () {
        $scope.completeCreateNewEmployee();
    });
    $scope.$watch('employeeType', function () {
        $scope.completeCreateNewEmployee();
    });
    
    $scope.completeCreateNewemployee = function ()
    {
        $scope.checkInput = true;
        if ($scope.imageName.length && $scope.employeeName.length && $scope.description.length && $scope.price.length)
        {
            $scope.checkInput = false;
        }
    };
    
    $scope.completeCreateNewEmployee = function ()
    {
        $scope.checkInput = true;
        if ($scope.employeeNumber.length && $scope.employeeName.length && $scope.employeeType.length)
        {
            $scope.checkInput = false;
        }
    };

});