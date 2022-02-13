import PostsIndex from "../components/Posts/Index";
import PostsCreate from "../components/Posts/Create";

import { createRouter, createWebHistory } from 'vue-router'

const routes = [
    {
        path: '/',
        component: PostsIndex,
        name: 'posts.index'
    },
    {
        path: '/posts/create',
        component: PostsCreate,
        name: 'posts.create'
    }
];

export default createRouter({
    history: createWebHistory(),
    routes
})
