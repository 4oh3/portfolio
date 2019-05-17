<template>
	<div class="display-projects">
		<div class="row">
			<!-- Left Column -->
			<div class="col-lg-6">
				<!-- Title and 'Add Project' Button -->
				<div class="title-container row">
					<div class="col-6 projects-title">
						<h2>Projects</h2>
					</div>
					<div class="col-6 skill-add-container text-right">
						<router-link :to="{ name: 'CreateProject' }" v-if="$auth.check()" class="btn btn-success">
							Add Project
						</router-link>
						<a href="#skills" class="btn btn-primary skills-button">
							Skills <i class="fas fa-arrow-down fa-sm"></i>
						</a>
					</div>
				</div>
				<!-- Search -->
				<div class="row mx-auto">
					<div class="input-group col-12 search">
						<div class="input-group-prepend">
							<span class="input-group-text"><i :class="{ colorBlue: searchFocused }" class="fas fa-search"></i></span>
						</div>
						<input v-model="searchKey" @focus="searchFocused = !searchFocused" @blur="searchFocused = !searchFocused" class="form-control" id="project-search" required placeholder="Search" />
						<div @click="searchKey = ''" class="input-group-append">
							<span class="input-group-text"><i class="fas fa-lg fa-times"></i></span>
						</div>
					</div>
				</div>
				<!-- Project Card -->
				<div class="card-container" v-for="project in filteredProjects" :key="project.id">
					<router-link v-bind:to="{name: 'ViewProject', params: {id: project.id}}">
						<div class="card">
							<div class="card-body">
								<div class="row align-items-center">
									<div class="col-3 col-sm-2">
										<img class="card-image" :src="'https://austins.page/assets/images/' + project.image">
									</div>
									<div class="col-6 col-sm-7 card-contents-container">
										<h5 class="card-title">{{ project.title }}</h5>
										<p class="card-text display-projects-card">{{ project.technologies }}</p>
									</div>
									<div class="col-3 col-sm-3 card-date-container">
										<small class="card-date">{{ project.date }}</small>
									</div>
								</div>
							</div>
						</div>
					</router-link>
				</div>
			<!-- End Left Column -->
			</div>
			<!-- Skills Card -->
			<div class="col-lg-6">
				<div class="card skill-card-container" id="skills">
					<div class="card-body">
						<div class="top-text-container">
							<h3 class="card-title">Skills</h3>
							<h6 class="card-subtitle">Click one to see corresponding projects</h6>
						</div>
						<!-- Skill Circle Grid -->
						<div class='container'>
							<div @click="scrollToTop" class='row'>
								<div @click="searchKey = 'HTML'" class='col-4 skill-container'>
									<div class="circle-desc">
										<div class="green-circle skill-circle" :class="{ skillSelected: searchKey == 'HTML' }">HT</div>
										<h6>HTML</h6>
										<ul>
											<li>HTML5</li>
										</ul>
									</div>
								</div>
								<div @click="searchKey = 'Bootstrap'" class='col-4 skill-container'>
									<div class="blue-circle skill-circle" :class="{ skillSelected: searchKey == 'Bootstrap' }">CS</div>
									<div class="circle-desc">
										<h6>CSS</h6>
										<ul>
											<li>CSS3</li>
											<li>Bootstrap</li>
											<li>SASS</li>
										</ul>
									</div>
								</div>
								<div @click="searchKey = 'Vue.js'" class='col-4 skill-container'>
									<div class="red-circle skill-circle" :class="{ skillSelected: searchKey == 'Vue.js' }">JS</div>
									<div class="circle-desc">
										<h6>JavaScript</h6>
										<ul>
											<li>Javascript ES6</li>
											<li>JQuery</li>
										</ul>
									</div>
								</div>
								<div @click="searchKey = 'Laravel'" class='col-4 skill-container'>
									<div class="yellow-circle skill-circle" :class="{ skillSelected: searchKey == 'Laravel' }">PH</div>
									<div class="circle-desc">
										<h6>PHP</h6>
										<ul>
											<li>Laravel</li>
											<li>Vue.js w/Laravel</li>
										</ul>
									</div>
								</div>
								<div @click="searchKey = 'MySQL'" class='col-4 skill-container'>
									<div class="green-circle skill-circle" :class="{ skillSelected: searchKey == 'MySQL' }">MY</div>
									<div class="circle-desc">
										<h6>MySQL</h6>
										<ul>
											<li>Sequel Pro</li>
											<li>phpMyAdmin</li>
										</ul>
									</div>
								</div>
								<div @click="searchKey = 'Wordpress'" class='col-4 skill-container'>
									<div class="blue-circle skill-circle" :class="{ skillSelected: searchKey == 'Wordpress' }">WP</div>
									<div class="circle-desc">
										<h6>WordPress</h6>
										<ul>
											<li>Elementor</li>
											<li>Custom Theming</li>
											<li>Linux Hosted</li>
										</ul>
									</div>
								</div>
								<div @click="searchKey = 'AWS'" class='col-4 skill-container'>
									<div class="red-circle skill-circle" :class="{ skillSelected: searchKey == 'AWS' }">AW</div>
									<div class="circle-desc">
										<h6>AWS & GCP</h6>
										<ul>
											<li>Linux Deployment</li>
											<li>Command Line</li>
											<li>Apache</li>
										</ul>
									</div>
								</div>
								<div @click="searchKey = 'API'" class='col-4 skill-container'>
									<div class="yellow-circle skill-circle" :class="{ skillSelected: searchKey == 'API' }">AP</div>
									<div class="circle-desc">
										<h6>API's</h6>
										<ul>
											<li>Google Maps</li>
											<li>Weather API's</li>
											<li>Custom Endpoints</li>
										</ul>
									</div>
								</div>
								<div @click="searchKey = 'GitHub'" class='col-4 skill-container'>
									<div class="green-circle skill-circle" :class="{ skillSelected: searchKey == 'GitHub' }">VE</div>
									<div class="circle-desc">
										<h6>Version Control</h6>
										<ul>
											<li>Git</li>
											<li>Github</li>
											<li>Bitbucket</li>
										</ul>
									</div>
								</div>
								<div @click="searchKey = 'JSON'" class='col-4 skill-container'>
									<div class="blue-circle skill-circle" :class="{ skillSelected: searchKey == 'JSON' }">JS</div>
									<div class="circle-desc">
										<h6>JSON + XML</h6>
										<ul>
											<li>Data Parsing</li>
										</ul>
									</div>
								</div>
								<div @click="searchKey = 'Vue'" class='col-4 skill-container'>
									<div class="red-circle skill-circle" :class="{ skillSelected: searchKey == 'Vue' }">VU</div>
									<div class="circle-desc">
										<h6>Vue.js</h6>
										<ul>
											<li>Vue Router</li>
											<li>Vue Axios</li>
											<li>Firebase + Auth</li>
										</ul>
									</div>
								</div>
								<div @click="searchKey = 'Photoshop'" class='col-4 skill-container'>
									<div class="yellow-circle skill-circle" :class="{ skillSelected: searchKey == 'Photoshop' }">CC</div>
									<div class="circle-desc">
										<h6>Adobe CC</h6>
										<ul>
											<li>Ps, Ai, Lr, Pr</li>
											<li>Photography</li>
											<li>Videography</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<!-- End Skill Circle Grid -->
					</div>
				</div>
			</div>
			<!-- End Skills Card -->
		</div>
	</div>
