				<div class="overlay left" ng-class="{'open': submenu}" ng-click="submenuf()"></div>
				<div class="sideMenu left" ng-class="{'open': submenu}">
					<!-- <div class="timer">
						<div class="date">{{date.date}}</div>
						<div class="day">{{date.day}}</div>
						<div class="time">{{date.time}}</div>
					</div> -->
					<div class="timer2">{{date.form}}</div>
					<div class="user">
						<div class="avatar">
							<div class="inner">
								<img src="https://fbcdn-profile-a.akamaihd.net/hprofile-ak-ash3/t1.0-1/p160x160/1521416_709655269053200_1868849599_n.jpg">
							</div>
						</div>
						<div class="name">Robin Timman</div>
						<div class="groupname">Family group 12</div>
					</div>
					<div class="scroll">
						<div class="smallprogram">
							<div class="span">Diner</div>
							<div class="timer-till">{{counter}}</div>
							<div class="timer-bar"></div>
						</div>
						<ul>
							<li ng-repeat="nav in menu" ng-class="{'submenu': nav.subMenu}">
								<a href="{{nav.url}}" ng-if="nav.url != ''">
									<div class="blockie" ng-if="nav.icon">
										<i class="{{nav.icon}} {{nav.ifs}}"></i>
									</div>
									<span class="icon-text" ng-show="nav.icon">{{nav.text}}</span>
									<span ng-show="!nav.icon">{{nav.text}}</span>
								</a>
								<ul ng-if="nav.subMenu">
									<li ng-repeat="data in nav.subMenu">
										<a href="{{data.url}}" ng-if="data.url != ''">
											<div class="blockie" ng-if="data.icon">
												<i class="{{data.icon}} {{data.ifs}}"></i>
											</div>
											<span class="icon-text" ng-show="data.icon">{{data.text}}</span>
											<span ng-show="!data.icon">{{data.text}}</span>
										</a>
									</li>
								</ul>
							</li>
						</ul>
					</div>
				</div>