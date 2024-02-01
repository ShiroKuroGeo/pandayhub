const { createApp } = Vue;

createApp({
    data() {
        return {
            user: '',
            role: 1,
        }
    },
    methods: {
        registerUsers: function () {
            if (document.getElementById('firstname').value && 
                document.getElementById('lastname').value &&
                document.getElementById('email').value &&
                document.getElementById('password').value
                ) {
                if (document.getElementById('password').value == document.getElementById('cpassword').value && this.role != '') {
                    const vue = this;
                    var data = new FormData();
                    data.append("METHOD", "registerUser");
                    data.append("firstname", document.getElementById('firstname').value);
                    data.append("lastname", document.getElementById('lastname').value);
                    data.append("email", document.getElementById('email').value);
                    data.append("password", document.getElementById('password').value);
                    data.append("role", vue.role);

                    axios.post('Backend/route/authentication.php', data)
                        .then(function (r) {
                            alert('Successfully Registerd');
                            window.location.reload();
                        });
                } else {
                    alert('Password not the same!');
                }
            }else{
                alert('Input information!');
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
                    window.location.href = 'FrontEnd/users/view.php ';
                });
        },

    },
    created: function () {

    }
}).mount('#authentication')