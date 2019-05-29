var xm = new Vue({
    el: "#app",
    data: {
        avter: '',
        phone: '',
        password: ''
    },
    methods: {
        enter(type) {
            var phoneReg = /^[1-9][0-9]{9}[0-9]$/;
            if (!phoneReg.test(this.phone)) {
                toast('手机号有误!');
                return;
            } else if (this.password.trim() == '') {
                toast('请输入密码!');
                return;
            }
            $.post(api + '/api/login/login', {
                    phone: this.phone,
                    login_password: this.password,
                    login_type: type
                }, (data) => {
                    toast(data.msg);
                    if (data.code == 1) {
                        sessionStorage.setItem('token',data.data.token);
                        if (type == 1) {
                            // 采购端
                            window.location.href = 'Cindex.html';
                        } else {
                            // 库存端
                            window.location.href = 'Kindex.html';
                        }
                    }
                }, 'json')
                .fail((err) => {

                });
        },
        // 限制长度
        limitLength(key, length) {
            this[key] = this[key].substring(0, length);
        },
        register() {
            window.location.href = "register.html"
        },
        forget() {
            window.location.href = "forget.html"
        }
    },

});