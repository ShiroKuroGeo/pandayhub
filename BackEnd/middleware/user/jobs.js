const { createApp } = Vue;

createApp({
    data() {
        return {
            job_title: '',
            job_location: '',
            job_project: '',
            job_payment: '',
            job_require_exp: '',
            getJobs: [],
            selectedIdJob: [],
        }
    },
    methods: {
        storeJobs() {
            const vue = this;
            var data = new FormData();
            data.append("METHOD", "storeJobs");
            data.append("file", document.getElementById('cameraClickJob').files[0]);
            data.append("job_title", vue.job_title);
            data.append("job_project", vue.job_project);
            data.append("job_location", vue.job_location);
            data.append("job_require_exp", vue.job_require_exp);
            data.append("job_payment", vue.job_payment);
            axios.post('../../Backend/route/user.php', data)
                .then(function (r) {
                    if (r.data == 200) {
                        alert('Successfully added')
                    }
                });
        },
        jobs() {
            const vue = this;
            var data = new FormData();
            data.append("METHOD", "jobs");
            axios.post('../../Backend/route/user.php', data)
                .then(function (r) {
                    for (var v of r.data) {
                        vue.getJobs.push({
                            job_id: v.job_id,
                            job_poser: v.job_poser,
                            picture: v.picture,
                            job_title: v.job_title,
                            job_project: v.job_project,
                            job_location: v.job_location,
                            job_require_exp: v.job_require_exp,
                            job_payment: v.job_payment,
                            job_status: v.job_status,
                            created_at: v.created_at,
                            updated_at: v.updated_at,
                        })
                    }
                });
        },
        selectedJob(job_id) {
            const vue = this;
            var data = new FormData();
            data.append("METHOD", "jobs");
            axios.post('../../Backend/route/user.php', data)
                .then(function (r) {
                    vue.selectedIdJob = [];

                    for (var v of r.data) {
                        if (v.job_id == job_id) {
                            vue.selectedIdJob.push({
                                job_id: v.job_id,
                                job_poser: v.job_poser,
                                picture: v.picture,
                                job_title: v.job_title,
                                job_project: v.job_project,
                                job_location: v.job_location,
                                job_require_exp: v.job_require_exp,
                                job_payment: v.job_payment,
                                job_status: v.job_status,
                                created_at: v.created_at,
                                updated_at: v.updated_at,
                            })
                        }
                    }
                });
        },
        applyNow(job_poser) {
            const vue = this;
            var data = new FormData();
            data.append("METHOD", "applynow");
            data.append("job_poser", job_poser);
            axios.post('../../Backend/route/user.php', data)
                .then(function (r) {
                    alert(r.data);
                });
        },
    },
    created: function () {
        this.jobs();
    }
}).mount('#jobshub')