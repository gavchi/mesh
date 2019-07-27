<template>
	<div class="products">
		<div class="loading" v-if="loading">
			Loading...
		</div>

		<div v-if="error" class="error">
			<p>{{ error }}</p>

			<p>
				<button @click.prevent="fetchData">
					Try Again
				</button>
			</p>
		</div>

		<div v-if="products" class="content">
			<article class="media" v-for="{ title, description, image } in products">
				<figure class="media-left">
					<p class="image is-128x128">
						<img :src="`${image}`">
					</p>
				</figure>
				<div class="media-content">
					<div class="content">
						<p>
							<strong>{{ title }}</strong>
							<br>
							{{ description }}
						</p>
					</div>
				</div>
				<div class="media-right"></div>
			</article>
		</div>
		<div v-else class="content">
			<p>Нет товаров в данной категории</p>
		</div>
	</div>
</template>
<script>
    import axios from 'axios';
    export default {
        data() {
            return {
                loading: false,
                products: null,
                error: null,
            };
        },
        created() {
            this.getProductsFromCategory(this.$route.params.id);
        },
        beforeRouteUpdate (to, from, next) {
            this.getProductsFromCategory(to.params.id);
            next();
        },
        methods: {
            getProductsFromCategory(id) {
                this.error = this.products = null;
                this.loading = true;
                axios
                    .get('/api/category/' + id +'/products')
                    .then(response => {
                        this.loading = false;
                        this.products = response.data.length ? response.data : null;
                    }).catch(error => {
	                    this.loading = false;
	                    this.error = error.response.data.message || error.message;
	                });
            }
        }
    }
</script>
