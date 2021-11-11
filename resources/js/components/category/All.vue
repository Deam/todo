<template>
    <div>
        <div class="col-12 align-self-center">
            <div class="input-group mb-3">
                <input v-model="title" type="text" @keyup.enter="addCategory()" class="form-control" placeholder="Add a category">
                <button :disabled="title === ''" class="btn btn-primary" type="button" @click="addCategory()">Add</button>
            </div>
            <ul class="list-group list-group-flush">
                <li v-for="category in categories" :key="category.id" class="list-group-item d-flex justify-content-between align-items-center">
                    <a :href="'/category/edit/' + category.id">{{category.title}}</a>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'
    export default {
        name: "AllCategories",
        data() {
            return {
                categories: [],
                title: '',
            }
        },
        mounted() {
            this.getAll();
        },
        methods: {
            getAll() {
                axios.get('/api/category').then((response) => {
                    this.categories = response.data;
                })
            },

            addCategory() {
                axios.post('/api/category', {
                    title: this.title,
                }).then((response) => {
                    this.getAll();
                    this.title = '';
                })
            }
        }
    }
</script>
