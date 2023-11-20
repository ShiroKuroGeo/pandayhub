const { createApp } = Vue;

createApp({
    data() {
        return {
            applicants: [],
        }
    },
    methods: {
        applicant() {
            const vue = this;
            var data = new FormData();
            data.append("METHOD", "applicants");
            axios.post('../../Backend/route/user.php', data)
                .then(function (r) {
                    vue.applicants = [];

                    for (var v of r.data) {
                        vue.applicants.push({
                            appli_id: v.appli_id,
                            poser_id: v.poser_id,
                            appliUser_id: v.appliUser_id,
                            status: v.status,
                            profile: v.profile,
                            email: v.email,
                            firstname: v.firstname,
                            lastname: v.lastname,
                            created_at: v.created_at,
                            updated_at: v.updated_at,
                        })
                    }
                });
        },
    },
    created: function () {
        this.applicant();
    }
}).mount('#applicantsHub')