
var app = angular.module('myApp', []);
app.controller('myController', function ($scope) {
    $scope.checkInput = true;

    $scope.$watch('imageName', function () {
        $scope.completeCreateNewDish();
    });
    $scope.$watch('dishName', function () {
        $scope.completeCreateNewDish();
    });
    $scope.$watch('description', function () {
        $scope.completeCreateNewDish();
    });
    $scope.$watch('price', function () {
        $scope.completeCreateNewDish();
    });
    
    $scope.$watch('employeeNumber', function () {
        $scope.completeCreateNewEmployee()();
    });
    $scope.$watch('fullName', function () {
        $scope.completeCreateNewEmployee();
    });
    $scope.$watch('employeeType', function () {
        $scope.completeCreateNewEmployee();
    });
    
    $scope.completeCreateNewDish = function ()
    {
        $scope.checkInput = true;
        if ($scope.imageName.length && $scope.dishName.length && $scope.description.length && $scope.price.length)
        {
            $scope.checkInput = false;
        }
    };
    
    $scope.completeCreateNewEmployee = function ()
    {
        $scope.checkInput = true;
        if ($scope.employeeNumber.length && $scope.fullName.length && $scope.employeeType.length)
        {
            $scope.checkInput = false;
        }
    };

});