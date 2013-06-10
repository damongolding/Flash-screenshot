import com.adobe.images.JPGEncoder;

//settings

var saveLocation = "http://localhost/banners/save.php?"; // where you are going to save the sceenshots. Doesn't have to be local
var takeScreenshot:Boolean = false; // Change this to true in your flash file to turn on


var jpgEncoder:JPGEncoder = new JPGEncoder(100);
var i:Number = 1;
var header:URLRequestHeader = new URLRequestHeader("Content-type", "application/octet-stream");
var jpgURLRequest:URLRequest;
var imgBitmap:Bitmap;


var local:Boolean = new RegExp("file://").test(loaderInfo.url);
var theURL:String = loaderInfo.url;
var myURL:String = theURL.toLowerCase();


var swfName:String;
    swfName = stage.loaderInfo.url;
    swfName = swfName.slice(swfName.lastIndexOf("/") + 1);
    swfName = swfName.slice(0, -4); 
    swfName = new URLVariables("path=" + swfName).path; 

function screenshot(e:Number = 0)
{
	if(takeScreenshot){
		if (local === true)  { // if we are on local go ahead and take a screen shot, otherwise dont (fallback to stop it trying to take a screenshot on a live site if you havent changed takeScreenshot to false)
			jpgURLRequest = new URLRequest(saveLocation+ swfName + "_" + i);
			var myBitmapData:BitmapData = new BitmapData(stage.stageWidth,stage.stageHeight);
			
			setTimeout(function(){
			trace("screenshot " + i +" taken");
			myBitmapData.draw(stage);
			var jpgStream:ByteArray = jpgEncoder.encode(myBitmapData);
			imgBitmap = new Bitmap(myBitmapData);	
			jpgURLRequest.requestHeaders.push(header);
			jpgURLRequest.method = URLRequestMethod.POST;
			jpgURLRequest.data = jpgStream;
			sendToURL(jpgURLRequest);
			i++;
		
		   	},e * 1000);
		   
		}
		else{
			trace("no screenshot taken");
		}
	}
	else{
		// takeScreenshot is false
	}
		
}


