function indexController($scope, $http, $location) {

	$http.get('/config/settings.json')
		.then(function(res){
			$scope.set = res.data;
			$scope.team = $scope.set.team;
		});
		
	moment.lang('nl');
			
	if (window.navigator.standalone) {
		$scope.browser = 'iosApp';
	} else {
		$scope.browser = 'hallo';
	}

	$scope.datetime		= moment();
	
	$scope.date				= [];
	$scope.date.datetime	= moment();
	$scope.date.form		= moment().format('dddd HH:mm');
	$scope.date.date		= moment().format('D MMMM');
	$scope.date.day		= moment().format('dddd');
	$scope.date.time		= moment().format('HH:mm:ss');
	
	$scope.landing			= true;
	$scope.settings		= {
										langs: [
													"NL"
												],
										lang: "NL"
									};
	
   $scope.$watch('settings.lang', function() {
		if( $scope.settings.langs.indexOf($scope.settings.lang) != -1 ){
			$http.get('/modules/mod-translation/'+$scope.settings.lang+'.json')
				.then(function(res){
					$scope.lang = res.data;
				});
		} else {
			console.log('Taal `'+$scope.settings.lang+'` is niet beschikbaar, engels is geladen');
			$http.get('/modules/mod-translation/'+$scope.settings.langs[0]+'.json')
				.then(function(res){
					$scope.lang = res.data;
				});
		}
   });
	$http.get('/config/orders.json')
		.then(function(res){
			$scope.orders			= [];
			$scope.orders.orders	= res.data.orders;
			$scope.orders.played	= res.data.done;
			
			$scope.orders.count	= res.data.orders.length;
			$scope.orders.done	= 0;
			$scope.orders.inPlay	= 0;
			
			for(var i = 0; i < $scope.orders.orders.length; i++){
				
				if($scope.orders.orders[i].status == 1){
					$scope.orders.done += 1;
				}else if($scope.orders.orders[i].status == 2){
					$scope.orders.inPlay += 1;
				}
			}
			console.log($scope.orders.inPlay);
			$scope.orders.show = 5;
	});
	$scope.modal		= [];
	
	$scope.showModal = function (data){
		$scope.modal.show				= true;
		$scope.modal.large			= false;
		$scope.modal.order			= data;
	};
	$scope.hideModal = function (){
		$scope.modal.show				= false;
		$scope.modal.order			= [];
	};

}