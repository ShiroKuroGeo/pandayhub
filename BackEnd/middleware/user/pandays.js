const { createApp } = Vue;

createApp({
    data() {
        return {
            pandays: [],
            selectedPanday: [],
            Panday_location: '',
            Panday_skill: '',
            searchLoc: '',
            Panday_level: '',
            id: 0,
        }
    },
    methods: {
        getAllPanday() {
            const vue = this;
            var data = new FormData();
            data.append("METHOD", "panday");
            axios.post('../../../Backend/route/user.php', data)
                .then(function (r) {
                    vue.pandays = [];

                    for (var v of r.data) {
                        vue.pandays.push({
                            location: v.Panday_location,
                            skill: v.Panday_skill,
                            level: v.Panday_level,
                            rating: v.rating,
                            no_of_rating: v.no_of_rating,
                            created_at: v.created_at,
                            update_at: v.update_at,
                            userId: v.userId,
                            status: v.status,
                            profile: v.profile,
                            firstname: v.firstname,
                            lastname: v.lastname,
                        })
                    }
                });
        },
        storePanday() {
            const vue = this;
            var data = new FormData();
            data.append("METHOD", "storePanday");
            data.append("Panday_location", vue.Panday_location);
            data.append("Panday_skill", vue.Panday_skill);
            data.append("Panday_level", vue.Panday_level);
            axios.post('../../../Backend/route/user.php', data)
                .then(function (r) {
                    if (r.data == 200) {
                        alert("Successfully Post!");
                        vue.getAllPanday();
                        window.location.reload();
                    }
                });
        },
        getUser: function (id) {
            const vue = this;
            var data = new FormData();
            data.append("METHOD", "getUser");
            axios.post('../../../Backend/route/user.php', data)
                .then(function (r) {
                    alert(r.data);
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

                    setInterval(function(){ 
                        window.location.reload();
                    }, 1000)

                });
        },
        deleteHired: function (id) {
            const vue = this;
            var data = new FormData();
            data.append("METHOD", "deleteApplicant");
            data.append("userId", id);
            axios.post('../../../Backend/route/user.php', data)
                .then(function (r) {
                    vue.getAllPanday();
                });
        },
        getUserById: function (id) {
            const vue = this;
            var data = new FormData();
            data.append("METHOD", "panday");
            axios.post('../../../Backend/route/user.php', data)
                .then(function (r) {
                    vue.selectedPanday = [];

                    for (var v of r.data) {
                        if (v.userId == id) {
                            vue.selectedPanday.push({
                                location: v.Panday_location,
                                skill: v.Panday_skill,
                                level: v.Panday_level,
                                created_at: v.created_at,
                                update_at: v.update_at,
                                userId: v.userId,
                                status: v.status,
                                profile: v.profile,
                                firstname: v.firstname,
                                lastname: v.lastname,
                            })
                        }
                    }
                });
        },
        getMessageUser: function (id) {
            window.location.href = "http://localhost/pandayhub/frontend/users/chats.php?id=" + id;
        },
        round(percentage){
            var rounded = Math.round(percentage);
            return rounded;
        },
        getId: function (id) {
            this.id = id;
        },
    },
    created: function () {
        this.getAllPanday();
    },
    computed: {
        searchPanday() {
            if (!this.searchLoc) {
                return this.pandays;
            }

            return this.pandays.filter(pr => pr.location.toLowerCase().includes(this.searchLoc.toLowerCase()));
        }
    }
}).mount('#petStore')