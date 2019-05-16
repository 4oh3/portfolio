<template>
	<div>
		<!-- Start Sidebar -->
		<div id="mobile-sidebar" :class="{ sidebarMinimized: desktopSidebarMinimized, sidebarMaximized: mobileSidebarActive }">
			<div id="sidebar" @mouseover='toggleBodyPush' @mouseout='toggleBodyPush'>
				<router-link @click='closeMobileSidebar' class="avatar-container" :to="'/about'">
					<img class="avatar-image" src="/assets/austin.png" alt="Austin's Avatar Image">
					<div class="avatar-text">
						<h1>Austin's<br>Portfolio</h1>
					</div>
				</router-link>
				<ul class="sidebar-items">
					<li>
						<a href class="sidebar-links" id="desktop-sidebar-toggle" @click.prevent='toggleDesktopSidebar'>
							<span class="sidebar-link-container">
								<i v-if="desktopSidebarMinimized" class="fas sidebar-icons fa-bars"></i>
								<i v-else class="fas sidebar-icons fa-times"></i>
							</span>
						</a>
					</li>
					<li @click='closeMobileSidebar' :class="{ active: homeActive }">
						<router-link class="sidebar-links" :to="'/'">
							<span class="sidebar-link-container">
								<i class="sidebar-icons fas fa-home"></i>Home
							</span>
						</router-link>
					</li>
					<li @click='closeMobileSidebar' :class="{ active: aboutActive }">
						<router-link class="sidebar-links" :to="'/about'">
							<span class="sidebar-link-container">
								<i class="sidebar-icons fas fa-info-circle"></i>About
							</span>
						</router-link>
					</li>
					<li @click='closeMobileSidebar' :class="{ active: contactActive }">
						<router-link class="sidebar-links" :to="'/contact'">
							<span class="sidebar-link-container">
								<i class="sidebar-icons fas fa-at"></i>Contact
							</span>
						</router-link>
					</li>
					<div class="sidebar-links">
						<span class="sidebar-link-container">
							<i class="sidebar-icons fas fa-minus divider"></i>
						</span>
					</div>
					<li @click='closeMobileSidebar'>
						<a class="sidebar-links" target="_blank" href="https://github.com/4oh3">
							<span class="sidebar-link-container">
								<i class="sidebar-icons fab fa-github"></i>GitHub
							</span>
						</a>
					</li>
					<li @click='closeMobileSidebar'>
						<a class="sidebar-links" target="_blank" href="https://bitbucket.org/4oh3/">
							<span class="sidebar-link-container">
								<i class="sidebar-icons fab fa-bitbucket"></i>BitBucket
							</span>
						</a>
					</li>
					<li @click='closeMobileSidebar'>
						<a class="sidebar-links" target="_blank" href="https://www.linkedin.com/in/austinspage">
							<span class="sidebar-link-container">
								<i class="sidebar-icons fab fa-linkedin-in"></i>LinkedIn
							</span>
						</a>
					</li>
					<li @click='closeMobileSidebar' v-if="!$auth.check()">
						<router-link id="auth-links" class="sidebar-links" :to="'/login'">
							<span class="sidebar-link-container admin-links"></span>
						</router-link>
					</li>
					<li @click='closeMobileSidebar' @click.prevent="$auth.logout()" v-if="$auth.check()">
						<router-link class="sidebar-links" :to="'/'">
							<span class="sidebar-link-container admin-links">
								Logout
							</span>
						</router-link>
					</li>
				</ul>
			</div>
			<!-- End Sidebar -->
			<!-- Mobile Sidebar Toggle -->
			<div class="container sidebar-toggle">
				<a id="mobile-sidebar-toggle" @click.prevent='toggleMobileSidebar'>
					<i v-if="mobileSidebarActive" class="fas fa-times"></i>
					<i v-else class="fas fa-bars"></i>
				</a>
			</div>
			<!-- End Mobile Sidebar Toggle -->
			<div @click='closeMobileSidebar' id="outside-sidebar" :class="{ pushBody: isBodyPushed }">
					<!-- Insert Component Into View w/Sidebar w/Fade Transition -->
				<transition name="fade" mode="out-in">
					<router-view class="container"></router-view>
				</transition>
					<!-- End Component Insertion -->
			</div>
		</div>
	</div>
</template>

