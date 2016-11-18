angular.module('starter.controllers')
    .controller('ClientCheckoutCtrl', ['$scope', 'OAuth', '$ionicPopup', '$state', function ($scope, OAuth, $ionicPopup, $state) {

        $scope.user = {
            username: '',
            password: ''
        };

        $scope.login = function () {
            OAuth.getAccessToken($scope.user).then(function (data) {
                $state.go('home');
            }, function (responseError) {
                $ionicPopup.alert({
                    title: 'Error',
                    template: 'Invalid Username or Password!'
                });
                console.log('erro no login')
            });
        }
    }]);