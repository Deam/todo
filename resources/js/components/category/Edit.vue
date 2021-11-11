<template>
    <div>
        <div class="d-flex justify-content-center mt-5" v-if="loading">
            <div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
        <div v-if="!loading">
            <div class="form-group m-3">
                <label class="form-label" for="title">Name</label>
                <input type="text" v-model="name" class="form-control" name="title" required>
            </div>
            <div class="form-group m-3">
                <input type="button" @click="editCategory()" class="btn btn-primary float-end" value="Save">
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'

    export default {
        name: "EditCategory",
        props: ['categoryId'],
        data() {
            return {
                name: '',
                loading: true,
            }
        },
        mounted() {
            this.getCategory();
        },
        methods: {
            getCategory() {
                axios.get('/api/category/' + this.categoryId, {
                    params: {
                        id: this.categoryId,
                    }
                }).then((response) => {
                    this.name = response.data.title;
                    this.loading = false;
                })
            },
            editCategory() {
                axios.patch('/api/category/' + this.categoryId, {
                    id: this.categoryId,
                    title: this.name,
                }).then(function (response) {
                    window.location.replace('/categories');
                }).catch(function(error) {
                    console.log(error);
                })
            },
        }
    }
</script>
