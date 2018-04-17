var app = angular.module('tambo',[]);

app.controller('GameController', function($scope, $http, $interval){
    
    $scope.winningNumbers = [];
    $scope.latest = null;
    
    $scope.updateResults = function() {    
        $http.get('game-feeder').then(function(res){
            $scope.winningNumbers = res.data;
            lists = Object.keys($scope.winningNumbers);
            key = lists[lists.length - 1];        
            $scope.latest = $scope.winningNumbers[key];
        });        
    }
    
    $scope.isNumbersCalled = function(index){        
       
        lists = Object.keys($scope.winningNumbers);
        var r = false;
        angular.forEach(lists, function(k){
            if((index) === $scope.winningNumbers[k]) {
                r = true;
            }
        });
        
        return r;
    
    }
    
    
    $interval($scope.updateResults, 10000);    
    $scope.updateResults();
});