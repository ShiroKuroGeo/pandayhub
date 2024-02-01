const { createApp } = Vue;

createApp({
    data() {
        return {
            job_title: '',
            job_location: '',
            job_project: '',
            Panday_location: null,
            Panday_skill: null,
            Panday_level: null,
            panday_exp: null,
            job_payment: '',
            job_require_exp: '',
            pandaysLength: 0,
            searchLoc: '',
            getJobs: [],
            selectedIdJob: [],
        }
    },
    methods: {
        storeJobs() {
            if (this.job_title != '' && this.job_project != '' && this.job_location != '' && this.job_require_exp != '' && this.job_payment != '') {
                const vue = this;
                var data = new FormData();
                data.append("METHOD", "storeJobs");
                data.append("file", document.getElementById('cameraClickJob').files[0]);
                data.append("job_title", vue.job_title);
                data.append("job_project", vue.job_project);
                data.append("job_location", vue.job_location);
                data.append("job_require_exp", vue.job_require_exp);
                data.append("job_payment", vue.job_payment);
                axios.post('../../../Backend/route/user.php', data)
                    .then(function (r) {
                        if (r.data == 200) {
                            alert('Successfully added');
                            window.location.reload();
                        }
                    });
            } else {
                alert('Input empty fields!');
            }
        },
        jobs() {
            const vue = this;
            var data = new FormData();
            data.append("METHOD", "jobs");
            axios.post('../../../Backend/route/user.php', data)
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
                            projectType: v.projectType,
                            job_status: v.job_status,
                            created_at: v.created_at,
                            updated_at: v.updated_at,
                        })
                    }
                });
        },
        getAllPanday() {
            const vue = this;
            var data = new FormData();
            data.append("METHOD", "myPostAsPanday");
            axios.post('../../../Backend/route/user.php', data)
                .then(function (r) {
                    vue.pandaysLength = r.data.length;
                });
        },
        selectedJob(job_id) {
            const vue = this;
            var data = new FormData();
            data.append("METHOD", "jobs");
            axios.post('../../../Backend/route/user.php', data)
                .then(function (r) {
                    vue.selectedIdJob = [];

                    for (var v of r.data) {
                        if (v.job_id == job_id) {
                            vue.selectedIdJob.push({
                                job_id: v.job_id,
                                job_poser: v.job_poser,
                                picture: v.picture,
                                name: v.firstname + ', ' + v.lastname,
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
        storePanday() {
            if (this.Panday_location != null && this.Panday_skill != null && this.Panday_level != null && this.panday_exp != null) {
                const vue = this;
                var data = new FormData();
                data.append("METHOD", "storePanday");
                data.append("Panday_location", vue.Panday_location);
                data.append("Panday_skill", vue.Panday_skill);
                data.append("Panday_level", vue.Panday_level);
                data.append("exp", vue.panday_exp);
                axios.post('../../../Backend/route/user.php', data)
                    .then(function (r) {
                        if (r.data == 200) {
                            alert("Profile Posted!");
                            vue.getAllPanday();
                            window.location.reload();
                        }
                    });
            } else {
                alert('Fill up thing up!');
            }

        },
        applyNow(job_poser, id) {
            const vue = this;
            var data = new FormData();
            data.append("METHOD", "applynow");
            data.append("job_poser", job_poser);
            data.append("job_id", id);
            axios.post('../../../Backend/route/user.php', data)
                .then(function (r) {
                    if (r.data == 200) {
                        alert('Applied');
                    } else if (r.data == 400) {
                        alert('Already Applied!');
                    }
                });
        },
    },
    created: function () {
        this.jobs();
        this.getAllPanday();
    },
    computed: {
        searchJob() {
            if (!this.searchLoc) {
                return this.getJobs;
            }
            return this.getJobs.filter(pr => pr.job_location.toLowerCase().includes(this.searchLoc.toLowerCase()) || pr.job_title.toLowerCase().includes(this.searchLoc.toLowerCase()) || pr.projectType.toLowerCase().includes(this.searchLoc.toLowerCase()));
        }
    }
}).mount('#jobshub')