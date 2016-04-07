#javascript使用image.height和image.width获取图片宽高值为0，获取失败

当我使用javascript创建一个图片对象：

```
var image = new Image();
image.src = "apple.jpg";
```

我以为可以这样获取图片的宽高值：

```
console.log("image", image);
console.log("image.src", image.src);
var height = image.height;
console.log("image.height", height);
console.log("image.naturalHeight", image.naturalHeight);
var width = image.width;
console.log("image.width", width);
console.log("image.naturalWidth", image.naturalWidth);
```

在某些电脑上的谷歌浏览器和IE11浏览器上，以上代码工作正常。但是火狐在第一次打开时却报出宽高值均为`0`。如果按F5刷新页面，火狐又能正确获取宽高值了。按Ctrl+F5忽略缓存的话，仍能复现这个问题。

这是因为火狐对于JS异步运行非常快。当载入`image.src = "apple.jpg";`时，火狐已经开始运行`var height = image.height;`了。而且这与DOM无关，完全是**javascript**和**浏览器**的问题。

这个问题也与图片不大相关。你可以用一个BASE64编码的src做实验，结论相同。

--------------------------------------------------------------------------------

使用`image.onload`避免这个问题。

```
image.onload = function() {
  console.log("image", image);
  console.log("image.src", image.src);
  var height = image.height;
  console.log("image.height", height);
  console.log("image.naturalHeight", image.naturalHeight);
  var width = image.width;
  console.log("image.width", width);
  console.log("image.naturalWidth", image.naturalWidth);
}
```

你可以使用`test.html`中的代码来测试结果。

--------------------------------------------------------------------------------

注意不仅仅是火狐有这个问题，Chrome和IE11都有这个问题。我在自己的电脑上执行以上代码，发现得到的结果与在公司电脑上执行的结果完全不同。

在我自己的电脑上，所有浏览器在没有`image.onload`的情况下都返回`0`。谷歌浏览器即使在页面和图片都缓存了的情况下也返回`0`，而IE11返回`0`或者正确值的情况随机。

所以当你需要获取图片信息时，记得使用事件`image.onload`来保证结果正确。

--------------------------------------------------------------------------------

## Add in 2016.04.07

If you want to create image by using `var image = new Image()`, it should be done like this:

```
var image = new Image();
image.onload = function() {
    var height = image.height;
    var width = image.width;
    ......
}
image.src = "apple.jpg";
```
Use `image.onload` before `image.src`, or there may be some unexpected problems.
