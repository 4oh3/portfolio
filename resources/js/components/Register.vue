<template>
	<div class="register">
		<div class="card">
			<div class="card-body">
				<div class="links-container">
					<router-link :to="'/'" class="btn btn-primary">
						<i class="fas fa-arrow-left"></i>
					</router-link>
				</div>
				<form autocomplete="off" @submit.prevent="register" method="post">
					<div class="form-group">
						<label for="name">Name:</label><input type="checkbox" class="camo-checkbox" v-model="namechecked">
						<input type="text" id="name" class="form-control" v-model="name" v-if="namechecked" tabindex="-1">
						<span class="text-danger" v-if="error && errors.name">{{ errors.name[0] }}</span>
					</div>
					<div class="form-group">
						<label for="email">Email:</label><input type="checkbox" class="camo-checkbox" v-model="emailchecked">
						<input type="email" id="email" class="form-control" v-model="email" v-if="emailchecked" tabindex="-1">
						<span class="text-danger" v-if="error && errors.email">{{ errors.email[0] }}</span>
					</div>
					<div class="form-group">
						<label for="password">Password:</label><input type="checkbox" class="camo-checkbox" v-model="passwordchecked">
						<input type="password" id="password" class="form-control" v-model="password" v-if="passwordchecked" tabindex="-1">
						<span class="text-danger" v-if="error && errors.password">{{ errors.password[0] }}</span>
					</div>
					<div class="buttons-container">
						<div class="links-container">
							<button type="submit" class="btn btn-success" v-if="submitchecked">Register</button><input type="checkbox" class="camo-checkbox" v-model="submitchecked">
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
			name: "",
			email: "",
			password: "",
			error: false,
			errors: {},
			namechecked: false,
			emailchecked: false,
			passwordchecked: false,
			submitchecked: false
		}
	},
	methods: {
		register() {
			this.$auth.register({
				data: {
					name: this.name,
					email: this.email,
					password: this.password
				},
				error: function(e) {
					this.error = true
					this.errors = e.response.data.errors
				},
				redirect: "/login"
			})
		}
	}
}
</script>