<template>
	<div class="login">
		<div class="card">
			<div class="card-body">
				<h2 class="card-title">Admin Login</h2>
				<p class="card-text larger-card-text">If you don't know what you're doing here, you should probably leave!<router-link :to="'/'" class="btn btn-primary">Go Home</router-link>
				</p>
				<form autocomplete="off" @submit.prevent="login" method="post">
					<div class="form-group">
						<label for="email">Email:</label>
						<input type="email" id="email" class="form-control" v-model="email">
					</div>
					<div class="form-group">
						<label for="password">Passwo<router-link class="camo" tabindex="-1" :to="'/'" v-if="!$auth.check()">r</router-link>d:</label>
						<input type="password" id="password" class="form-control" v-model="password">
						<div class="text-danger" v-if="error">{{ errors }}</div>
					</div>
					<button type="submit" class="btn btn-success">Sign in</button>
				</form>
			</div>
		</div>
	</div>
</template>

<script>
export default {
	data() {
		return {
			email: "",
			password: "",
			error: false,
			errors: ""
		}
	},
	methods: {
		login() {
			this.$auth.login({
				params: {
					email: this.email,
					password: this.password
				},
				error: function(e) {
					this.error = true
					this.errors = e.response.data.msg
				},
				rememberMe: true,
				redirect: "/",
				fetchUser: true
			})
		}
	}
}
</script>

<style>
.login .btn-primary {
	vertical-align: 0;
	margin-left: 5px;
}
</style>