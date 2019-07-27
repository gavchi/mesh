<template>
	<div class="container">
		<div class="columns">
			<div class="column is-one-third">
				<ul>
					<li><router-link :to="{ name: 'home' }">Home</router-link></li>
				</ul>
				<div v-if="categories">
					<v-treeview dense :items="categories" :item-children="'children'" :open-all="true">
						<template slot="label" slot-scope="props">
							<router-link :to="props.item.to">{{ props.item.name }}</router-link>
						</template>
					</v-treeview>
				</div>
			</div>
			<div class="column is-two-thirds">
				<router-view></router-view>
			</div>
		</div>
	</div>
</template>

<script>
    import axios from 'axios';
    export default {
        name: "App",
        data() {
            return {
                loading: false,
                categories: null,
                error: null,
            };
        },
        created() {
            this.fetchData();
        },
        methods: {
            fetchData() {
                this.error = this.products = null;
                this.loading = true;
                let getTreeviewItem = function(elem) {
                    //console.log(elem);
                    let items = [];
                    for (let child in elem) {
                        let item = {};
                        item.id = elem[child].id;
                        item.name = elem[child].title;
                        //item.to = '/category/' + elem[child].id + '/products';
                        item.to = { name: 'category.products', params: { id: elem[child].id } };
                        if (0 !== elem[child].children.length) {
                            item.children = getTreeviewItem(elem[child].children);
                        }
                        items.push(item);
                    }
                    return items;
                };
                axios
                    .get('/api/category')
                    .then(response => {
                        this.loading = false;
                        this.categories = getTreeviewItem(response.data);
                    }).catch(error => {
                    this.loading = false;
                    this.error = error.message || error.response.data.message;
                });
            }
        }
    }
</script>

<style scoped>

</style>
