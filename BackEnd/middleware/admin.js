const { createApp } = Vue;

createApp({
    data() {
        return {
            recentUser: [],
            allUsers: [],
            getAllReported: [],
            firstname: '',
            selectedOption: 0,
        }
    },
    methods: {
        reportToRestrict: function (id) {
            const vue = this;
            var data = new FormData();
            data.append("METHOD", "reportToRestrict");
            data.append("id", id);
            axios.post('../../Backend/route/admin.php', data)
                .then(function (r) {
                    if(r.data == 200){
                        alert('Reported restrict!');
                        window.location.reload();
                    }else{
                        alert(r.data);
                    }

                });
        },
        getReportedUsers: function () {
            const vue = this;
            var data = new FormData();
            data.append("METHOD", "allReported");
            axios.post('../../Backend/route/admin.php', data)
                .then(function (r) {
                    vue.getAllReported = [];

                    for (var v of r.data) {
                        vue.getAllReported.push({
                            reason: v.reason,
                            report_id: v.report_id,
                            created_at: v.created_at,
                            repFirstname: v.repFirstname,
                            repLastname: v.repLastname,
                            firstname: v.firstname,
                            lastname: v.lastname,
                            reported_id: v.reported_id,
                        });
                    }

                });
        },
        getUsers: function () {
            const vue = this;
            var data = new FormData();
            data.append("METHOD", "getUsers");
            axios.post('../../Backend/route/admin.php', data)
                .then(function (r) {
                    console.log(r.data);
                    vue.recentUser = [];

                    for (var v of r.data) {
                        vue.recentUser.push({
                            firstname: v.firstname,
                            lastname: v.lastname,
                            email: v.email,
                            create_at: v.create_at,
                        });
                    }
                });
        },
        getAllUsers: function () {
            const vue = this;
            var data = new FormData();
            data.append("METHOD", "getAllUsers");
            axios.post('../../Backend/route/admin.php', data)
                .then(function (r) {
                    console.log(r.data);
                    vue.allUsers = [];

                    for (var v of r.data) {
                        vue.allUsers.push({
                            userId: v.userId,
                            firstname: v.firstname,
                            lastname: v.lastname,
                            profile: v.profile,
                            email: v.email,
                            status: v.status,
                            role: v.role,
                            create_at: v.create_at,
                        });
                    }
                });
        },
        my: function () {
            const vue = this;
            var data = new FormData();
            data.append("METHOD", "My");
            axios.post('../../Backend/route/admin.php', data)
                .then(function (r) {
                    console.log(r.data);
                    for (var v of r.data) {
                        vue.firstname = v.firstname +', '+v.lastname;
                    }
                });
        },
        updateUsersRestriction: function (id, status) {
            if(confirm('Are you sure want to change the status?')){
                const vue = this;
                var data = new FormData();
                data.append("METHOD", "updateUsersRestriction");
                data.append("id", id);
                data.append("stats", status);
                axios.post('../../Backend/route/admin.php', data)
                    .then(function (r) {
                        if (r.data == 200) {
                            alert('Changed Status!');
                            vue.getAllUsers();
                        }
                    });
            }
        },
        chart: function () {
            const vue = this;
            var data = new FormData();
            data.append("METHOD", "getUsers");
            axios.post('../../Backend/route/admin.php', data)
                .then(function (r) {
                    const xValues = ['January', 'Febuary', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December',];
                    const yValues = [7, 8, 8, 9, 9, 9, 10, 11, 14, 14, 15];

                    new Chart("myChart", {
                        type: "line",
                        data: {
                            labels: xValues,
                            datasets: [{
                                fill: false,
                                lineTension: 0,
                                backgroundColor: 'black',
                                borderColor: "black",
                                data: yValues
                            }]
                        },
                        options: {
                            legend: {
                                display: false
                            },
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        min: 6,
                                        max: 16
                                    }
                                }],
                            }
                        }
                    });
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
        },
        getUserId: function(id){
            this.ids = id;
        }
    },
    created: function () {
        this.getUsers();
        this.chart();
        this.getAllUsers();
        this.my();
        this.getReportedUsers();
    }
}).mount('#adminHub')