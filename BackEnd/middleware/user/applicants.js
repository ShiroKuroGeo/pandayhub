const { createApp } = Vue;

createApp({
    data() {
        return {
            applicants: [],
            reasonOfReport: '',
            id: 0
        }
    },
    methods: {
        applicant() {
            const vue = this;
            var data = new FormData();
            data.append("METHOD", "applicants");
            axios.post('../../../Backend/route/user.php', data)
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
        applicant() {
            const vue = this;
            var data = new FormData();
            data.append("METHOD", "applieJob");
            axios.post('../../../Backend/route/user.php', data)
                .then(function (r) {
                    vue.applicants = [];

                    for (var v of r.data) {
                        vue.applicants.push({
                            picture: v.picture,
                            job_title: v.job_title,
                            job_project: v.job_project,
                            job_location: v.job_location,
                            job_require_exp: v.job_require_exp,
                            projectType: v.projectType,
                            job_payment: v.job_payment,
                            job_status: v.job_status,
                        })
                    }
                });
        },
        getHireUser: function (id) {
            const vue = this;
            var data = new FormData();
            data.append("METHOD", "hiredsPanday");
            data.append("id", id);
            axios.post('../../../Backend/route/user.php', data)
                .then(function (r) {
                    vue.deleteHired(id);
                });
        },
        deleteHired: function (id) {
            const vue = this;
            var data = new FormData();
            data.append("METHOD", "deleteApplicant");
            data.append("userId", id);
            axios.post('../../../Backend/route/user.php', data)
                .then(function (r) {
                    vue.applicant();
                });
        },
        reportUsers: function (id) {
            const vue = this;
            var data = new FormData();
            data.append("METHOD", "reportUsers");
            data.append("reason", vue.reasonOfReport);
            data.append("id", id);
            axios.post('../../../Backend/route/user.php', data)
                .then(function (r) {
                    if (r.data == 200) {
                        alert('User reported!');
                    } else {
                        alert('Cannot send the application');
                    }
                });
        },
        getId: function(id){
            this.id = id;
        },
    },
    created: function () {
        this.applicant();
    }
}).mount('#applicantsHub')