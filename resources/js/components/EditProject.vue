<template>
	<div class="edit-project">
		<div class="card">
			<div class="card-body">
				<div class="links-container">
					<router-link :to="'/'" class="btn btn-primary">
						<i class="fas fa-arrow-left"></i>
					</router-link>
				</div>
				<h2 class="card-title">Update Project</h2>
				<form @submit.prevent="updateProject">
					<div class="form-group">
						<label>Project Title:</label>
						<input type="text" class="form-control" required v-model="project.title">
					</div>
					<div class="form-group">
						<label>Project Technologies:</label>
						<input type="text" class="form-control" required v-model="project.technologies">
					</div>
					<div class="form-group">
						<label>Project Description:</label>
						<input type="text" class="form-control" required v-model="project.description">
					</div>
					<div class="form-group">
						<label>Project Date:</label>
						<input type="text" class="form-control" required v-model="project.date">
					</div>
					<div class="form-group">
						<label>Source Code Link:</label>
						<input type="text" class="form-control" required v-model="project.sourcecode">
					</div>
					<div class="form-group">
						<label>Hosted Link:</label>
						<input type="text" class="form-control" required v-model="project.hostedlink">
					</div>
					<div class="form-group">
						<label>Hosted Status:</label>
						<input type="text" class="form-control" v-model="project.hostedstatus">
					</div>
					<div class="form-group">
						<label>Project Search Tags:</label>
						<input type="text" class="form-control" required v-model="project.searchtags">
					</div>
					<div class="buttons-container">
						<div class="links-container">
							<button class="btn btn-success">Update</button>
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
		updateProject() {
			let uri = "https://austins.page/projects/" + this.$route.params.id
			this.axios.patch(uri, this.project).then(response => {
				this.$router.push({ name: "DisplayProjects" })
			})
		}
	}
}
</script>