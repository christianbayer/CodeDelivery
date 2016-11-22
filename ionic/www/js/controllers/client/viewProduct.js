angular.module('starter.controllers')
    .controller('ClientViewProductCtrl', ['$scope', '$state', 'Product', '$ionicLoading', 'cart', '$localStorage', function ($scope, $state, Product, $ionicLoading, cart, $localStorage) {

        $localStorage.setObject('cart', {name: 'teste', value: '1020'});

        $scope.products = [];
        $ionicLoading.show({
            template: 'Loading...'
        });
        Product.query({}, function (data) {
            $scope.products = data.data;
            $ionicLoading.hide();
        }, function(dataError) {
            $ionicLoading.hide();
        });

        $scope.addItem = function(item) {
            cart.items.push(item);
            $state.go('client.checkout')
        };

    }]);