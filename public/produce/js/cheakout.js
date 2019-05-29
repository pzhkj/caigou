new Vue({
    el: '#app',
    data: {
        number: '',
        orderSn: '',
        orderName: '',
    },
    methods: {
        // 确认入库 / 出库
        confirm() {
            var regNum = /^[1-9]+([0-9]*)([0-9]?)$/;
            if (this.orderSn.trim() == '') {
                toast('请输入产品标号!');
                return;
            }
            else if (!regNum.test(this.number)) {
                toast('请输入正确的数量!');
                return;
            } else if (this.number > sessionStorage.getItem('num')) {
                toast('输入的超出总数量!');
                return
            }
                var url = api += '/api/stock/outSystem';
            $.post(url, {
                order_id: this.orderName,
                qty: this.number,
                token: sessionStorage.getItem('token')
            }, (data) => {
                toast(data.msg);
                if (data.code == 1) {
                    setTimeout(() => {
                        history.go(-1);
                    }, 500);
                }
            }, 'json')
                .fail(err => {

                });
        }
    },
    created() {
        if (getUrlKey('type') == 'in') {
            this.isIn = true;
        }

        this.orderName = sessionStorage.getItem("name")
    }
});