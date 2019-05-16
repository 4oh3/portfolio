<template>
	<div class="create-project">
		<div class="card">
			<div class="card-body">
				<div class="links-container">
					<router-link :to="'/'" class="btn btn-primary">
						<i class="fas fa-arrow-left"></i>
					</router-link>
				</div>
				<h2 class="card-title">Create a Project</h2>
				<form @submit.prevent="addProject">
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
					<div class="form-group">
						<label>Project Image:</label>
						<input type="file" class="form-control col-md-6" required @change="addImage" />
					</div>
					<div class="buttons-container">
						<div class="links-container">
							<button class="btn btn-success">Add Project</button>
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
	methods: {
		addProject() {
			let uri = "https://austins.page/projects"
			this.axios.post(uri, this.project).then(response => {
				this.$router.push({ name: "DisplayProjects" })
			})
		},
		addImage(e) {
			var fileReader = new FileReader()
			fileReader.readAsDataURL(e.target.files[0])
			fileReader.onload = e => {
				this.project.image = e.target.result
			}
		}
	}
}
</script>