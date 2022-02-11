<template>
    <div>
        <!-- Select Model Categories -->
        <select v-model="category_id" class="from-control col-md-3">
            <option>
                ----- chose -----
            </option>
            <option
                v-for="category in categories"
                :value="category.id">
                {{ category.name }}
            </option>
        </select>
        <table class="table">
            <thead>
            <tr>
                <th>
                    <a href="#" @click.prevent = "changeSort('title')">Title</a>
                    <span v-if="this.sort_field === 'title' && this.sort_direction === 'asc'"> &uarr; </span>
                    <span v-if="this.sort_field === 'title' && this.sort_direction === 'desc'"> &darr;</span>
                </th>
                <th>
                    <a href="#"  @click.prevent = "changeSort('post_text')">Post</a>
                    <span v-if="this.sort_field === 'post_text' && this.sort_direction === 'asc'"> &uarr; </span>
                    <span v-if="this.sort_field === 'post_text' && this.sort_direction === 'desc'"> &darr;</span>
                </th>
                <th>
                    <a href="#"  @click.prevent = "changeSort('created_at')">Create</a>
                    <span v-if="this.sort_field === 'created_at' && this.sort_direction === 'asc'"> &uarr; </span>
                    <span v-if="this.sort_field === 'created_at' && this.sort_direction === 'desc'"> &darr;</span>
                </th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="post in posts.data">
                <th>{{ post.title }}</th>
                <th>{{ post.post_text.substring(0, 50) }}</th>
                <th>{{ post.created_at }}</th>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    data() {
        return {
            posts: {},

            categories: {},
            category_id: '',

            sort_field: 'created_at',
            sort_direction: 'desc'
        }
    },
    mounted() {

        axios.get('/api/categories')
            .then(response => {
                this.categories = response.data.data
            });

        this.getResult()
    },
    watch: {
        category_id(value) {
            this.getResult();
        }
    },
    methods: {
        changeSort(field) {

            // if click same title, change sort direction,
            // else sort direction default 'asc'

            if(this.sort_field === field){
                this.sort_direction = this.sort_direction === 'asc' ? 'desc' : 'asc';
            }else{
                this.sort_direction = 'asc'
                this.sort_field = field
            }

            this.getResult()
        },

        getResult(page = 1) {
            axios.get('/api/posts?page=' + page
                + '&category_id=' + this.category_id
                + '&sort_field=' + this.sort_field
                + '&sort_direction=' + this.sort_direction
            )
            .then(response => {
                 this.posts = response.data
            });
        }
    }
}
</script>
