# AS3 Flash screenshot saver

I basically use this for Flash banners when a animated GIF fallback is needed

### Usage

Include the script and enable it:

```
include "com/screenshot/screengrab.as";
takeScreenshot = true;
```

call the screenshot function:

```
screenshot(); //you can pass a param if you wish to delay the function being called i.e screenshot(2) will delay the action by 2s
```

Example usage with Greensock

```
TweenLite.from(MovieClip, 1.5 ,{x:200,y:100, onComplete:screenshot});
```