<script>
export default {
	data() {
		return {
			desktopSidebarMinimized: false,
			mobileSidebarActive: false,
			isBodyPushed: false,
			homeActive: true,
			aboutActive: false,
			contactActive: false
		}
	},
	methods: {
		toggleDesktopSidebar() {
			this.desktopSidebarMinimized = !this.desktopSidebarMinimized
		},
		toggleMobileSidebar() {
			this.mobileSidebarActive = !this.mobileSidebarActive
		},
		closeMobileSidebar() {
			if (this.mobileSidebarActive == true) {
				this.toggleMobileSidebar()
			}
		},
		toggleBodyPush() {
			this.isBodyPushed = !this.isBodyPushed
		}
	},
	mounted() {
		setTimeout(this.toggleDesktopSidebar, 750)
	},
	watch: {
		$route: function() {
			if (this.$route.path == "/") {
				this.homeActive = true
				this.aboutActive = false
				this.contactActive = false
			} else if (this.$route.path == "/about") {
				this.aboutActive = true
				this.homeActive = false
				this.contactActive = false
			} else if (this.$route.path == "/contact") {
				this.contactActive = true
				this.aboutActive = false
				this.homeActive = false
			}
			this.scrollToTop
		}
	}
}
</script>

<style>
/* Universal */
body {
	background-color: #f6f7fb;
	overflow-x: hidden;
	font-family: "Roboto Condensed", sans-serif;
}

/* Custom */
.colorBlue {
	color: #4c87fc;
}
.hidden {
	display: none;
}
.camo {
	color: black;
}
.camo:hover {
	text-decoration: none;
	cursor: default;
	color: black;
}
.camo-checkbox {
	opacity: 0;
	font-size: 1px;
}

/* Transitions */
.fade-enter-active,
.fade-leave-active {
	transition: opacity 0.5s;
}
.fade-enter,
.fade-leave-to {
	opacity: 0;
}

/* ... Animation */
.loading:after {
	content: " .";
	animation: dots 1s steps(5, end) infinite;
}
@keyframes dots {
	0%,
	20% {
		color: rgba(0, 0, 0, 0);
		text-shadow: 0.25em 0 0 rgba(0, 0, 0, 0), 0.5em 0 0 rgba(0, 0, 0, 0);
	}

	40% {
		color: black;
		text-shadow: 0.25em 0 0 rgba(0, 0, 0, 0), 0.5em 0 0 rgba(0, 0, 0, 0);
	}

	60% {
		text-shadow: 0.25em 0 0 black, 0.5em 0 0 rgba(0, 0, 0, 0);
	}

	80%,
	100% {
		text-shadow: 0.25em 0 0 black, 0.5em 0 0 black;
	}
}

/* Bootstrap Modifiers */
.btn {
	vertical-align: 15%;
	margin-right: 2px;
}
.text-danger,
.text-success {
	padding-top: 5px;
}

/* Cards */
.card {
	border: none;
	margin-bottom: 25px;
	box-shadow: 0px 5px 15px 0px rgba(0,0,0,0.05);
	-webkit-transition: all 0.25s ease;
	-moz-transition: all 0.25s ease;
	-o-transition: all 0.25s ease;
	transition: all 0.25s ease;
}
.card:hover {
	box-shadow: 0px 5px 15px 0px rgba(0,0,0,0.1);
	-webkit-transition: all 0.25s ease;
	-moz-transition: all 0.25s ease;
	-o-transition: all 0.25s ease;
	transition: all 0.25s ease;
}
.card-title {
	color: black;
	margin-bottom: 0;
}
.links-container a,
.links-container button {
	margin-bottom: 10px;
	color: white !important;
}
.buttons-container {
	margin: auto;
	margin: 15px 0 0;
}
.buttons-container a {
	color: white;
}
.buttons-container a:hover {
	color: white;
}

/* Multiple Pages */

/* Forms */
.form-control {
	background-color: #f6f7fb;
	border: none;
}
.form-control:focus {
	border: 2px solid #4c87fc;
	border-radius: 0.25rem;
	box-shadow: none;
	background-color: #f6f7fb;
}
.form-group:nth-of-type(1) {
	margin-top: 10px;
}
.create-project .form-group,
.edit-project .form-group {
	margin-bottom: 7.5px;
}

.create-project .form-group:nth-of-type(9),
.edit-project .form-group:nth-of-type(8) {
	margin-bottom: 12.5px;
}

/* Misc */
.create-project label,
.edit-project label {
	margin-bottom: 4px;
}

/* Media Queries */
@media (max-width: 576px) {
	.about .card,
	.contact .card,
	.create-project .card,
	.delete-project .card,
	.edit-project .card,
	.login .card,
	.register .card,
	.view-project .card {
		margin-top: 22.5px;
	}
}

/* Sidebar */

/* Mobile Specific Styles */
#mobile-sidebar {
	padding-left: 0;
	-webkit-transition: all 0.5s ease;
	-moz-transition: all 0.5s ease;
	-o-transition: all 0.5s ease;
	transition: all 0.5s ease;
	overflow: hidden;
}
#outside-sidebar {
	position: absolute;
	width: 100%;
}
#mobile-sidebar.sidebarMaximized {
	padding-left: 200px;
}
#mobile-sidebar.sidebarMaximized #sidebar {
	width: 200px;
}
#mobile-sidebar-toggle {
	display: none;
}
#mobile-sidebar-toggle:hover {
	cursor: pointer;
}
/* End Mobile Specific Styles */

