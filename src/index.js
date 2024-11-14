// JavaScript Document

'use strict';

const page = document.getElementById('page');
const textarea = document.getElementById('textarea');
const left = document.getElementById('left');
const right = document.getElementById('right');
const infoButton = document.getElementById('infoButton');
const homeButton = document.getElementById('homeButton');
const infoPanel = document.getElementById('infoPanel');
const id = document.getElementById('id').value;
const td = document.querySelectorAll('.td');
const pageMax = Number(document.getElementById('pageMax').value);
const extension = document.getElementById('extension').value;

let isTouched = false;
let touchInfo = null;
let callbackID = null;
let startCoord = null;
let pageNum = null;
let direction = 1;
let isInfoPanelOpen = false;

// index.jsonの読み込み
function loadBookInfo() {
	textarea.innerHTML = `${pageNum}/${pageMax}ページ`;
	fetch(`books/${id}/index.json`)
	.then((response) => {
		return response.json();
	})
	.then((data) => {
		if(data.direction) direction = Number(data.direction);
		window.requestAnimationFrame(() => {
			if(data.title) td[0].innerHTML = data.title;
			if(data.author) td[1].innerHTML = data.author;
			if(data.publisher) td[2].innerHTML = data.publisher;
			if(data.date) td[3].innerHTML = data.date;
			if(direction === -1) direction = -1;
			page.src = `books/${id}/${('00'+pageNum).slice(-2)}.${extension}`;
			page.classList.remove('hidden');
		});
	})
}

// ページめくり
function flip(n) {
	window.cancelAnimationFrame(callbackID);
	callbackID = null;
	if(isInfoPanelOpen) {
		isInfoPanelOpen = false;
		infoPanel.classList.add('hidden');
		return;
	}
	if(pageMax) {
		textarea.innerHTML = `${n}/${pageMax}ページ`;
	}else {
		textarea.innerHTML = `${n}ページ`;
	}
	page.src = `books/${id}/${('00'+pageNum).slice(-2)}.${extension}`;
    document.cookie = `${id}=${n};max-age=31536000;secure`;
}

// ページめくりの判定
function flipJudge() {
	let diff = touchInfo.pageX - startCoord;
	if(diff < -50) {
		if(pageNum == 1 && direction == 1) return;
		if(pageNum == pageMax && direction == -1) return;
		pageNum = pageNum + direction * -1;
		window.requestAnimationFrame(flip.bind(null, pageNum));
	}else if(diff > 50) {
		if(pageNum == 1 && direction == -1) return;
		if(pageNum == pageMax && direction == 1) return;
		pageNum = pageNum + direction;
		window.requestAnimationFrame(flip.bind(null, pageNum));
	}else {
		callbackID = requestAnimationFrame(flipJudge);
	}
}

// タッチ終了時の処理
function touchTerminator() {
	if(callbackID) {
		window.cancelAnimationFrame(callbackID);
		callbackID = null;
	}
	isTouched = false;
	touchInfo = null;
}

//
// Event listeners
//

window.addEventListener('DOMContentLoaded', () => {
    if(navigator.cookieEnabled) {
        pageNum = Number(document.getElementById('pageNum').value);
        document.cookie = `${id}=${pageNum};max-age=31536000;secure`;
    }else {
        alert('This browser doesn\'t support the page-saving feature.');
    }
	loadBookInfo();
})

window.addEventListener('touchstart', (i) => {
	if(!isTouched) {
		isTouched = true;
		startCoord = i.changedTouches[0].pageX;
		touchInfo = i.changedTouches[0];
		callbackID = requestAnimationFrame(flipJudge);
	}else {
		window.cancelAnimationFrame(callbackID);
		callbackID = null;
	}
})

window.addEventListener('touchmove', (i) => {
	touchInfo = i.changedTouches[0];
})

window.addEventListener('touchend', () => {
	touchTerminator();
})

window.addEventListener('touchcancel', () => {
	touchTerminator();
})

left.addEventListener('click', () => {
	if(pageNum == 1 && direction == -1) return;
	if(pageNum == pageMax && direction == 1) return;
	pageNum = pageNum + direction;
	window.requestAnimationFrame(flip.bind(null, pageNum));
})

right.addEventListener('click', () => {
	if(pageNum == 1 && direction == 1) return;
	if(pageNum == pageMax && direction == -1) return;
	pageNum = pageNum + direction * -1;
	window.requestAnimationFrame(flip.bind(null, pageNum));
})

infoButton.addEventListener('click', () => {
	if(isInfoPanelOpen) {
		isInfoPanelOpen = false;
	}else {
		isInfoPanelOpen = true;
	}
	infoPanel.classList.toggle('hidden');
})

homeButton.addEventListener('click', () => {
	window.location.href = '/index.php';
});