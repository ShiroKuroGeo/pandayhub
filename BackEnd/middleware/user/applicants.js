const { createApp } = Vue;

createApp({
    data() {
        return {
            applicants: [],
            hirerDatas: [],
            hirerDatasHistory: [],
            workerApplications: [],
            workerDatas: [],
            hirerDatasRate: [],
            workerDatasHistory: [],
            reasonOfReport: '',
            datestarted: '',
            update_at: '',
            id: 0,
            rate: 0
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
        hirer() {
            const vue = this;
            var data = new FormData();
            data.append("METHOD", "hirer");
            axios.post('../../../Backend/route/user.php', data)
                .then(function (r) {
                    vue.hirerDatas = [];
                    vue.hirerDatasHistory = [];
                    vue.hirerDatasRate = [];

                    for (var v of r.data) {
                        if (v.status != 4) {
                            vue.hirerDatas.push({
                                status: v.status,
                                user_hired: v.user_hired,
                                hired_id: v.hired_id,
                                hirerfirst: v.hirerfirst,
                                hirerlast: v.hirerlast,
                                hiredfirst: v.hiredfirst,
                                hiredlast: v.hiredlast,
                                profile: v.profile,
                            })
                        }
                        if (v.status == 10) {
                            vue.hirerDatasHistory.push({
                                status: v.status,
                                user_hired: v.user_hired,
                                hired_id: v.hired_id,
                                hirerfirst: v.hirerfirst,
                                hirerlast: v.hirerlast,
                                hiredfirst: v.hiredfirst,
                                hiredlast: v.hiredlast,
                                profile: v.profile,
                            })
                        }
                        if (v.status == 4) {
                            vue.hirerDatasRate.push({
                                status: v.status,
                                user_hired: v.user_hired,
                                hired_id: v.hired_id,
                                hirerfirst: v.hirerfirst,
                                hirerlast: v.hirerlast,
                                hiredfirst: v.hiredfirst,
                                hiredlast: v.hiredlast,
                                profile: v.profile,
                            })
                        }
                    }
                });
        },
        worker() {
            const vue = this;
            var data = new FormData();
            data.append("METHOD", "worker");
            axios.post('../../../Backend/route/user.php', data)
                .then(function (r) {
                    vue.workerDatas = [];
                    vue.workerDatasHistory = [];

                    for (var v of r.data) {
                        if (v.status != 4) {
                            vue.workerDatas.push({
                                status: v.status,
                                user_hired: v.user_hired,
                                hired_id: v.hired_id,
                                hirerfirst: v.hirerfirst,
                                hirerlast: v.hirerlast,
                                workerfirst: v.workerfirst,
                                workerlast: v.workerlast,
                                profile: v.profile,
                            })
                        }
                        if (v.status == 4) {
                            vue.workerDatasHistory.push({
                                status: v.status,
                                user_hired: v.user_hired,
                                hired_id: v.hired_id,
                                hirerfirst: v.hirerfirst,
                                hirerlast: v.hirerlast,
                                hiredfirst: v.hiredfirst,
                                hiredlast: v.hiredlast,
                                profile: v.profile,
                            })
                        }

                    }
                });
        },
        workerApplication() {
            const vue = this;
            var data = new FormData();
            data.append("METHOD", "applieJob");
            axios.post('../../../Backend/route/user.php', data)
                .then(function (r) {
                    console.log(r.data);
                    vue.workerApplications = [];

                    for (var v of r.data) {
                        vue.workerApplications.push({
                            appli_id: v.appli_id,
                            poserfirst: v.poserfirst,
                            poserLast: v.poserLast,
                            picture: v.picture,
                            job_title: v.job_title,
                            date_started: v.date_started,
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
            alert(id);
            // const vue = this;
            // var data = new FormData();
            // data.append("METHOD", "hiredsPanday");
            // data.append("id", id);
            // axios.post('../../../Backend/route/user.php', data)
            //     .then(function (r) {
            //         vue.deleteHired(id);
            //         window.location.reload();
            //     });
        },
        completeHired: function (id) {
            const vue = this;
            var data = new FormData();
            data.append("METHOD", "completeHired");
            data.append("id", id);
            data.append("datestarted", vue.datestarted);
            data.append("update_at", vue.update_at);
            axios.post('../../../Backend/route/user.php', data)
                .then(function (r) {
                    window.location.reload();
                });
        },
        workCompleted: function (id) {
            const vue = this;
            var data = new FormData();
            data.append("METHOD", "workCompleted");
            data.append("id", id);
            axios.post('../../../Backend/route/user.php', data)
                .then(function (r) {
                    if (r.data == 200) {
                        vue.changeStatus(id);
                    } else {
                        alert('Something is wrong!');
                    }
                });
        },
        changeStatus(id) {
            const vue = this;
            var data = new FormData();
            data.append("METHOD", "changeStatus");
            data.append("id", id);
            axios.post('../../../Backend/route/user.php', data)
                .then(function (r) {
                    window.location.href = 'rate.php';s
                })
        },
        rateme: function (id) {
            const vue = this;
            var data = new FormData();
            data.append("METHOD", "rateme");
            data.append("id", id);
            data.append("rate", this.rate);
            axios.post('../../../Backend/route/user.php', data)
                .then(function (r) {
                    if (r.data == 200) {
                        // alert('Rated!');
                        window.location.href = 'history.php'
                    } else {
                        alert('Not Rated!');
                    }
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
        getId: function (id) {
            this.id = id;
        },
    },
    created: function () {
        this.applicant();
        this.hirer();
        this.workerApplication();
        this.worker();
    }
}).mount('#applicantsHub')