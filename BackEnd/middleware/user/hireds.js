const { createApp } = Vue;

createApp({
    data() {
        return {
            hireds: [],
            reasonOfReport: '',
            id: 0
        }
    },
    methods: {
        getAllHireds: function () {
            const vue = this;
            var data = new FormData();
            data.append("METHOD", "getAllHireds");
            axios.post('../../../Backend/route/user.php', data)
                .then(function (r) {
                    vue.hireds = [];

                    for (var v of r.data) {
                        vue.hireds.push({
                            appli_id: v.appli_id,
                            email: v.email,
                            firstname: v.firstname,
                            lastname: v.lastname,
                            poserfirst: v.poserfirst,
                            poserlast: v.poserlast,
                            profile: v.profile,
                            rating: v.rating,
                            appstats: v.appstats,
                        })
                    }
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

                        setInterval(function () { window.location.reload(); }, 1000);
                    } else {
                        alert('Cannot send the application');
                    }
                });
        },
        decline: function (id) {
            const vue = this;
            var data = new FormData();
            data.append("METHOD", "decline");
            data.append("id", id);
            axios.post('../../../Backend/route/user.php', data)
                .then(function (r) {
                    alert(r.data);
                });
        },
        dateString(dateString) {
            var date = new Date(dateString);
            var options = { weekday: 'long', month: 'long', day: 'numeric' };
            var formattedDate = date.toLocaleDateString('en-US', options);
            return formattedDate;
        },
        getId: function (id) {
            this.id = id;
        },
        chat(id) {
            window.location.href = "http://localhost/pandayhub/frontend/users/chats.php?id=" + id;
        }
    },
    created: function () {
        this.getAllHireds();
    }
}).mount('#hiredshub')