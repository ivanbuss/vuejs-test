<template>
    <div v-if="profile" class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <p>First Name: {{ profile.first_name }}</p>
                        <p>Last Name: {{ profile.last_name }}</p>
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
                profile: []
            };
        },
        mounted: function () {
            this.getProifleData();
        },

        methods: {

        }
    }
</script>