const { createApp } = Vue;

createApp({
    data() {
        return {
            pandays: [],
            job: [],
            selectedPanday: [],
            selectedJob: [],
            pandaysLength: 0,
            jobLength: 0,
            id: 0
        }
    },
    methods: {
        getAllPanday() {
            const vue = this;
            var data = new FormData();
            data.append("METHOD", "myPostAsPanday");
            axios.post('../../../Backend/route/user.php', data)
                .then(function (r) {
                    vue.pandays = [];
                    vue.pandaysLength = r.data.length;

                    for (var v of r.data) {
                        vue.pandays.push({
                            location: v.Panday_location,
                            level: v.Panday_level,
                            skill: v.Panday_skill,
                            status: v.status,
                            id: v.id,
                            profile: v.profile,
                            firstname: v.firstname,
                            lastname: v.lastname,
                        })
                    }
                });
        },
        getAllSelectedPanday(id) {
            const vue = this;
            var data = new FormData();
            data.append("METHOD", "myPostAsPanday");
            axios.post('../../../Backend/route/user.php', data)
                .then(function (r) {
                    vue.selectedPanday = [];

                    for (var v of r.data) {
                        if (v.id == id) {
                            vue.selectedPanday.push({
                                location: v.Panday_location,
                                level: v.Panday_level,
                                skill: v.Panday_skill,
                                status: v.status,
                                profile: v.profile,
                                firstname: v.firstname,
                                lastname: v.lastname,
                            })
                        }
                    }
                });
        },
        getAllJob() {
            const vue = this;
            var data = new FormData();
            data.append("METHOD", "myPostAsJob");
            axios.post('../../../Backend/route/user.php', data)
                .then(function (r) {
                    vue.job = [];
                    vue.jobLength = r.data.length;

                    for (var v of r.data) {
                        vue.job.push({
                            id: v.job_id,
                            title: v.job_title,
                            image: v.picture,
                            job_project: v.job_project,
                            job_location: v.job_location,
                            job_require_exp: v.job_require_exp,
                            projectType: v.projectType,
                            job_payment: v.job_payment,
                            job_status: v.job_status,
                            created_at: v.created_at,
                        })
                    }
                });
        },
        getAllSelectedJob(id) {
            const vue = this;
            var data = new FormData();
            data.append("METHOD", "myPostAsJob");
            axios.post('../../../Backend/route/user.php', data)
                .then(function (r) {
                    vue.selectedJob = [];

                    for (var v of r.data) {
                        if (v.job_id == id) {
                            vue.selectedJob.push({
                                id: v.job_id,
                                title: v.job_title,
                                image: v.picture,
                                job_project: v.job_project,
                                job_location: v.job_location,
                                job_require_exp: v.job_require_exp,
                                projectType: v.projectType,
                                job_payment: v.job_payment,
                                job_status: v.job_status,
                                created_at: v.created_at,
                            })
                        }
                    }
                });
        },
        getId: function (id) {
            this.id = id;
        },
        deletepanday: function (id) {
            const vue = this;
            var data = new FormData();
            data.append("METHOD", "deletepanday");
            data.append("id", id);
            axios.post('../../../Backend/route/user.php', data)
                .then(function (r) {
                    if (r.data) {
                        alert('Successfully deleted!');
                    } else {
                        alert(r.data);
                    }
                });
        },
        deletejob: function (id) {
            const vue = this;
            var data = new FormData();
            data.append("METHOD", "deletejob");
            data.append("id", id);
            axios.post('../../../Backend/route/user.php', data)
                .then(function (r) {
                    if (r.data) {
                        alert('Successfully deleted!');
                    } else {
                        alert(r.data);
                    }
                });
        },
        dateString: function (dateString) {

            var dateObject = new Date(dateString);

            var formattedDateString = dateObject.toLocaleString('en-US', {
                weekday: 'short',
                month: 'short',
                day: 'numeric',
                year: 'numeric'
            });

            return formattedDateString;
        }
    },
    created: function () {
        this.getAllPanday();
        this.getAllJob();
        this.getAllSelectedPanday(0);
        this.getAllSelectedJob(0);
    }
}).mount('#postHub')