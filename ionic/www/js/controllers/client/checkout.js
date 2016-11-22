angular.module('starter.controllers')
    .controller('ClientCheckoutCtrl', ['$scope', '$state', 'cart', '$localStorage', function ($scope, $state, cart, $localStorage) {

        console.log($localStorage.getObject('cart'));

        $scope.items = cart.items;

    }]);