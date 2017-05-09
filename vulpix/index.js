console.log("version: Fri May 05 2017 16:36:29 GMT+0200 (W. Europe Summer Time)");
	
var locale = "SV-sv";
var sessionToken = null;
var sessionUserId = null;
var resourceId = null;
var username = "tablet";
var password = "tab1234!";

function updateTime(){
	var d = new Date();
	$("#currentTime").text(d.toLocaleTimeString(locale, {hour: "2-digit", minute: "2-digit"}));
	$("#currentDate").text(d.toLocaleDateString(locale, {month: "long", day:"numeric"}));
};

function cancelReservation(reservationId){
	showLoading();
	deleteReservation(reservationId)
	.then(showPass)
	.then(fetchReservationsData)
	.fail(showFail)
	.always(hideLoading);
}

function extendReservation(reservationId){
	console.log(reservationId);
}

function updateReservationView(reservationItems){
	var l = [];
	
	for(var i=0; i<reservationItems.length; i++){
		var item = reservationItems[i];
		var s = new Date(item.startDate);
		var e = new Date(item.endDate);
		l.push("<figure class='reservationItem'>");
		l.push("	<p>" + item.title + "</p>");
		l.push("	<p>" + s.toLocaleString(locale, {year: "numeric", month: "numeric", weekday: "long", day:"numeric", hour: "2-digit", minute: "2-digit"}) + "</p>");
		l.push("	<p>" + e.toLocaleString(locale, {year: "numeric", month: "numeric", weekday: "long", day:"numeric",  hour: "2-digit", minute: "2-digit"}) + "</p>");
		l.push("	<div>");
		l.push("		<button class='button cancelReservationButton' onclick='cancelReservation(\"" + item.referenceNumber + "\")'>Cancel Reservation</button>");
		l.push("		<button class='button extendReservationButton' onclick='extendReservation(\"" + item.referenceNumber + "\")'>Extend Reservation</button>");
		l.push("	</div>");
		l.push("</figure>");
	}
	
	$("#reservationList").html(l.join("\n"));
	
	setTimeout(transformOut, 0);
	setTimeout(transformIn, 1000);
}

function transformOut(){
	var l = $(".reservationItem");
	
	for(var i=0; i<l.length; i++){
		var key = "transform";
		var value = "translate(-100vw, 0) rotateY(90deg)";
		$(l[i]).css(key, value);
	}
}

function transformIn(){
	var l = $(".reservationItem");

	for(var i=0; i<l.length; i++){
		var key = "transform";
		var value = "translate(0, 0) rotateY(0deg)";
		$(l[i]).css(key, value);
	}
}

function fetchToken(){
	return $.ajax({
		method: "POST",
		url: "http://slowbro.azurewebsites.net/Web/Services/index.php/Authentication/Authenticate",
		cache: false,
		dataType: "json",
		contentType: "application/json; charset=utf-8",
		data: JSON.stringify({
			username: username,
			password: password
		})
	}).done(function(r) {
		if(r.isAuthenticated){
			sessionToken = r.sessionToken;
			sessionUserId = r.userId;
		}
	});
}

function fetchResourceData(){
	return $.ajax({
		method: "GET",
		url: "http://slowbro.azurewebsites.net/Web/Services/index.php/Resources/" + resourceId,
		cache: false,
		headers: {
			"X-Booked-SessionToken": sessionToken,
			"X-Booked-UserId": sessionUserId
		}
	}).done(function(r) {
		$("#roomName").text(r.name);
	});
}

function fetchReservationsData(){
	return $.ajax({
		method: "GET",
		url: "http://slowbro.azurewebsites.net/Web/Services/index.php/Reservations/",
		dataType: "json",
		data: {
			resourceId: resourceId
		},
		headers: {
			"X-Booked-SessionToken": sessionToken,
			"X-Booked-UserId": sessionUserId
		}
	}).done(function(r) {
		updateReservationView(r.reservations);
	});
}

