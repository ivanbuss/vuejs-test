<template>
    <div v-if="profile" class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        User {{ $route.params.pid }} Settings

                        <p>{{ error_message }}</p>
                        <form id="profile-form" @submit.prevent="updateProfile">
                            <div class="first-name-secton">
                                <label for="first_name">First Name</label>
                                <input type="text" name="first_name" :value=profile.first_name>
                            </div>
                            <div class="last-name-section">
                                <label for="last_name">Last Name</label>
                                <input type="text" name="last_name" :value=profile.last_name>
                            </div>
                            <input type="submit" value="Submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import Mixin from '../mixins';
    export default {
        mixins: [Mixin],
        data: function () {
            return {
                profile: [],
                error_message: ''
            };
        },
        mounted: function () {
            this.getProifleData();
        },
        methods: {
            updateProfile: function() {
                let uid = this.$route.params.pid;

                axios.post('/api/user/'+uid+'/save', {
                    'first_name': jQuery('input[name="first_name"]').val(),
                    'last_name': jQuery('input[name="last_name"]').val()
                }).then(response => {
                    this.profile = response.data.profile;
                    this.error_message = response.data.error_message
                })
                .catch(function (error) {
                    console.log(error);
                });
            }
        }
    }
</script>