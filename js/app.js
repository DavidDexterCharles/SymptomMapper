(function () {
	'use strict';

	angular.module('Mapper',['ngMaterial', 'ngMessages', 'ngMap','acute.select'])

	.run(function (acuteSelectService) {
		acuteSelectService.updateSetting("templatePath", "js/templates");
	})
	.controller('DiagCtrl', function ($scope, $timeout, $mdSidenav, $log, $http) {

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


		$scope.selectedState = null;

		$scope.symptoms = [];

		// Return all states when dropdown first opens
		$scope.getAllStates = function (callback) {

			$http.get("http://udksf1b9bd3f.duskdev.koding.io//SymptomMapper/INFERMEDICA/symptoms.php")
				.then(function(response) {
					$scope.allStates = response.data;
					console.log(response);
					callback($scope.allStates);
				});
			$http.get("http://udksf1b9bd3f.duskdev.koding.io:8080/facts")
				.then(function(response) {
					$scope.facts = response.data;
					console.log(response);
				});

		};

		$scope.stateSelected = function (state) {
			$scope.stateInfo = state.name + " (" + state.id + ")";
			$scope.symptoms.push(state);
			console.log()
		};

		$scope.diagnosis = [
			{
				"question": {
					"type": "single",
					"text": "string",
					"items": [
						{
							"id": "string",
							"name": "string",
							"choices": [
								{
									"id": "present",
									"label": "string"
								}
							]
						}
					],
					"extras": {}
				},
				"conditions": [
					{
						"id": "string",
						"name": "string",
						"probability": 0
					}
				],
				"extras": {}
			},
			{
				"question": {
					"type": "single",
					"text": "string",
					"items": [
						{
							"id": "string",
							"name": "string",
							"choices": [
								{
									"id": "present",
									"label": "string"
								}
							]
						}
					],
					"extras": {}
				},
				"conditions": [
					{
						"id": "string",
						"name": "string",
						"probability": 0
					}
				],
				"extras": {}
			}
		];

		$scope.toggleLeft = buildDelayedToggler('left');

		function debounce(func, wait, context) {
			var timer;
			return function debounced() {
				var context = $scope,
					args = Array.prototype.slice.call(arguments);
				$timeout.cancel(timer);
				timer = $timeout(function() {
					timer = undefined;
					func.apply(context, args);
				}, wait || 10);
			};
		}
		function buildDelayedToggler(navID) {
			return debounce(function() {
				$mdSidenav(navID)
					.toggle()
					.then(function () {
						$log.debug("toggle " + navID + " is done");
					});
			}, 200);
		}
	})
	.controller('LeftCtrl', function ($scope, $timeout, $mdSidenav, $log) {
		$scope.close = function () {
			$mdSidenav('left').close()
				.then(function () {
					$log.debug("close LEFT is done");
				});
		};
	})
	.controller('MapCtrl', function($scope,NgMap) {

		var heatmap, vm = this;
	    NgMap.getMap().then(function(map) {
	      vm.map = map;
	      heatmap = vm.map.heatmapLayers.foo;
	    	
	    })

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
		   	$scope.heatData=[];

		    $scope.getData=function(){
		    	var southWest = new google.maps.LatLng(40.744656, -74.005966);
                var northEast = new google.maps.LatLng(34.052234, -118.243685);
                var lngSpan = northEast.lng() - southWest.lng();
                var latSpan = northEast.lat() - southWest.lat();

                 // set multiple marker
                
                for (var i = 0; i <50; i++) {
        
                    var obj={
                    	pos:[southWest.lat() + latSpan * Math.random(), southWest.lng() + lngSpan * Math.random()],
                    	heat:new google.maps.LatLng(southWest.lat() + latSpan * Math.random(), southWest.lng() + lngSpan * Math.random())
                    }

                    //console.log(JSON.stringify(obj.position));
                    $scope.data.posArr.push(obj);
                    $scope.heatData.push(obj.heat);
                }
               //for (var i = 0; i <50; i++) {
               	//	console.log(JSON.stringify($scope.data.pos));	
               //} 	
                    
		    };

		    $scope.check=function(){
		    	for (var i = 0; i <50; i++) {
               		console.log(JSON.stringify($scope.data.posArr.heat));	
               } 	
		    }

		});

})();