function getReservationId(){
	var array = window.location.search.substring(1).split("&");
	var argMap = {};
	
	for(var i=0; i<array.length; i++){
		var arg = array[i].split("=");
		argMap[arg[0]] = arg[1];
	}
	
	resourceId = argMap["resourceId"];
}

function promptPhonenumber(){
	var d = $.Deferred();
	$("#phonenumberWindow").show();
	$("#phonenumberWindow .textInput").focus();
	
	$("#phonenumberWindow .cancelButton").off("click").on("click", function(){
		$("#phonenumberWindow").hide();
		d.resolve();
	});
	
	$("#phonenumberWindow .okButton").off("click").on("click", function(){
		//d.reject();
		var phonenumber = $("#phonenumberWindow .textInput").val();
		
		$("#phonenumberWindow").hide();
		d.resolve(phonenumber);
	});
	
	return d.promise();
}

function formatDateTime(dateString, timeString){
	//ISO 8601
	var d = new Date(dateString + "T" + timeString + "+02:00");
	console.log(d);
	var	tzo = -d.getTimezoneOffset();
	var sign = tzo >= 0 ? '+' : '-';
	var pad = function(num) {
		var norm = Math.abs(Math.floor(num));
		return (norm < 10 ? '0' : '') + norm;
	};
	var r = dateString + "T" + timeString
		+ sign + pad(tzo / 60) + ':' + pad(tzo % 60);
	console.log(r);
	return r;
}

function showAddReservation(userId){
	$("#addReservationWindow").show();
	
	$("#addReservationWindow .cancelButton").off("click").on("click", function(){
		$("#addReservationWindow").hide();
	});
	
	$("#addReservationWindow .inputForm").off("submit").on("submit", function(){
		showLoading();
		
		postReservation({
			"userId": sessionUserId,
			"resourceId": resourceId,
			"startDateTime": formatDateTime($("#addReservationWindow #startDate").val(), $("#addReservationWindow #startTime").val()),
			"endDateTime": formatDateTime($("#addReservationWindow #endDate").val(), $("#addReservationWindow #endTime").val()),
			"title": $("#addReservationWindow #title").val(),
			"description": "reservation description",
			"recurrenceRule":{
				"type": "none"
			}
		})
		.then(function(){
			$("#addReservationWindow").hide();
		})
		.then(showPass)
		.then(fetchReservationsData)
		.fail(showFail)
		.always(hideLoading);
	});
}

function postReservation(reservationData){
	return $.ajax({
		method: "POST",
		url: "/Web/Services/index.php/Reservations/",
		contentType: "application/json; charset=utf-8",
		dataType: "json",
		data: JSON.stringify(reservationData),
		headers: {
			"X-Booked-SessionToken": sessionToken,
			"X-Booked-UserId": sessionUserId
		}
	});
}

function deleteReservation(reservationId){
	return $.ajax({
		method: "DELETE",
		url: "/Web/Services/index.php/Reservations/" + reservationId,
		dataType: "json",
		headers: {
			"X-Booked-SessionToken": sessionToken,
			"X-Booked-UserId": sessionUserId
		}
	});
}

function showPass(){
	$("#passWindow").show();
	$("#passWindow .okButton").off("click").on("click", function(){
		$("#passWindow").hide();
	});
}

function showFail(e){
	console.error(e);
	var m = "Default error";
	
	if(!e){
		m = "Unknown error";
	}
	else if(e.readyState == 0){
		m = "Could not send request to the server";
	}
	else if(e.responseJSON && e.responseJSON.errors){
		m = e.responseJSON.errors.join("\n");
	}
	else{
		m = JSON.stringify(e);
	}
	
	$("#failWindow #errorMessage").text(m);
	
	$("#failWindow .okButton").off("click").on("click", function(){
		$("#failWindow").hide();
	});
	
	$("#failWindow").show();
}

