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
                    const v = r.data;
                    if(v == 3){
                        window.location.href = 'FrontEnd/users/client/index.php ';
                    }else if(v == 1){
                        window.location.href = 'FrontEnd/users/worker/index.php ';
                    }else if(v == 2){
                        window.location.href = 'FrontEnd/admin/index.php';
                    }else{
                        alert('No data!');
                        window.location.href = 'BackEnd/logout.php';
                    }
                    // if(r.data == 400){
                    //     alert('Credentials invalid!');
                    // }else{
                    //     window.location.href = 'FrontEnd/users/client/view.php ';
                    // }
                });
        },

    },
    created: function () {

    }
}).mount('#authentication')