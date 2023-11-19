const { createApp } = Vue;

createApp({
    data() {
        return {
            getUserProfile: [],
            firstname: '',
            lastname: '',
            email: '',
            phn1: '',
            phn2: '',
        }
    },
    methods: {
        userProfile() {
            const vue = this;
            var data = new FormData();
            data.append("METHOD", "userProfile");
            axios.post('../../Backend/route/user.php', data)
                .then(function (r) {
                    vue.getUserProfile = [];

                    for (var v of r.data) {
                        vue.firstname = v.firstname,
                        vue.lastname = v.lastname,
                        vue.email = v.email,
                        vue.phn1 = v.phoneNumber,
                        vue.phn2 = v.phoneNumber2,
                        vue.getUserProfile.push({
                            userId: v.userId,
                            profile: v.profile,
                            firstname: v.firstname,
                            lastname: v.lastname,
                            email: v.email,
                            password: v.password,
                            phoneNumber: v.phoneNumber,
                            phoneNumber2: v.phoneNumber2,
                            status: v.status,
                            role: v.role,
                            create_at: v.create_at,
                            updated_at: v.updated_at,
                        })
                    }
                });
        },
        updateInformation() {
            const vue = this;
            if (vue.firstname != null && vue.lastname != null && vue.email != null && vue.phn1 != null && vue.phn2 != null && document.getElementById('cameraClickJob').files[0] != null) {
                var data = new FormData();
                data.append("METHOD", "updateInformation");
                data.append("file", document.getElementById('cameraClickJob').files[0]);
                data.append("firstname", vue.firstname);
                data.append("lastname", vue.lastname);
                data.append("email", vue.email);
                data.append("phn1", vue.phn1);
                data.append("phn2", vue.phn2);
                axios.post('../../Backend/route/user.php', data)
                    .then(function (r) {
                        if (r.data == 200) {
                            alert('Successfully updated!');
                            vue.userProfile();
                            document.getElementsByClassName('myform').clear();
                        }
                    });
            }else{
                alert("Fill up empty and images!");
            }

        }
    },
    created: function () {
        this.userProfile();
    }
}).mount('#profilehub')