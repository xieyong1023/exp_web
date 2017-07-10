//增加上传文章附件的功能，用XMLHttpRequest封装实现无刷新上传。
$(document).ready(function () {
    var file = $("#file");
    var btn = $("#btn");
    var message = $("#message");
    var attachfile = $("#attachfile");

    btn.click(function () {
        message.show().text('');
        var xhr = new XMLHttpRequest();
        var form_data = new FormData(document.getElementById('upload_file'));
        xhr.upload.addEventListener('progress', upload_progress, false);
        xhr.responseType = 'json';
        xhr.open("POST", "http://" + location.hostname + '/index.php/admin/article/upload_file');
        xhr.onload = function () {
            if (xhr.status === 200) {
                var data = xhr.response;
                if (data.status === 200) {
                    message.append('<span style="color:green">上传成功!</span>');
                    attachfile.val(data.remsg);
                } else {
                    message.html('<span style="color:red">' + data.remsg + '</span>');
                }
            } else {
                message.html('<span style="color:red">上传出错</span>');
            }
        };
        xhr.send(form_data);
    });

    function upload_progress(evt) {
        if (evt.lengthComputable) {
            var percentComplete = Math.round((evt.loaded / evt.total) * 100);
            message.text(percentComplete + '%');
        } else {
            message.text('不能读取文件长度');
        }
    }
});