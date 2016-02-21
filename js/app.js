var app = angular.module( 'Mapper', [ 'ngMaterial', 'acute.select' ] );

app.controller("DiagCtrl", function($scope){
   $scope.getAllStates = function (callback) {
    callback($scope.allStates);
};

$scope.stateSelected = function (state) {
    $scope.stateInfo = state.name + " (" + state.id + ")";
}

$scope.allStates = [
    { "name": "Alabama", "id": "AL" },
    { "name": "Alaska", "id": "AK" },
]
});
