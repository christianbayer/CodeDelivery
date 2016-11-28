angular.module('starter.controllers')
    .controller('ClientCheckoutSuccessfulCtrl', ['$scope', '$state', '$cart', 'Order', function ($scope, $state, $cart, Order) {

        var cart = $cart.get();
        $scope.items = cart.items;
        $scope.total = cart.total;
        $cart.clear();
        
        $scope.openListOrder = function () {
            
        }

    }]);