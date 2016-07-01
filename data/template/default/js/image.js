//============================================================================
//图片大小等比例缩放
var flag=false;
function DrawImage(ImgD,imwidth,imheight){
	var image=new Image();
	image.src=ImgD.src;
	if(image.width>0&&image.height>0){
		flag=true;
		if(image.width/image.height>=imwidth/imheight){
			if(image.width>imwidth){
				ImgD.width=imwidth;
				ImgD.height=(image.height*imwidth)/image.width;
			}else {
				ImgD.width=image.width;				
				ImgD.height=image.height;
			}
			//ImgD.alt=image.width+"x"+image.height; 
		}
		else {
			if(image.height>imheight){
				ImgD.height=imheight;
				ImgD.width=(image.width*imheight)/image.height;
			}else{
				ImgD.width=image.width;				
				ImgD.height=image.height;
			}
			//ImgD.alt=image.width+"x"+image.height; 
		}
	}
}