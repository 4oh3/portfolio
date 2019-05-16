<template>
	<div class="delete-project">
		<div class="card">
			<div class="card-body">
				<div class="links-container">
					<router-link :to="'/'" class="btn btn-primary">
						<i class="fas fa-arrow-left"></i>
					</router-link>
				</div>
				<h2 class="card-title">Delete Project "<span class="colorBlue">{{ project.title }}</span>"?</h2>
				<form v-on:submit.prevent="deleteProject(project.id)">
					<p class="card-text larger-card-text">Are you sure you want to delete it? This action cannot be undone.</p>
					<div class="buttons-container">
						<div class="links-container">
							<button type="submit" class="btn btn-danger">Delete</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</template>

<script>
export default {
	data() {
		return {
			project: {}
		}
	},
	// Fetch the project individually
	created: function() {
		let uri = `https://austins.page/projects/${this.$route.params.id}/edit`
		this.axios.get(uri).then(response => {
			this.project = response.data
		})
	},
	methods: {
		deleteProject(id) {
			let uri = `https://austins.page/projects/${this.$route.params.id}/`
			this.axios.delete(uri, this.project).then(response => {
				this.$router.push({ name: "DisplayProjects" })
			})
		}
	}
}
</script>