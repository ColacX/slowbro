console.log("version datetime: Tue May 23 2017 14:02:56 GMT+0200 (W. Europe Daylight Time)");
	
var locale = "SV-sv";
var sessionToken = null;
var sessionUserId = null;
var resourceId = null;
var username = "tablet";
var password = "tab1234!";
var pushServicePublicKey = "BOgNlIommuYhTrYgld5WV6r3k2Z1kO0rzbfNgLoWDhDb-prQNln-aWUdHSAazgMlghTt-1ZB-ejKz4u57Pi1V9s";
var swRegistration = null;
var stateStack = [];

function updateTime(){
	var d = new Date();
	$("#currentTime").text(d.toLocaleTimeString(locale, {hour: "2-digit", minute: "2-digit"}));
	$("#currentDate").text(d.toLocaleDateString(locale, {month: "long", day:"numeric"}));
};

function cancelReservation(reservationId){
	promptConfirm()
	.then(function(){
		showLoading();
		deleteReservation(reservationId)
		.then(showPass)
		.then(fetchReservationsData)
		.fail(showFail)
		.always(hideLoading);
	});
}

function extendReservation(reservationId){
	console.log("extendReservation");
}

function updateReservationView(reservationItems){
	var l = [];
	
	for(var i=0; i<reservationItems.length; i++){
		var item = reservationItems[i];
		var s = new Date(item.startDate);
		var e = new Date(item.endDate);
		var n = new Date();
		
		l.push("<div 'id=\"ri-" + item.referenceNumber + "\"' class='reservationItem'>");
		l.push("	<p>" + item.title + "</p></br>");
		l.push("	<p>" + s.toLocaleString('en-UK', {weekday: "long"}));
		l.push("	   " + s.toLocaleString('locale', {hour: "2-digit", minute: "2-digit"}) + "</p>");
		l.push("	<p>" + s.toLocaleString(locale, {year: "numeric", month: "numeric", day:"numeric"}) + "</p></br>");
		l.push("	<p>" + e.toLocaleString('en-UK', {weekday: "long"}));
		l.push("	   " + e.toLocaleString('locale', {hour: "2-digit", minute: "2-digit"}) + "</p>");
		l.push("	<p>" + e.toLocaleString(locale, {year: "numeric", month: "numeric", day:"numeric"}) + "</p></br>");
		
		if(s <= n && n <= e){
			l.push("<div class='pikachuHolder'></div>");
			l.push($("#reservationRunningTemplate").html());
		}
		else{
			l.push("<div class='pikachuHolder'></div>");
			l.push("	<div>");
			l.push("		<button class='button cancelReservationButton' onclick='cancelReservation(\"" + item.referenceNumber + "\")'>Cancel Reservation</button>");
			//l.push("		<button class='button extendReservationButton' onclick='extendReservation(\"" + item.referenceNumber + "\")'>Extend Reservation</button>");
			l.push("	</div>");
		}
		
		l.push("</div>");
	}
	
	$("#reservationList").html(l.join("\n"));
	
	setTimeout(transformOut, 0);
	setTimeout(transformIn, 1000);
}

function transformOut(){
	var l = $(".reservationItem");
	
	for(var i=0; i<l.length; i++){
		var key = "transform";
		var value = "translate3d(-500vw, 0, -50vw) rotateY(90deg)";
		$(l[i]).css(key, value);
	}
}

function transformIn(){
	var l = $(".reservationItem");

	for(var i=0; i<l.length; i++){
		var key = "transform";
		var value = "translate3d(0, 0, 0) rotateY(0deg)";
		$(l[i]).css(key, value);
	}
}

