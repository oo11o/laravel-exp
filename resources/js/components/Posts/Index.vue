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
                {{category.name}}
            </option>
        </select>
        <table class="table">
            <thead>
                <tr>
                    <th>Some Name</th>
                    <th>Post Text</th>
                    <th>Create Date</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="post in posts.data">
                    <th>{{ post.title }}</th>
                    <th>{{ post.post_text.substring(0,50) }}</th>
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
                category_id: ''
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
            getResult(page = 1) {
                axios.get('/api/posts?page=' + page + '&category_id=' + this.category_id)
                    .then(response => {
                        this.posts = response.data
                    });
            }
        }
    }
</script>
