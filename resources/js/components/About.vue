<template>
    <div class="about">
        <!-- Start About Card -->
        <div class="card">
            <div class="card-body">
                <div class="links-container">
					<router-link :to="'/'" class="btn btn-primary">
						<i class="fas fa-arrow-left"></i>
					</router-link>
				</div>
                <div class="image-container">
                    <img class="card-img-top" src="/assets/austin.png">
                </div>
                <h3 class="card-title">About Me</h3>
                <p class="card-text">
                    👋 I'm <span class="colorBlue">Austin</span>!
                    <br><br>
                    Test I've finally figured out something that I enjoy doing, and would love to make it a <span class="colorBlue">career</span>
                    – <span class="colorBlue">web development</span>! I enjoy staying <span class="colorBlue">up to
                        date</span> with today's latest and greatest technologies. This whole portfolio website
                    sprouted from my interest in componentialized systems that render on the client side, rather than
                    server side. Hence my use of Vue.js. 🤓
                    <br><br>
                    When I'm not doing web development related things you can find me – <span class="colorBlue">developing
                        my small lifestyle</span> / <span class="colorBlue">automotive brand</span> – <span class="colorBlue">shooting</span>,
                    <span class="colorBlue">editing pictures 📸 and videos 📹</span>. You can find all the relevant links
                    below!
                    <br><br>
                    <span class="colorBlue">Thanks</span> for checking out my potfolio!
                </p>
                <div class="buttons-container">
                    <div class="links-container">
                        <a class="btn btn-info" target="_blank" href="https://www.okurasu.club/">Brand Website</a>
                        <a class="btn btn-info" target="_blank" href="https://www.instagram.com/okurasuclub/">Brand
                            Instagram</a>
                        <a class="btn btn-warning" target="_blank" href="https://www.instagram.com/4oh3/">Instagram</a>
                        <a class="btn btn-danger" target="_blank" href="https://www.youtube.com/channel/UCxVCrkin6pVwVwR3RZWg4GQ">Youtube</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start About Site Card -->
        <div class="card">
            <div class="card-body">
                <div class="links-container">
					<router-link :to="'/'" class="btn btn-primary">
						<i class="fas fa-arrow-left"></i>
					</router-link>
				</div>
                <h4 class="card-title">About This Website</h4>
                <h6 class="card-text">Video demonstrating the backend features – CMS like functionality</h6>
                <div class="video-container">
                    <iframe class="demo-video" src="https://www.youtube.com/embed/YR4a_Ukv-mU" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                </div>
                <div class="buttons-container">
                    <div class="links-container">
                        <a class="btn btn-danger" target="_blank" href="https://www.youtube.com/watch?v=YR4a_Ukv-mU">Watch on Youtube</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style>
.about .image-container {
	display: grid;
	place-items: center;
}
.about .card-img-top {
	width: 25%;
	border-radius: 50%;
}
.about .card-title {
	margin-bottom: 10px;
}
.about .card-text {
	font-size: 18px;
}
/* About Site */
.about .video-container {
	margin: 15px 0;
}
.about .demo-video {
	width: 100%;
	height: 580px;
}
@media (max-width: 992px) {
	.about .demo-video {
		height: 360px;
	}
}
@media (max-width: 576px) {
	.about .demo-video {
		height: 240px;
	}
}
</style>