function showLoading(){
	$("#loadWindow").show();
}

function hideLoading(){
	$("#loadWindow").hide();
}

function runHarlemShake(){
	javascript:(function(){function c(){var e=document.createElement("link");e.setAttribute("type","text/css");e.setAttribute("rel","stylesheet");e.setAttribute("href",f);e.setAttribute("class",l);document.body.appendChild(e)}function h(){var e=document.getElementsByClassName(l);for(var t=0;t<e.length;t++){document.body.removeChild(e[t])}}function p(){var e=document.createElement("div");e.setAttribute("class",a);document.body.appendChild(e);setTimeout(function(){document.body.removeChild(e)},100)}function d(e){return{height:e.offsetHeight,width:e.offsetWidth}}function v(i){var s=d(i);return s.height>e&&s.height<n&&s.width>t&&s.width<r}function m(e){var t=e;var n=0;while(!!t){n+=t.offsetTop;t=t.offsetParent}return n}function g(){var e=document.documentElement;if(!!window.innerWidth){return window.innerHeight}else if(e&&!isNaN(e.clientHeight)){return e.clientHeight}return 0}function y(){if(window.pageYOffset){return window.pageYOffset}return Math.max(document.documentElement.scrollTop,document.body.scrollTop)}function E(e){var t=m(e);return t>=w&&t<=b+w}function S(){var e=document.createElement("audio");e.setAttribute("class",l);e.src=i;e.loop=false;e.addEventListener("canplay",function(){setTimeout(function(){x(k)},500);setTimeout(function(){N();p();for(var e=0;e<O.length;e++){T(O[e])}},15500)},true);e.addEventListener("ended",function(){N();h()},true);e.innerHTML=" <p>If you are reading this, it is because your browser does not support the audio element. We recommend that you get a new browser.</p> <p>";document.body.appendChild(e);e.play()}function x(e){e.className+=" "+s+" "+o}function T(e){e.className+=" "+s+" "+u[Math.floor(Math.random()*u.length)]}function N(){var e=document.getElementsByClassName(s);var t=new RegExp("\\b"+s+"\\b");for(var n=0;n<e.length;){e[n].className=e[n].className.replace(t,"")}}var e=30;var t=30;var n=350;var r=350;var i="//s3.amazonaws.com/moovweb-marketing/playground/harlem-shake.mp3";var s="mw-harlem_shake_me";var o="im_first";var u=["im_drunk","im_baked","im_trippin","im_blown"];var a="mw-strobe_light";var f="//s3.amazonaws.com/moovweb-marketing/playground/harlem-shake-style.css";var l="mw_added_css";var b=g();var w=y();var C=document.getElementsByTagName("*");var k=null;for(var L=0;L<C.length;L++){var A=C[L];if(v(A)){if(E(A)){k=A;break}}}if(A===null){console.warn("Could not find a node of the right size. Please try a different page.");return}c();S();var O=[];for(var L=0;L<C.length;L++){var A=C[L];if(v(A)){O.push(A)}}})();
}

function checkVideo(){
	var v = $("#videoBackground")[0];
	if(v.paused){
		v.play();
	}
}

function setHandlers(){
	$(".addReservationButton").off("click").on("click", function(){
		/*
		promptPhonenumber()
		.then(function(phonenumber){
			if(phonenumber){	
				console.log(phonenumber);
			}
			else{
				console.log("cancel");
			}
		})
		*/
		showAddReservation();
	});
	
	$("#imageLogo").on("click", runHarlemShake);
}

$(document).ready(function(){
	showLoading();
	getReservationId();
	updateTime();
	//updateReservationView(mockData);
	
	fetchToken()
	.then(fetchResourceData)
	.then(fetchReservationsData)
	.always(hideLoading);
	
	setInterval(function(){
		updateTime();
		checkVideo();
		
		fetchReservationsData()
		.fail(fetchToken);
	}, 1000 * 60);
	
	setHandlers();
});