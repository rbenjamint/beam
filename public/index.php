<?php
	$settingSrc	= file_get_contents("config/settings.json");
	$settings	= json_decode($settingSrc, true);
	
	foreach ($settings['modules'] as $value) {
		if(file_exists($settings['modFolder'].'/'.$value)){
			if(file_exists($settings['modFolder'].'/'.$value.'/info.json')){
				$curModule	= json_decode( file_get_contents($settings['modFolder'].'/'.$value.'/info.json'), true );
				if($curModule['resources']){
					if( $curModule['resources'][0]["css"] ){
						foreach ($curModule['resources'][0]["css"] as $sub) {
							array_push( $settings['resources'][0]["css"], '%h%/%m%/'.$value.'/'.$sub);
						}
					}
					if( $curModule['resources'][0]["js"] ){
						foreach ($curModule['resources'][0]["js"] as $sub) {
							array_push( $settings['resources'][0]["js"], '%h%/%m%/'.$value.'/'.$sub);
						}
					}
				}
			} else {
				$moduleError	.= "console.log('Module: ".$value." heeft geen info.json dus kan niet volledig worden gebruikt');"."\n";
			}
		} else {
			$moduleError	.= "console.log('Module: ".$value." kan niet worden geimporteerd, map bestaat niet');"."\n";
		}
	}
	include_once('views/ui/head.php');
