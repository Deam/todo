<template>
    <div>
        <div @click="finishTodo()" class="btn">
            <i v-if="todoStatus" class="fas fa-check" :style="{ 'color': 'mediumseagreen' }"></i>
            <i v-if="!todoStatus" class="fas fa-times" :style="{ 'color': 'red' }"></i>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'

    export default {
        name: "FinishTodo",
        props: ['todoId', 'todoStatus'],
        methods: {
            finishTodo() {
                axios.post('/api/todo/finish', {
                    id: this.todoId,
                    status: !this.todoStatus,
                }).then(function (response) {
                    window.location.replace('/');
                })
            }
        }
    }
</script>
