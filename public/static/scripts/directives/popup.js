angular.module('dnji', [])
	.directive('popup', function () {
		return {
			restrict: 'E',
			templateUrl: 'views/ui/popup.html',
			replace: true,
			transclude: true,
			scope: {
				lolly: '='
			},
			link: function (scope, elem, attrs) {
				console.log('hoi', scope.lolly)
				scope.popupShow			= scope.lolly || false;
				console.log('hoi', scope.popupShow)
				setTimeout(function(){
				}, 100);
				//scope.popupShow	= true;
			}
		}
	});