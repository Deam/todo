<template>
    <div>
        <input type="text" class="form-control mt-3 mb-3" v-model="filter" placeholder="Filter data by title, description or label"/>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" style="cursor: pointer" @click="sort('done')">Status</th>
                    <th scope="col" style="cursor: pointer" @click="sort('title')">Title</th>
                    <th scope="col" style="cursor: pointer" @click="sort('description')">Description</th>
                    <th scope="col" style="cursor: pointer" @click="sort('category_id')">Label</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr class="align-middle" v-for="todo in sortedTodos" :key="todo.id">
                    <th>
                        <finish-todo class="col" :todoStatus="todo.done" :todoId="todo.id"></finish-todo>
                    </th>
                    <td>
                        <a :href="'details/'+ todo.id">
                            {{todo.title}}
                        </a>
                    </td>
                    <td>
                        {{todo.description.substring(0, 18)}}
                    </td>
                    <td>
                        <span v-if="todo.category != null" class="badge bg-primary">{{todo.category.title}}</span>
                    </td>
                    <td>
                        <delete-todo :todoId="todo.id" />
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    import axios from 'axios'
    import DeleteTodo from './Delete.vue';
    import FinishTodo from './Finish.vue';

    export default {
        components: { DeleteTodo, FinishTodo },
        name: "AllTodos",
        data() {
            return {
                todos: [],
                sortBy: 'done',
                sortDirection: 'asc',
                filter: '',
            }
        },
        computed: {
            sortedTodos: function() {
                if(this.filter !== '') {
                    return this.todos.filter((row) => {
                        const categories = row.category.title.toString().toLowerCase();
                        const titles = row.title.toString().toLowerCase();
                        const descriptions = row.description.toString().toLowerCase();

                        return categories.includes(this.filter.toLowerCase()) || titles.includes(this.filter.toLowerCase()) || descriptions.includes(this.filter.toLowerCase())
                    })
                }
                return this.todos.sort((a, b) => {
                    let modifier = 1;
                    if(this.sortDirection === 'desc') modifier = -1;
                    if(a[this.sortBy] < b[this.sortBy]) return -1 * modifier; 
                    if(a[this.sortBy] > b[this.sortBy]) return 1 * modifier;
                    return 0;
                })
            }
        },
        mounted() {
            this.getAll();
        },
        methods: {
            sort(s) {
                if(s === this.sortBy) {
                    this.sortDirection = this.sortDirection === 'asc' ? 'desc' : 'asc';
                }
                this.sortBy = s;
            },
            getAll() {
                axios.get('/api/todo').then((response) => {
                    this.todos = response.data;
                })
            },
        }
    }
</script>
