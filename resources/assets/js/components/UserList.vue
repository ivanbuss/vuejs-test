<template>
    <div>
        <ul>
            <li v-for="user in users">
                <router-link :to="{ name: 'user', params: {pid: user.id } }">User {{ user.id }}</router-link>
            </li>
        </ul>
    </div>
</template>
<script>
    import Mixin from '../mixins';
    export default {
        mixins: [ Mixin ],

        data: function () {
            return {
                users: []
            };
        },

        mounted: function () {
            this.getUsers();
        },

        methods: {
            getUsers: function () {
                axios.get('/api/user-list').then(response => {
                    this.users = response.data.list;
                });
            }
        }
    }
</script>