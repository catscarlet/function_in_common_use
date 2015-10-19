#Firefox rushes too fast

While creating a image object :

```
var image = new Image();
image.src = "apple.jpg";
```

I thought I can get the height and width of the image like this :

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

In Chrome and IE11 on some computers, the code works as expected. But in Firefox, the height and width get `0` at the first time.If you refresh the page by pressing F5, It turns to be get the right value. Try testing it by pressing Ctrl+F5.

Firefox often rushes too fast. While `image.src = "apple.jpg";` is loading on the way, firefox rushes into `var height = image.height;`. It's no relationship with DOM, just about javascript.

It doesn't matter what the 'apple.jpg' is. You can try to use a BASE64 encode src to check out.
___
To avoid this problem, use `image.onload`.

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

You can edit the file 'test.html', comment line 12 and line 21 for debugging.
___
Notice that not only Firefox get this problem, but also Chrome and IE11 do. I tried testing it on my own computer and found it didn't get the same when I tried testing on the computer of my company.

On my own computer, all of the browser turn to be get `0` without image.onload. Chrome always gets `0` no matter if the page is cached. IE11 gets random result weirdly.

So be sure when you want to get the information of a image, you should use the event "image.onload".
