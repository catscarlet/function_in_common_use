#Firefox rushes too fast

While creating a image object :

```
var image = new Image();
image.src = "apple.jpg";
```

I was thinking I can get the height and width of the image like this :

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

In Chrome and IE11 , these code works as expected . But In Firefox , the height and width get 0 .
Firefox often rushes too fast that while `image.src = "apple.jpg";` doesn't finish , firefox rushes into `var height = image.height;`. It's no relationship of DOM ,just about javascript .

It doesn't matter what the 'apple.jpg' is . You can try to use a BASE64 encode src to check it out .

To avoid this problem ,use image.onload .


```

```



for more information , see in 

