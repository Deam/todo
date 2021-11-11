<template>
    <div>
        <div v-if="errors.length" class="alert alert-danger m-3" role="alert">
            <b>Please correct the following error(s):</b>
            <ul>
                <li v-for="error in errors" :key="error">{{ error }}</li>
            </ul>
        </div>

        <div class="form-group m-3">
            <label class="form-label" for="title">Name</label>
            <input type="text" v-model="name" class="form-control" name="title" required>
        </div>
        <div class="form-group m-3">
            <label class="form-label" for="description">Description</label>
            <textarea class="form-control" v-model="description" name="description" rows="3" required></textarea>
        </div>
        <div class="form-group m-3">
            <label class="form-label" for="description">Category</label>
            <select class="form-select" v-model="category" required>
                <option value="choose-cat" selected disabled>Please choose a category</option>
                <option v-for="category in categories" :key="category.id" selected :value="category.id">{{category.title}}</option>
            </select>
        </div>
        <div class="form-group m-3">
            <input type="button" @click="checkForm()" class="btn btn-primary float-end" value="Save">
        </div>
    </div>
</template>

<script>
    import axios from 'axios'

    export default {
        name: "NewTodo",
        data() {
            return {
                name: null,
                description: null,
                category: 'choose-cat',
                status: false,
                categories: [],
                errors: [],
            }
        },
        mounted() {
            this.getCategories();
        },
        methods: {
            getCategories() {
                axios.get('/api/category').then((response) => {
                    this.categories = response.data;
                })
            },
            checkForm() {
                if (this.name && this.description && this.category !== 'choose-cat') {
                    this.addTodo();
                }

                this.errors = [];

                if (!this.name) {
                    this.errors.push('A name is required');
                }

                if (!this.description) {
                    this.errors.push('A description is required');
                }

                if (this.category === 'choose-cat') {
                    this.errors.push('A category is required');
                }
            },
            async addTodo() {
                try {
                    await axios.post('/api/todo', {
                        title: this.name,
                        description: this.description,
                        status: this.status,
                        category: this.category,
                    });

                    window.location.replace('/');
                } catch (error) {
                    this.errors.push(error.response.data.errors);
                }
            },
        }
    }
</script>
