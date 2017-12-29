export default {
    methods: {
        getProifleData: function () {
            let uid = this.$route.params.pid;
            axios.get('/api/user/'+uid+'/profile').then(response => {
                this.profile = response.data.profile;
            });
        },
    }
}