<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        <ul class="list-group" v-if="messages.length">
                            <li class="list-group-item" v-for="message in messages">{{ message }}</li>
                        </ul>
                        <p v-if="messages.length === 0">No messages yet</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                messages: []
            };
        },
        mounted() {
            Echo.channel('messages')
                .listen('NewMessage', (e) => {
                    this.messages.push(e.message);
                });
        }
    }
</script>
