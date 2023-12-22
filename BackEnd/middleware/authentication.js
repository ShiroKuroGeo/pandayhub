const { createApp } = Vue;

createApp({
    data() {
        return {
            user: ''
        }
    },
    methods: {
        registerUsers: function () {
            if (document.getElementById('password').value == document.getElementById('cpassword').value) {
                const vue = this;
                var data = new FormData();
                data.append("METHOD","registerUser");
                data.append("firstname",document.getElementById('firstname').value);
                data.append("lastname",document.getElementById('lastname').value);
                data.append("email",document.getElementById('email').value);
                data.append("password",document.getElementById('password').value);

                axios.post('Backend/route/authentication.php',data)
                .then(function(r){
                    alert('Successfully Registerd');
                    window.location.reload();
                });
            } else {
                alert('Password not the same!');
            }
        },
        loginUser: function () {
            const vue = this;
            var data = new FormData();
            data.append("METHOD", "loginUser");
            data.append("Username", document.getElementById('EmailLogin').value);
            data.append("Password", document.getElementById('PasswordLogin').value);
            axios.post('Backend/route/authentication.php', data)
                .then(function (r) {
                    if (r.data == 'activeUser') {
                        window.location.href = "FrontEnd/users/index.php";
                    } else if (r.data == 'activeAdmin') {
                        window.location.href = "FrontEnd/admin/index.php";
                    } else {
                        alert('Account Restricted/Block');
                        window.location.href = '/pandayhub/BackEnd/logout.php';
                    }

                });
        },

    },
    created: function () {

    }
}).mount('#authentication')