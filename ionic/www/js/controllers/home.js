angular.module('starter.controllers', []).
    controller('HomeCtrl', function($scope, $stateParams) {
        $scope.name = $stateParams.name;
    });