function fetchToken(){
	return $.ajax({
		method: "POST",
		url: "/Web/Services/index.php/Authentication/Authenticate",
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
		url: "/Web/Services/index.php/Resources/" + resourceId,
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
		url: "/Web/Services/index.php/Reservations/",
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

function getResourceId(){
	var array = window.location.search.substring(1).split("&");
	var argMap = {};
	
	for(var i=0; i<array.length; i++){
		var arg = array[i].split("=");
		argMap[arg[0]] = arg[1];
	}
	
	resourceId = argMap["resourceId"];
}

function promptConfirm(){
	var d = $.Deferred();
	$("#confirmWindow").show();
	
	$("#confirmWindow .cancelButton").off("click").on("click", function(){
		$("#confirmWindow").hide();
		d.reject();
	});
	
	$("#confirmWindow .okButton").off("click").on("click", function(){
		$("#confirmWindow").hide();
		d.resolve();
	});
	
	return d.promise();
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
	var	tzo = -d.getTimezoneOffset();
	var sign = tzo >= 0 ? '+' : '-';
	var pad = function(num) {
		var norm = Math.abs(Math.floor(num));
		return (norm < 10 ? '0' : '') + norm;
	};
	var r = dateString + "T" + timeString
		+ sign + pad(tzo / 60) + ':' + pad(tzo % 60);
	return r;
}

function showAddReservation(userId){
	$("#addReservationWindow").show();
	
	$("#endDate").pickadate({
		format: "yyyy-mm-dd",
		formatSubmit: "yyyy-mm-dd",
		min: startDate
	});
	
	$("#endTime").pickatime({
		format: "HH:i",
		formatLabel: "HH:i",
		formatSubmit: "HH:i",
		min:[8,00],
		max:[18,00]
	});
	
	$("#startDate").pickadate({
		format: "yyyy-mm-dd",
		formatSubmit: "yyyy-mm-dd",
		min: new Date(),
		onSet: function() {
			var startDate = new Date($("#startDate").val());
			$("#endDate").pickadate("picker").set("min", startDate);
			$("#endDate").pickadate("picker").set("select", startDate);
		}
	});
	
	$("#startTime").pickatime({
		format: "HH:i",
		formatLabel: "HH:i",
		formatSubmit: "HH:i",
		min:[8,00],
		max:[18,00],
		onSet: function() {
			var startTime = $("#startTime").val();
			console.log(startTime);
		}
	});
	
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
	$("#passWindow").off("click").on("click", function(){
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
	
	$("#failWindow").off("click").on("click", function(){
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

function vibrate(milliseconds){
	if(!Android) return;
	Android.vibrate(milliseconds);
}

function runHarlemShake(){
	stateStack.push("harlem");
	
	$(".pikachuHolder").append($("#pikachuDancingTemplate").html());
	
	setTimeout(function(){
		$(".pikachuDancing").remove();
		stateStack.pop();
	}, 35*1000);
	
	javascript:(function(){function c(){var e=document.createElement("link");e.setAttribute("type","text/css");e.setAttribute("rel","stylesheet");e.setAttribute("href",f);e.setAttribute("class",l);document.body.appendChild(e)}function h(){var e=document.getElementsByClassName(l);for(var t=0;t<e.length;t++){document.body.removeChild(e[t])}}function p(){var e=document.createElement("div");e.setAttribute("class",a);document.body.appendChild(e);setTimeout(function(){document.body.removeChild(e)},100)}function d(e){return{height:e.offsetHeight,width:e.offsetWidth}}function v(i){var s=d(i);return s.height>e&&s.height<n&&s.width>t&&s.width<r}function m(e){var t=e;var n=0;while(!!t){n+=t.offsetTop;t=t.offsetParent}return n}function g(){var e=document.documentElement;if(!!window.innerWidth){return window.innerHeight}else if(e&&!isNaN(e.clientHeight)){return e.clientHeight}return 0}function y(){if(window.pageYOffset){return window.pageYOffset}return Math.max(document.documentElement.scrollTop,document.body.scrollTop)}function E(e){var t=m(e);return t>=w&&t<=b+w}function S(){var e=document.createElement("audio");e.setAttribute("class",l);e.src=i;e.loop=false;e.addEventListener("canplay",function(){setTimeout(function(){x(k)},500);setTimeout(function(){N();p();for(var e=0;e<O.length;e++){T(O[e])}},15500)},true);e.addEventListener("ended",function(){N();h()},true);e.innerHTML=" <p>If you are reading this, it is because your browser does not support the audio element. We recommend that you get a new browser.</p> <p>";document.body.appendChild(e);e.play()}function x(e){e.className+=" "+s+" "+o}function T(e){e.className+=" "+s+" "+u[Math.floor(Math.random()*u.length)]}function N(){var e=document.getElementsByClassName(s);var t=new RegExp("\\b"+s+"\\b");for(var n=0;n<e.length;){e[n].className=e[n].className.replace(t,"")}}var e=0;var t=0;var n=500;var r=500;var i="//s3.amazonaws.com/moovweb-marketing/playground/harlem-shake.mp3";var s="mw-harlem_shake_me";var o="im_first";var u=["im_drunk","im_baked","im_trippin","im_blown"];var a="mw-strobe_light";var f="//s3.amazonaws.com/moovweb-marketing/playground/harlem-shake-style.css";var l="mw_added_css";var b=g();var w=y();var C=document.getElementsByTagName("*");var k=null;for(var L=0;L<C.length;L++){var A=C[L];if(v(A)){if(E(A)){k=A;break}}}if(A===null){console.warn("Could not find a node of the right size. Please try a different page.");return}c();S();var O=[];for(var L=0;L<C.length;L++){var A=C[L];if(v(A)){O.push(A)}}})();

	vibrate(5000);
}

function checkVideo(){
	var v = $("#videoBackground")[0];
	if(v.paused){
		v.play();
	}
}

function urlB64ToUint8Array(base64String) {
	var padding = '='.repeat((4 - base64String.length % 4) % 4);
	var base64 = (base64String + padding)
	.replace(/\-/g, '+')
	.replace(/_/g, '/');

	var rawData = window.atob(base64);
	var outputArray = new Uint8Array(rawData.length);

	for (let i = 0; i < rawData.length; ++i) {
		outputArray[i] = rawData.charCodeAt(i);
	}
	
	return outputArray;
}

function registerServiceWorker(){
	if(!("serviceWorker" in navigator)) {
		alert("Service worker is not supported");
	}
	
	if(!("PushManager" in window)){
		alert("Push is not supported");
	}
	
	return navigator.serviceWorker.register("serviceWorker.js")
	.then(function(swr) {
		swRegistration = swr;
		console.log("Service Worker is registered", swr);
	})
	.catch(function(e) {
		console.error("Service Worker Error", e);
	});
}

function unregisterServiceWorker(){
}

function registerPushService(){
	return swRegistration.pushManager.subscribe({
		userVisibleOnly: true,
		applicationServerKey: urlB64ToUint8Array(pushServicePublicKey)
	})
	.then(function(subscription) {
		console.log("Push subscription succeeded");
		console.log(subscription);
		console.dir(JSON.stringify(subscription));
	})
	.catch(function(e) {
		console.error('Failed to subscribe to the push service', e);
	});
}

function unregisterPushService(){
}

function startIntervals()
{
	setInterval(function(){
		checkVideo();
	}, 1000);
	
	setInterval(function(){
		updateTime();
		
		if(stateStack.length == 0){
			fetchReservationsData()
			.fail(repeatFetchReservationData);
		}
	}, 1000 * 60);
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

function repeatInit(){
	console.log("repeatInit");
	return registerServiceWorker()
	.then(registerPushService)
	.then(fetchToken)
	.then(fetchResourceData)
	.then(fetchReservationsData)
	.then(startIntervals)
	.then(setHandlers)
	.then(hideLoading)
	.catch(function(e){
		console.error(e);
		setTimeout(repeatInit, 10 * 1000)
	});
}

function repeatFetchReservationData(){
	console.log("repeatFetchReservationData");
	return fetchToken()
	.then(fetchReservationsData)
	.fail(function(e){
		console.error(e);
		setTimeout(repeatFetchReservationData, 10 * 1000);
	});
}

$(document).ready(function(){
	$("#confirmWindow").hide();
	$("#phonenumberWindow").hide();
	$("#addReservationWindow").hide();
	$("#passWindow").hide();
	$("#failWindow").hide();
	$("#loadWindow").hide();
	
	getResourceId();
	updateTime();
	
	if(window.location.protocol == "file:"){
		//mock data below
		updateReservationView(mockdata.reservations);
	}
	
	showLoading();
	repeatInit();
});
