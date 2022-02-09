<template>
    <div>
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
                posts: {}
            }
        },
        mounted() {
            this.getResult()
        },
        methods: {
            getResult(page = 1) {
                axios.get('/api/posts?page=' + page)
                    .then(response => {
                        this.posts = response.data
                    });
            }
        }
    }
</script>
