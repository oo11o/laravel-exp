<template>
    <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Laravel</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <router-link
                                active-class="active-menu"
                                exact
                                :to="{ name: 'posts.index' }"
                                class="nav-link active" aria-current="page"> List Posts
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link
                                active-class="active-menu"
                                exact
                                :to="{ name: 'posts.create' }"
                                class="nav-link"> Add Posts
                            </router-link>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <section id="main">
            <router-view></router-view>
        </section>
    </div>
</template>

<script>
    export default {
        name: "App"
    }
</script>

<style scoped>

</style>
