<template>
	<div class="view-project">
		<div class="card">
			<div class="card-body">
				<div class="links-container">
					<router-link :to="'/'" class="btn btn-primary">
						<i class="fas fa-arrow-left"></i>
					</router-link>
				</div>
				<div class="content-loading" v-if="loading"></div>
				<div v-else>
					<h3 class="card-title">{{ project.title }}</h3>
					<h6 class="card-date">{{ project.date }}</h6>
					<h5 class="card-subtitle">{{ project.technologies }}</h5>
					<p class="card-text">{{ project.description }}</p>
				</div>
				<div class="image-container">
					<span v-if="loading" class="image-loading loading">Loading</span>
					<img v-else class="card-img-bottom" :src="`https://austins.page/assets/images/${this.project.image}`">
				</div>
				<div class="buttons-container">
					<div class="links-container">
						<a class="btn btn-info" target="_blank" :href="project.sourcecode">Source Code</a>
						<a class="btn btn-success" target="_blank" :href="project.hostedlink">Live Demo</a>
						<span class="hosted-status">{{ project.hostedstatus }}</span>
					</div>
					<router-link class="btn btn-warning" v-if="$auth.check()" :to="{name: 'EditProject'}">
						Edit
					</router-link>
					<router-link class="btn btn-danger" v-if="$auth.check()" :to="{name: 'DeleteProject', params: { id: project.id }}">
						Delete
					</router-link>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
export default {
	data() {
		return {
			project: {},
			loading: false
		}
	},
	// Fetch the project individually
	created: function() {
		this.loading = true
		let uri = `https://austins.page/projects/${this.$route.params.id}/edit/`
		this.axios.get(uri).then(response => {
			this.project = response.data
			this.loading = false
		})
	}
}
</script>

<style>
.view-project .content-loading {
	height: 133px;
}
.view-project .image-loading {
	font-size: 20px;
	display: flex;
	justify-content: center;
	align-items: center;
	height: 583.08px;
}
.view-project .card-date {
	margin: 10px 0 0;
}
.view-project .card-subtitle {
	color: #4c87fc;
	margin: 10px 0 0;
}
.view-project .card-text {
	font-size: 18px;
	margin: 10px 0 0;
}
.view-project .image-container {
	margin: 15px 0 0;
	box-shadow: 0px 5px 15px 0px rgba(0,0,0,0.1);
}
.view-project .hosted-status {
	vertical-align: 15%;
}
</style>