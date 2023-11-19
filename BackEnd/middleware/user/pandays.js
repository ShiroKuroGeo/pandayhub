const { createApp } = Vue;

createApp({
    data() {
        return {
            pandays: [],
            Panday_location: '',
            Panday_skill: '',
            Panday_level: '',
        }
    },
    methods: {
        getAllPanday() {
            const vue = this;
            var data = new FormData();
            data.append("METHOD", "panday");
            axios.post('../../Backend/route/user.php', data)
                .then(function (r) {
                    vue.pandays = [];

                    for(var v of r.data){
                        vue.pandays.push({
                            location: v.Panday_location,
                            skill: v.Panday_skill,
                            level: v.Panday_level,
                            created_at: v.created_at,
                            update_at: v.update_at,
                            userId: v.userId,
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
            axios.post('../../Backend/route/user.php', data)
                .then(function (r) {
                    if(r.data == 200){
                        alert("Hello");
                        vue.getAllPanday();
                    }
                });
        },
    },
    created: function () {
        this.getAllPanday();
    }
}).mount('#petStore')