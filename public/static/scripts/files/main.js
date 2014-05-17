function indexController($scope, $http) {
	moment.lang('nl');
	
	if (window.navigator.standalone) {
		$scope.browser = 'iosApp';
	} else {
		$scope.browser = 'hallo';
	}
	/*
	setInterval(
		function(){
			$http({
						method: 'GET',
						url: '/api/program'
					}).
						success(function(response, status, headers, config) {
							$scope.program	= response;
							for(var i = 0; i < $scope.program.length; i++){
								$scope.program[i].till	= moment($scope.program[i].date).fromNow();
							}
						});
		}, 3000);*/
	
	setInterval(getProgram, 3000);
	
	function getProgram(){
		$http({
					method: 'GET',
					url: '../api/program.php'
				}).
		success(function(response, status, headers, config) {
			$scope.program	= response;
			for(var i = 0; i < $scope.program.length; i++){
				$scope.program[i].till	= moment($scope.program[i].date).fromNow();
			}
		});
	}
	
	$http({
				method: 'GET',
				url: '../api/gallery.php'
			}).
				success(function(response, status, headers, config) {
					$scope.images	= response;
				});
	var data = {
	    username: 'robin',
	    password: 'admin'
	};
	
	//var responseUsers	= 

	$http({
				method: 'POST',
				data: data,
				url: '../api/users.php'
			}).
				success(function(response, status, headers, config) {
					console.log(response);
				});

}