</template>

<script>
export default {
	data() {
		return {
			projects: {},
			searchKey: "",
			searchFocused: false
		}
	},
	// Fetch all the projects
	created: function() {
		let uri = "https://austins.page/projects"
		this.axios.get(uri).then(response => {
			this.projects = response.data
		})
	},
	methods: {
		scrollToTop() {
			window.scrollTo(0, 0)
		}
	},
	computed: {
		// Search Functionality
		filteredProjects() {
			if (this.projects.length) {
				return this.projects.filter(function(project) {
					return (
						this.searchKey == "" ||
						project.title.indexOf(this.searchKey) !== -1 ||
						project.technologies.indexOf(this.searchKey) !== -1 ||
						project.description.indexOf(this.searchKey) !== -1 ||
						project.searchtags.indexOf(this.searchKey) !== -1
					)
				}, this)
			}
		}
	}
}
</script>

<style>
/* Title + 'Add Project' + 'Skills Shortcut' Buttons */
.display-projects .title-container {
	margin: 15px 0 7.5px;
}
.display-projects .projects-title {
	padding: 0;
}
.display-projects .skill-add-container {
	padding: 0;
}
.display-projects .skill-add-container .btn {
	margin: 0;
}
/* Search */
.display-projects .search {
	padding-left: 0px;
	padding-right: 0px;
	box-shadow: 0px 5px 15px 0px rgba(0,0,0,0.05);
	-webkit-transition: all 0.25s ease;
	-moz-transition: all 0.25s ease;
	-o-transition: all 0.25s ease;
	transition: all 0.25s ease;
}
.display-projects .search:hover {
	box-shadow: 0px 5px 15px 0px rgba(0,0,0,0.1);
	-webkit-transition: all 0.25s ease;
	-moz-transition: all 0.25s ease;
	-o-transition: all 0.25s ease;
	transition: all 0.25s ease;
}
.display-projects .input-group-text {
	font-size: 1rem;
	color: #abacac;
	border: none;
	background-color: white;
}
.display-projects .input-group-text .fa-times {
	color: #f95e7a;
}
.display-projects .input-group-append:hover {
	cursor: pointer;
}
.display-projects .input-group-append:hover .fa-times {
	color: #c62b47;
}
.display-projects #project-search {
	height: 50px;
	background-color: white;
}
.display-projects #project-search:focus {
	border: none;
}
.display-projects ::placeholder {
	color: #abacac !important;
	opacity: 1 !important;
}
.display-projects :-ms-input-placeholder {
	color: #abacac !important;
}
.display-projects ::-ms-input-placeholder {
	color: #abacac !important;
}
/* Project Card */
.display-projects .card-container {
	margin: 22.5px auto;
}
.display-projects .card-container:hover a {
	text-decoration: none;
}
.display-projects .card-image {
	width: 60px;
	height: 60px;
	border-radius: 50%;
	border: 3px solid #4c87fc;
}
.display-projects .card-text {
	color: #4c87fc;
}
.display-projects .card-contents-container {
	padding-right: 0;
}
.display-projects .card-date-container {
	text-align: right;
	padding-left: 0;
}
.display-projects .card-date {
	color: #7f818c;
}
/* Skill Card */
.display-projects .skill-card-container {
	margin-top: 68px;
	box-shadow: 0px 5px 15px 0px rgba(0,0,0,0.05);
	-webkit-transition: all 0.25s ease;
	-moz-transition: all 0.25s ease;
	-o-transition: all 0.25s ease;
	transition: all 0.25s ease;
}
.display-projects .skill-card-container:hover {
	box-shadow: 0px 5px 15px 0px rgba(0,0,0,0.1);
	-webkit-transition: all 0.25s ease;
	-moz-transition: all 0.25s ease;
	-o-transition: all 0.25s ease;
	transition: all 0.25s ease;
}
.display-projects .card-subtitle {
	margin: 2.5px 0 20px;
}
.display-projects .skill-container:hover {
	cursor: pointer;
}
.display-projects .skill-container:hover .skill-circle {
	border: 3px solid #4c87fc;
}
.display-projects .skill-circle {
	border-radius: 50%;
	width: 50px;
	height: 50px;
	margin: 0 auto;
	display: grid;
	place-items: center;
	-webkit-transition: all 0.25s ease;
	-moz-transition: all 0.25s ease;
	-o-transition: all 0.25s ease;
	transition: all 0.25s ease;
}
.display-projects .green-circle {
	background-color: #eaf7ed;
	color: #39b24e;
}
.display-projects .blue-circle {
	background-color: #eff2f9;
	color: #5289e1;
}
.display-projects .red-circle {
	background-color: #feeaf0;
	color: #f95e7a;
}
.display-projects .yellow-circle {
	background-color: #fcedc9;
	color: #efb037;
}
.display-projects .circle-desc {
	text-align: center;
	line-height: 1.3em;
}
.display-projects .circle-desc h6 {
	font-weight: bold;
	margin: 4px 0;
}
.display-projects .circle-desc ul {
	list-style: none;
	padding: 0;
	margin-bottom: 7.5px;
}
.display-projects .skillSelected {
	border: 3px solid #4c87fc;
}
@media (max-width: 992px) {
	.display-projects .skill-card-container {
		margin-top: 25px;
	}
	.display-projects .skill-card-container .top-text-container {
		padding: 10px;
	}
	.display-projects .skill-card-container .card-body {
		padding: 10px;
	}
}
@media (max-width: 768px) {
	.display-projects .skill-card-container .skill-container {
		padding: 0px;
		user-select: none;
		-webkit-user-select: none;
		-moz-user-select: none;
		-ms-user-select: none;
	}
}
@media (min-width: 992px) {
	.display-projects .skills-button {
		display: none;
	}
}
</style>