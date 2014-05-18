angular.module('banaan', [])
	.directive('scroll', function ($window, $rootScope) {
		return function(scope, element, attrs, $rootScope) {
			if(!localStorage.getItem("landing")){
				angular.element($window).bind("scroll", function(){
					scope.cbscroll = (this.pageYOffset) - ($window.innerHeight);
					console.log(scope.cbscroll);
					if (this.pageYOffset >= $window.innerHeight) {
						scope.boolChangeClass = true;
						scope.$parent.landing = false;
						$window.scrollTo(0,scope.cbscroll);
						angular.element($window).unbind("scroll");
						localStorage.setItem("landing", 'hide');
					}
					scope.$apply();
				});
			} else {
				angular.element($window).unbind("scroll");
				console.log('landing word niet getoont');
				scope.boolChangeClass = true;
			}
		};
	});