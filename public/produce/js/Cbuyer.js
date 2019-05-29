var xm = new Vue({
    el: "#app",
    data: {
        avter: 'img/upload.png',
        title: '',
        number: '',
        deliveryTime: '',
        products: [],
    },
    methods: {
        uploadEvent() {
            // 点击上传文件事件
            $('#order-img').click();
        },
        uploadImg(e) {
            var formData = new FormData();
            formData.append('file', e.target.files[0]);
            formData.append('token', sessionStorage.getItem('token'));
            // 上传图片
            $.ajax({
                url: api + '/api/common/upload',
                type: 'post',
                async: false,
                contentType: false,
                processData: false,
                data: formData,
                success: (data) => {
                    toast(data.msg);
                    if (data.code == 1) {
                        this.avter = data.data.url;
                    }
                },
                error: function () {
                    toast('服务器异常');
                }
            });
        },
        addOrder() {
            var regNum = /^[1-9]+([0-9]*)([0-9]?)$/;
            if (this.title.trim() == '') {
                toast('请输入名称!');
                return;
            } else if (!regNum.test(this.number)) {
                toast('请输入正确的数量!');
                return;
            } else if (this.deliveryTime == '') {
                toast('请选择日期!');
                return;
            }
            // 上传采购记录
            $.post(api + '/api/purchase/creOrder', {
                product_name: this.title,
                // 商品数量
                qty: this.number,
                product_image: this.avter,
                delivery_at: this.deliveryTime,
                token: sessionStorage.getItem('token')
            }, function (data) {
                toast(data.msg);
                if (data.code == 1) {
                    setTimeout(() => {
                        history.go(-1);
                    }, 500);
                }
            }, 'json')
                .fail(function (err) {
                    toast('服务器异常!');
                });
        }

    },
    created() {
        this.$nextTick(() => {
            // 日期组件
            $("#date-picker").datetimePicker({
                years: (function () {
                    var currentYear = new Date().getFullYear();
                    var array = [currentYear];
                    for (var i = 0; i < 9; i++) {
                        currentYear += 1;
                        array.push(currentYear);
                    }
                    return array;
                })(),
                onChange: (res) => {
                    this.deliveryTime = res.value[0] + '-' + res.value[1] +
                        '-' + res.value[2] + ' ' + res.value[3] + ':' + res.value[4];
                }
            });
            // 下拉列表组件
            $("#title-select").picker({
                title: "产品名称",
                cols: [{
                    textAlign: 'center',
                    values: this.products,
                }],
                onChange: (res) => {
                    if (res.value) {
                        this.title = res.value[0];
                    }
                }
            });
        });



        $.post(api + '/api/purchase/allProducts', {

        }, (data) => {
            // toast(data.msg);
            console.log(data.data)
            if (data.code == 1) {
                for (var i = 0; i < data.data.length; i++) {
                    this.products.push(data.data[i].product_name)
                }
            }
        }, 'json')
            .fail((err) => {

            })
    }
});




$(function () {
    $('select').comboSelect();

    $('.show').on('click', function (e) {
        $('select').focus();
        e.preventDefault();
    });

    $('.show').on('click', function (e) {
        $('select').trigger('comboselect:close');
        e.preventDefault();
    });
});