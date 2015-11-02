$(document).ready(function(e){
	$('#modal_trigger').click(function(){
		$('.op').fadeIn(100);
		$('.popupContainer').slideDown(300);
	})
	$('.op ,#back').click(function(){
		$('.op').fadeOut("slow");
		$('.popupContainer').slideUp(300);;
	})
	var loc = window.location.hash.replace("#","");
	if (loc == "error") {$('.popupContainer, .op, .err').slideDown(300);
		$('.popupContainer form label').css("color","#D9534F");
	}
	//Вивести, сховати кнопки прокрутки слайдера
	$('#slider').mouseenter(function(){
		$('.next, .previous').animate({opacity: '0.8'},"slow");
	});
	$('#slider').mouseleave(function(){
		$('.next, .previous').animate({opacity: '0'},"slow");
	});
 	//Змінити колір кнопок слайдера при наведенні
	$('.next').mouseenter(function(){
		$(this).css("background-position", "right bottom");
	});
	$('.next').mouseleave(function(){
		$(this).css("background-position", "right top");
	});
	$('.previous').mouseenter(function(){
		$(this).css("background-position", "left bottom");
	});
	$('.previous').mouseleave(function(){
		$(this).css("background-position", "left top");
	});

	var hwSlideSpeed = 1000; //час анімації
	var hwTimeOut = 3000;    //час затримки слайда

	$('.slide').hide().eq(0).show();
	var slideNum = 0;
	slideCount = $("#slider .slide").size(); //рахуємо кількість слайдів
	//фнукція перебору слайдів по виклику або натисканні кнопки
	var animSlide = function(arrow){
		clearTimeout(slideTime);
		$('.slide').eq(slideNum).hide(hwSlideSpeed);
		if(arrow == "next"){
			if(slideNum == (slideCount-1)){slideNum=0;}
			else{slideNum ++}
			}
		else if(arrow == "prew")
		{
			if(slideNum == 0){slideNum=slideCount-1;}
			else{slideNum -= 1}
		}
		else{
			slideNum = arrow;
			}
		$('.slide').eq(slideNum).show(hwSlideSpeed, rotator);
		}

		$('.next').click(function(){
			animSlide("next");
			})
		$('.previous').click(function(){
			animSlide("prew");
			})
	//Функція перемикання слайдів по закінченню Timeout
	var rotator = function() {slideTime = setTimeout(function(){animSlide('next')}, hwTimeOut);}
	rotator();

	$('.modal_trigger').mouseenter(function(){
		$('.popupContainer').show();
	})
});