.sidebar-toggle {
	margin-top: 22.5px;
	font-size: 30px;
}
.fa-bars,
.fa-times {
	color: #000000;
}
.fa-minus.divider {
	color: #d5d6db;
}
#auth-links:hover {
	border: none;
	cursor: default;
}
.admin-links {
	margin-left: 75px;
}
#sidebar {
	background-color: #ffffff;
	position: fixed;
	left: 250px;
	top: 0px;
	width: 0;
	height: 100%;
	margin-left: -250px;
	overflow-y: auto;
	z-index: 999;
	-webkit-transition: all 0.5s ease;
	-moz-transition: all 0.5s ease;
	-o-transition: all 0.5s ease;
	transition: all 0.5s ease;
}
#sidebar:hover {
	-webkit-transition: all 0.5s ease;
	-moz-transition: all 0.5s ease;
	-o-transition: all 0.5s ease;
	transition: all 0.5s ease;
}
.sidebar-items {
	position: absolute;
	width: 150px;
	margin: 0;
	padding: 0;
	list-style: none;
}
.sidebar-items li a {
	display: block;
	text-decoration: none;
	color: #afb0b5;
}
.sidebar-items li.active .fas,
.sidebar-items li.active .fab {
	color: #4c87fc;
}
.sidebar-items li a:hover .fas,
.sidebar-items li a:hover .fab {
	color: #4c87fc;
}
.sidebar-items li a:hover,
.sidebar-items li a:active,
.sidebar-items li.active a,
.sidebar-items li.active a:focus,
.sidebar-items li.active a:hover {
	color: #000000;
	border-left: 4px solid #4c87fc;
	text-indent: -4px;
}
.sidebar-link-container {
	text-indent: 26.5px;
}
.sidebar-links {
	font-size: 15px;
	line-height: 40px;
	margin-top: 25px;
	text-transform: uppercase;
	width: 200px;
}
.sidebar-icons {
	margin-right: 25px;
	width: 50px;
	font-size: 22.5px;
	vertical-align: -15%;
}
.avatar-container {
	display: grid;
	place-items: center;
	margin-top: 30px;
}
.avatar-container:hover {
	text-decoration: none;
}
.avatar-image {
	width: 50%;
	border: 4px solid #4c87fc;
	border-radius: 50%;
	margin-bottom: 7.5px;
	-webkit-transition: all 0.25s ease;
	-moz-transition: all 0.25s ease;
	-o-transition: all 0.25s ease;
	transition: all 0.25s ease;
}
.avatar-container:hover .avatar-image {
	-webkit-transition: all 0.25s ease;
	-moz-transition: all 0.25s ease;
	-o-transition: all 0.25s ease;
	transition: all 0.25s ease;
	box-shadow: 0px 5px 15px 7.5px rgba(0,0,0,0.125);
}
.avatar-text h1 {
	color: black;
	text-align: center;
	line-height: 17.5px;
	font-size: 1rem;
	font-weight: 400px;
	margin-bottom: 0;
}
@media (max-width: 576px) {
	#desktop-sidebar-toggle {
		display: none;
	}
	#mobile-sidebar-toggle {
		display: inline-block;
	}
}
@media (min-width: 576px) {
	#outside-sidebar {
		position: relative;
		-webkit-transition: all 0.5s ease;
		-moz-transition: all 0.5s ease;
		-o-transition: all 0.5s ease;
		transition: all 0.5s ease;
	}
	#sidebar {
		width: 200px;
	}
	#mobile-sidebar {
		padding-left: 200px;
	}
	#mobile-sidebar.sidebarMaximized {
		padding-left: 0;
	}
	#mobile-sidebar.sidebarMinimized #sidebar {
		width: 75px;
	}
	#mobile-sidebar.sidebarMinimized #sidebar:hover {
		width: 200px;
	}
	#mobile-sidebar.sidebarMaximized #outside-sidebar {
		position: relative;
		margin-right: 0;
		padding-left: 250px;
	}
	#mobile-sidebar.sidebarMinimized #outside-sidebar {
		width: auto;
		position: relative;
		margin-right: 0;
		margin-left: -125px;
		-webkit-transition: all 0.5s ease;
		-moz-transition: all 0.5s ease;
		-o-transition: all 0.5s ease;
		transition: all 0.5s ease;
	}
	.pushBody {
		margin-left: 0px !important;
	}
}
</style>