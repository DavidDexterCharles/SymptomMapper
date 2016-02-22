(function () {
	'use strict';

	angular.module('Mapper',['ngMaterial', 'ngMessages', 'ngMap','acute.select'])

	.run(function (acuteSelectService) {
		// Set the template path for all instances
		acuteSelectService.updateSetting("templatePath", "js/templates");
	})

	.controller('DiagCtrl', function( $scope ) {

		$scope.map = function(){
			  var list=getData();
                
               initMap(getData());
		};
		
		$scope.data = {
			selectedIndex: 0,
			secondLocked:  true,
			secondLabel:   "Item Two",
			bottom:        false
		};
		$scope.next = function() {
			$scope.data.selectedIndex = Math.min($scope.data.selectedIndex + 1, 2) ;
		};
		$scope.previous = function() {
			$scope.data.selectedIndex = Math.max($scope.data.selectedIndex - 1, 0);
		};

		$scope.colours = [
			{ name: 'black', id: 0 },
			{ name: 'white', id: 1 },
			{ name: 'red', id: 2 },
			{ name: 'blue', id: 3 },
			{ name: 'yellow', id: 4 },
			{ name: 'orange', id: 5 },
			{ name: 'purple', id: 6 },
			{ name: 'green', id: 7 },
			{ name: 'brown', id: 8 },
			{ name: 'grey', id: 9 },
			{ name: 'aquamarine', id: 10 }
		];

		$scope.selectedColour = $scope.colours[2]; // red.

		$scope.colourChanged = function (value) {
			var colourName = value ? value.name : "none";
			$scope.message = "ac-change event fired for colour. New colour: " + colourName;
			$scope.$digest();
		};

		$scope.selectedState = null;

		// Return all states when dropdown first opens
		$scope.getAllStates = function (callback) {
			callback($scope.allStates);
		};

		$scope.stateSelected = function (state) {
			$scope.stateInfo = state.name + " (" + state.id + ")";
		}

		$scope.allStates = [
			{ "name": "Alabama", "id": "AL" },
			{ "name": "Alaska", "id": "AK" },
			{ "name": "Arizona", "id": "AZ" },
			{ "name": "Arkansas", "id": "AR" },
			{ "name": "California", "id": "CA" },
			{ "name": "Colorado", "id": "CO" },
			{ "name": "Connecticut", "id": "CT" },
			{ "name": "Delaware", "id": "DE" },
			{ "name": "District of Columbia", "id": "DC" },
			{ "name": "Florida", "id": "FL" },
			{ "name": "Georgia", "id": "GA" },
			{ "name": "Hawaii", "id": "HI" },
			{ "name": "Idaho", "id": "ID" },
			{ "name": "Illinois", "id": "IL" },
			{ "name": "Indiana", "id": "IN" },
			{ "name": "Iowa", "id": "IA" },
			{ "name": "Kansas", "id": "KS" },
			{ "name": "Kentucky", "id": "KY" },
			{ "name": "Lousiana", "id": "LA" },
			{ "name": "Maine", "id": "ME" },
			{ "name": "Maryland", "id": "MD" },
			{ "name": "Massachusetts", "id": "MA" },
			{ "name": "Michigan", "id": "MI" },
			{ "name": "Minnesota", "id": "MN" },
			{ "name": "Mississippi", "id": "MS" },
			{ "name": "Missouri", "id": "MO" },
			{ "name": "Montana", "id": "MT" },
			{ "name": "Nebraska", "id": "NE" },
			{ "name": "Nevada", "id": "NV" },
			{ "name": "New Hampshire", "id": "NH" },
			{ "name": "New Jersey", "id": "NJ" },
			{ "name": "New Mexico", "id": "NM" },
			{ "name": "New York", "id": "NY" },
			{ "name": "North Carolina", "id": "NC" },
			{ "name": "North Dakota", "id": "ND" },
			{ "name": "Ohio", "id": "OH" },
			{ "name": "Oklahoma", "id": "OK" },
			{ "name": "Oregon", "id": "OR" },
			{ "name": "Pennsylvania", "id": "PA" },
			{ "name": "Rhode Island", "id": "RI" },
			{ "name": "South Carolina", "id": "SC" },
			{ "name": "South Dakota", "id": "SD" },
			{ "name": "Tennessee", "id": "TN" },
			{ "name": "Texas", "id": "TX" },
			{ "name": "Utah", "id": "UT" },
			{ "name": "Vermont", "id": "VT" },
			{ "name": "Virginia", "id": "VA" },
			{ "name": "Washington", "id": "WA" },
			{ "name": "West Virginia", "id": "WV" },
			{ "name": "Wisconsin", "id": "WI" },
			{ "name": "Wyoming", "id": "WY" }
		];

	})

	.controller('MapCtrl', function($scope) {
		  $scope.positions =[
		      {pos:[40.71, -74.21]},
		      {pos:[40.72, -74.20]},
		      {pos:[40.73, -74.19]},
		      {pos:[40.74, -74.18]},
		      {pos:[40.75, -74.17]},
		      {pos:[40.76, -74.16]},
		      {pos:[40.77, -74.15]}
		    ];
		   
		   	$scope.data={
		   		posArr : []
		   	};

		    $scope.getData=function(){
		    	var southWest = new google.maps.LatLng(40.744656, -74.005966);
                var northEast = new google.maps.LatLng(34.052234, -118.243685);
                var lngSpan = northEast.lng() - southWest.lng();
                var latSpan = northEast.lat() - southWest.lat();

                 // set multiple marker
                
                for (var i = 0; i <50; i++) {
        
                    var obj={
                    	pos:[southWest.lat() + latSpan * Math.random(), southWest.lng() + lngSpan * Math.random()]
                    }
                    //console.log(JSON.stringify(obj.position));
                    $scope.data.posArr.push(obj);
                    
                }
               //for (var i = 0; i <50; i++) {
               	//	console.log(JSON.stringify($scope.data.pos));	
               //} 	
                    
		    };

		    $scope.check=function(){
		    	for (var i = 0; i <50; i++) {
               		console.log(JSON.stringify($scope.data.posArr));	
               } 	
		    }
		    
		});


})();