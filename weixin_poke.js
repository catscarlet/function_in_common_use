/*
For WeChat on PC and Android, The title can be changed by using 'document.title', but it doesn't work on iOS because the Wechat sucks.
When you need to change the title, you need to reload the page instead.
Try to do like this. Load a iframe and remove it, and the Wechat is poked.
*/

function changeWechatWebviewTitle(newTitle) {
    var $body = $('body');
    document.title = newTitle;
    var $iframe = $('<iframe src="/favicon.ico"></iframe>');
    $iframe.on('load',function() {
        setTimeout(function() {
            $iframe.off('load').remove();
        }, 0);
    }).appendTo($body);
}
