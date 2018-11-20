window.onload=function(){

	/*导航栏固定代码开始*/

	var navBox=document.getElementById("navBox");
	var nav=document.getElementById("nav");
	var navHide=document.getElementById("navHide");
	var offsetTop=navBox.offsetTop+navBox.offsetHeight;

	window.onscroll=function(){

		var scrollTop=document.documentElement.scrollTop || document.body.scrollTop;
		if(scrollTop>=offsetTop){	
			nav.style.display="none";
			navHide.style.display="block";
		}else{
			nav.style.display="block";
			navHide.style.display="none";
		}

	}

	/*导航栏固定代码结束*/

	/*轮播图代码开始*/

	/*获取父级元素和List列表*/
	var oLoop=document.getElementById("loop");
	var oUl=oLoop.getElementsByTagName("ul")[0];
	var aLi=oUl.getElementsByTagName("li");

	/*获取底部小按钮*/
	var oBtn=document.getElementById("btn");
	var aSpan=oBtn.getElementsByTagName("span");

	/*获取左右按钮*/
	var oPrev=document.getElementById("prev");
	var oNext=document.getElementById("next");

	var imgWidth=1000;		//图片宽度
	var timers=null;		//定时器
	var index=0;			//计录轮播图循环到第几张
	var flag=true;			//判断上一次运动是否完成

	/*鼠标移到轮播图上*/
	oLoop.onmouseover=function(){

		/*关闭定时器*/
		clearInterval(timers);

		/*点击左边按钮*/
		oPrev.onclick=function(){
			if(flag){
				flag=false;
				index--;
				toRun(index);
			}
		}

		/*点击右边按钮*/
		oNext.onclick=function(){
			if(flag){
				flag=false;
				index++;
				toRun(index);
			}
		}

		/*点击底部小按钮*/
		for(var i=0;i<aSpan.length;i++){
			aSpan[i].id=i;
			aSpan[i].onclick=function(){
				if(flag){
					flag=false;
					toRun(this.id);
				}
			}
		}

	}

	/*鼠标从轮播图上移开*/
	oLoop.onmouseout=function(){
		/*开启定时器*/
		timers=setInterval(autoplay,5000);
	}

	/*页面加载完成后开启定时器*/
	timers=setInterval(autoplay,5000);

	/*轮播图自动循环轮播函数*/
	function autoplay(){
		index++;
		toRun(index);
	}

	/*轮播图切换函数*/
	function toRun(curIndex){

		var curIndex2=curIndex;

		/*判断索引值*/
		if(curIndex>=aLi.length){
			aLi[0].style.position='relative';
			aLi[0].style.left=aLi.length*imgWidth+'px';
			curIndex=0;
		}
		if(curIndex<0){
			aLi[aLi.length-1].style.position='relative';
			aLi[aLi.length-1].style.left=-aLi.length*imgWidth+'px';
			curIndex=aLi.length-1;
		}

		/*每次执行轮播图切换都将底部小按钮class值置空*/
		for(var i=0;i<aSpan.length;i++){
			aSpan[i].className='';
		}

		/*为索引值所代表的底部小按钮的class赋值*/
		aSpan[curIndex].className='active';

		/*调用运动框架*/
		startMove(oUl,'left',-curIndex2*imgWidth,function(){
			if(curIndex==0){
				oUl.style.left=0;
				aLi[0].style.position='static';
			}
			if(curIndex==aLi.length-1){
				oUl.style.left=-curIndex*imgWidth+'px';
				aLi[aLi.length-1].style.position='static';
			}

			/*运动执行完毕后，将flag置为真*/
			flag=true;
		})

		index=curIndex;

	}

	/*轮播图代码结束*/

	/*banner栏目代码开始*/
	var bannerClaNum=[];
	var banner=document.getElementById("banner");

	bannerClaNum=getClass(banner,'banner');

	for(var i=0;i<bannerClaNum.length;i++){
		bannerClaNum[i].onmouseover=function(){
			startMove(this.getElementsByTagName('p')[0],'height',30);
		}
		bannerClaNum[i].onmouseout=function(){
			startMove(this.getElementsByTagName('p')[0],'height',0);
		}

	}

	/*banner栏目代码结束*/	

	/*友情链接代码开始*/

	var alink=document.getElementById("alink");
	var alinkList=alink.getElementsByTagName("li");

	for(var i=0;i<alinkList.length;i++){
		alinkList[i].onmouseover=function(){
			startMove(this.getElementsByTagName('a')[0],'height',30);
		}
		alinkList[i].onmouseout=function(){
			startMove(this.getElementsByTagName('a')[0],'height',0);
		}
	}

	/*友情链接代码结束*/

	/*获取数据开始*/

	/*番职要闻*/
	var news=document.getElementById("news");
	var newsList=getClass(news,'newsList');
	
	/*获取番职要闻的每个新闻列表并将它添加到数组newsArr中*/	
	var newsArr=[];
	for(var i=0;i<newsList.length;i++){
		var newsAlink=newsList[i].getElementsByTagName("a");
		for(var j=0;j<newsAlink.length;j++){
			newsArr.push(newsAlink[j]);
		}
	}
	
	var xhr=new XMLHttpRequest();
	xhr.open("GET","controller/mainContrlloer.php");
	xhr.send();
	xhr.onreadystatechange=function(){
		if(xhr.readyState===4){
			var string=eval(xhr.responseText);		
			for(var i=0;i<newsArr.length-3;i++){
				newsArr[i].innerHTML=string[i]["resentNew_name"];
			}
			console.log(string);
		}
	}

	/*获取数据结束*/

}