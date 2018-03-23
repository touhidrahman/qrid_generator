$src = '../App/Assets/image/head_bg.png';
$img =new Drawing();
# $img->Create(400,100); # FOR CREATING NEW IMAGE
$img->Source($src);
$textAttrib['Shadow']=2;
$textAttrib['Size']=40;
$textAttrib['Left']=300;
$textAttrib['Angle']=rand(0,365);
$textAttrib['Top']=70;
$textAttrib['Color'] = $img->rgb(0,10,250);
	
$textAttrib1['Shadow']=3;
$textAttrib1['Size']=50;
$textAttrib1['Angle']=90;
$textAttrib['Left']=70;
$textAttrib1['Top']=100;
$textAttrib1['Color'] = $img->rgb(122,222,90);
$x = array(10,10,50,10,40,50,20,50,10,30);
$img->
	AddRectangle(2,2,500,100)->
	AddEllipse(100,50,60,60,$img->Rgb(200,200,200))->
	AddPolygon($x)->
	AddLine(10,10,500,50)->
	AddText('PHP',$textAttrib1)->AddText('PHP',$textAttrib)->
	Save('../App/Temp/head_bg2.png',FALSE)->
	Show();