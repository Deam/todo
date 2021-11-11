<template>
    <div>
        <button @click="deleteTodo()" type="button" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button>
    </div>
</template>

<script>
    import axios from 'axios'

    export default {
        name: "DeleteTodo",
        props: ['todoId'],
        methods: {
            deleteTodo() {
                if(confirm('Are you sure you want to delete?')) {
                    axios.delete('/api/todo/' + this.todoId, {
                        id: this.todoId,
                    }).then(function (response) {
                        window.location.replace('/');
                    }).catch(function(error) {
                        console.log(error);
                    })
                }
            }
        }
    }
</script>
