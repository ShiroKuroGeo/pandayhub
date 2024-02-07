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
                            hired_id: v.hired_id,
                            userId: v.userId,
                            status: v.status,
                            created_at: v.created_at,
                            updated_at: v.updated_at,
                            profile: v.profile,
                            firstname: v.firstname,
                            lastname: v.lastname,
                            poserfirst: v.poserfirst,
                            poserlast: v.poserlast,
                            cuid: v.cuid,
                            email: v.email,
                            phoneNumber: v.phoneNumber,
                            phoneNumber2: v.phoneNumber2,
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
                    } else {
                        alert('Cannot send the application');
                    }
                });
        },
        getId: function(id){
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