?>

		<div class="landing">
			<a class="beamlogo" href="{{set.beam_link}}"></a>
			<div class="socialIcons">
				<a href="{{set.youtube.link}}" target="_new">
					<div class="fa-youtube"></div>
				</a>
				<a href="{{set.facebook.link}}" target="_new">
					<div class="fa-facebook"></div>
				</a>
				<div class="count NL"></div>
			</div>
			<div class="pcenter">
				<div class="koning">
					<div class="banaan-crown"></div>
					<div class="banaan-banana"></div>
					<div class="banaan-pineapple"></div>
					<div class="fa-child"></div>
				</div>
				<div class="title">
					{{lang.title}}<div class="banaan-pineapple2"></div>
				</div>
				<div class="subtitle">
					{{lang.subtitle}}
				</div>
			</div>
			<a href="#team" class="scrolldown horCent">
				<div class="icoon"></div>
				<div class="text">
					{{lang.scroll_down}}
				</div>
			</a>
		</div>
		<div class="container">
			<div class="col-1 team">
				<a name="team"></a>
				<div class="col-1 tcenter">
					<div class="h1 pad">{{lang.team}}</div>
					<div class="h4 pad2">{{lang.teamspirit}}</div>
				</div>
				<div class="col-3" ng-repeat="person in team">
					<div class="image" ng-show="(person.image.length > 1)">
						<div class="ratio-block">
							<img ng-src="{{person.image}}">
						</div>
					</div>
					<div class="no-image" ng-show="!(person.image.length > 1)">
						<div class="ratio-block">
							<div class="h4 pcenter-abs">{{lang.no_photo}}</div>
						</div>
					</div>
					<div class="h3">{{person.name}}</div>
					<div class="h5">{{person.title}}</div>
					<p>{{person.description || lang.no_desc_yet}}</p>
				</div>
			</div>
			<div class="col-1 orders">
				<a name="orders"></a>
				<div class="col-1 tcenter">
					<div class="h1 pad">{{lang.Orders}}</div>
				</div>
				<div class="col-1 btn-bar">
					<div class="btn" ng-click="orders.show = 5" ng-class="{selected:orders.show == 5}">{{lang.show_allorders}}</div>
					<div class="btn" ng-click="orders.show = 1" ng-class="{selected:orders.show == 1}">{{lang.show_playedorders}}</div>
					<div class="btn" ng-click="orders.show = 2" ng-class="{selected:orders.show == 2}">{{lang.show_inPlayOrders}}</div>
					<div class="btn" ng-click="orders.show = 0" ng-class="{selected:orders.show == 0}">{{lang.show_notplayedorders}}</div>
					<div class="h5 col-1">{{lang.count_orders}}:
						<span ng-show="orders.show == 5">{{orders.orders.length}}</span>
						<span ng-show="orders.show == 1">{{orders.done}}</span>
						<span ng-show="orders.show == 2">{{orders.inPlay}}</span>
						<span ng-show="orders.show == 0">{{orders.orders.length - orders.done - orders.inPlay}}</span>
					</div>
				</div>
				<div class="col-3" ng-repeat="order in orders.orders" ng-show="(orders.show == order.status || orders.show == 5)">
					<div class="no-image" ng-show="order.status == 0" ng-click="showModal(order)">
						<div class="ratio-block">
							<div class="h4 pcenter-abs">{{lang.order_not_played}}</div>
						</div>
					</div>
					<div class="no-image yellow" ng-show="order.status == 2" ng-click="showModal(order)">
						<div class="ratio-block">
							<div class="h5 pcenter-abs">{{lang.order_in_play}}</div>	
						</div>
					</div>
					<div class="video" ng-show="(order.status == 1 && order.video && order.type == 'video')" ng-click="showModal(order)">
						<div class="ratio-block">
							<img ng-src="https://i1.ytimg.com/vi/{{order.video}}/mqdefault.jpg">
							<div class="ratio-overlay">
								<div class="h4 pcenter-abs">{{lang.view_video}}</div >
							</div>
						</div>
					</div>
					<div class="image" ng-show="(order.status == 1 && order.image && order.type == 'image')" ng-click="showModal(order)">
						<div class="ratio-block">
							<img ng-src="{{order.image}}">
							<div class="ratio-overlay">
								<div class="h4 pcenter-abs">{{lang.view_all_images}}</div>
							</div>
						</div>
					</div>
					<div class="h3">{{order.title}}</div><!--<span class="doneBTN" ng-show="order.status == 1">{{lang.order_done}}</span>--> 
					<p ng-class="{'small':false}">{{order.description}}</p>
				</div>
			</div>
			<a href="#orders" class="scrollToOrders">
				<div class="ion-ios7-arrow-down"></div>
			</a>
			<a href="#top" class="scrollTop">
				<div class="ion-ios7-arrow-up"></div>
			</a>
		</div>
		<div class="footer">
			&copy; Robin Timman 2014, Website is ontworpen en gemaakt door: Robin Timman, <a href="mail:rbenjamint@gmail.com">Contact</a>
		</div>
			
		<div class="modal" ng-class="{'show':modal.show}">
			<div class="modal-overlay">
				<div class="overlay" ng-click="hideModal()"></div>
				<div class="close-btn" ng-click="hideModal()">
					<div class="ion-ios7-close-empty"></div>
				</div>
				<div class="real-modal">
					<div class="content">
						<div class="no-image" ng-show="modal.order.status == 0">
							<div class="ratio-block">
								<div class="h4 pcenter-abs" ng-show="modal.order.status == 0">{{lang.order_not_played}}</div>
							</div>
						</div>
						<div class="no-image yellow" ng-show="modal.order.status == 2">
							<div class="ratio-block">
								<div class="h4 pcenter-abs" ng-show="modal.order.status == 2">{{lang.order_in_play}}</div>
							</div>
						</div>
						<div class="video" ng-show="(modal.order.status == 1 && modal.order.video && modal.order.type == 'video')">
							<div class="ratio-block">
								<iframe ng-src="//www.youtube.com/embed/{{modal.order.video}}" frameborder="0" allowfullscreen></iframe>
							</div>
						</div>
						<div class="image" ng-class="{'large':modal.large}" ng-show="(modal.order.status == 1 && modal.order.image && modal.order.type == 'image')" ng-click="modal.large = !modal.large">
							<div ng-class="{'ratio-block':!modal.large}">
								<img ng-src="{{modal.order.image}}">
								<div class="apso" ng-click="modal.large = !modal.large">
									<div ng-class="{'fa-expand':!modal.large, 'fa-compress':modal.large}"></div>
								</div>
							</div>
						</div>
						<div class="h5">{{modal.order.title}}</div>
						<p>{{modal.order.description}}</p>
						<div class="h5" ng-show="modal.order.moreimages.length > 0">{{lang.more_photos}}:</div>
						<div class="col-1 morePhotos">
							<div class="image" ng-class="{'large':lg}" ng-init="lg = false" ng-repeat="img in modal.order.moreimages" ng-click="lg = !lg">
								<div ng-class="{'ratio-block':!lg}">
									<img ng-src="{{img}}">
									<div class="apso" ng-click="lg = !lg">
										<div ng-class="{'fa-expand':!lg, 'fa-compress':lg}"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
<? include('views/ui/footer.php');?>
