<template>
	<div class="contact">
		<div class="card">
			<div class="card-body">
				<div class="links-container">
					<router-link :to="'/'" class="btn btn-primary">
						<i class="fas fa-arrow-left"></i>
					</router-link>
				</div>
				<h2 class="card-title">Let's get in touch!</h2>
				<p class="card-text">Send me a message with any inquiries you have.</p>
				<form @submit.prevent="submit">
					<div class="form-group">
						<label for="name">Name:</label>
						<input type="text" class="form-control" name="name" id="name" v-model="fields.name" />
						<div v-if="errors && errors.name" class="text-danger">{{ errors.name[0] }}</div>
					</div>
					<div class="form-group">
						<label for="email">Email:</label>
						<input type="email" class="form-control" name="email" id="email" v-model="fields.email" />
						<div v-if="errors && errors.email" class="text-danger">{{ errors.email[0] }}</div>
					</div>
					<div class="form-group">
						<label for="message">Message:</label>
						<textarea class="form-control" id="message" name="message" rows="5" v-model="fields.message"></textarea>
						<div v-if="errors && errors.message" class="text-danger">{{ errors.message[0] }}</div>
					</div>
					<span v-if="sending" class="message-status loading">Sending</span>
					<span v-if="success" class="message-status text-success">Message Sent!</span>
					<div class="buttons-container">
						<div class="links-container">
							<button type="submit" class="btn btn-success">Send Message</button>
							<a class="btn btn-warning" href="mailto:contact@austins.page">Rather email me directly?</a>
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
			fields: {},
			errors: {},
			success: false,
			loaded: true,
			sending: false
		}
	},
	methods: {
		submit() {
			// Sending Indicator
			this.sending = true
			if (this.loaded) {
				this.loaded = false
				this.success = false
				this.errors = {}
				axios
					.post("/submit", this.fields)
					.then(response => {
						// Clear input fields
						this.fields = {}
						this.loaded = true
						this.success = true
						// Finished Sending - Stop Sending Indicator
						this.sending = false
					})
					.catch(error => {
						this.sending = false
						this.loaded = true
						if (error.response.status === 422) {
							this.errors = error.response.data.errors || {}
						}
					})
			}
		}
	}
}
</script>

<style>
.contact .card-text {
	font-size: 18px;
}
.contact .message-status {
	margin-left: 5px;
}
</style>