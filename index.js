// JavaScript Document

'use strict';

const page = document.getElementById('page');
const textarea = document.getElementById('textarea');
const left = document.getElementById('left');
const right = document.getElementById('right');
const dir_sign = document.getElementById('dir_sign');
const info_img = document.getElementById('info_img');
const info_panel = document.getElementById('info_panel');
const id = document.getElementById('id').value;
const td = document.querySelectorAll('.td');
const pageMax = Number(document.getElementById('pageMax').value);
const extension = document.getElementById('extension').value;

let is_touched = false;
let touchInfo = null;
let callbackID = null;
let startCoord = null;
let pageNum = null;
let direction = 1;
let infoStatus = false;

function load_index() {
	pageMax = 
	textarea.innerHTML = `${pageNum}/${pageMax}ページ`;
	fetch(`books/${id}/index.json`)
	.then((response) => {
		return response.json();
	})
	.then((data) => {
		if(data.direction) direction = Number(data.direction);
		if(data.format) format = data.format;
		window.requestAnimationFrame(() => {
			if(data.title) td[0].innerHTML = data.title;
			if(data.author) td[1].innerHTML = data.author;
			if(data.publisher) td[2].innerHTML = data.publisher;
			if(data.date) td[3].innerHTML = data.date;
			if(direction == 1) {
				dir_sign.innerHTML = '左';
			}else {
				dir_sign.innerHTML = '右';
			}
			page.src = `books/${id}/${('00'+pageNum).slice(-2)}.${extension}`;
			page.classList.remove('hidden');
		});
	})
}

function end() {
	if(callbackID) {
		window.cancelAnimationFrame(callbackID);
		callbackID = null;
	}
	is_touched = false;
	touchInfo = null;
}

function flip(n) {
	window.cancelAnimationFrame(callbackID);
	callbackID = null;
	if(infoStatus) {
		infoStatus = false;
		info_panel.classList.add('hidden');
		return;
	}
	if(pageMax) {
		textarea.innerHTML = `${n}/${pageMax}ページ`;
	}else {
		textarea.innerHTML = `${n}ページ`;
	}
	page.src = `books/${id}/${('00'+pageNum).slice(-2)}.${format}`;
    document.cookie = `${id}=${n};max-age=31536000;secure`;
}

function flip_judge() {
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
		callbackID = requestAnimationFrame(flip_judge);
	}
}

window.addEventListener('DOMContentLoaded', () => {
    if(navigator.cookieEnabled) {
        pageNum = Number(document.getElementById('pageNum').value);
        document.cookie = `${id}=${pageNum};max-age=31536000;secure`;
    }else {
        alert('This browser doesn\'t support the page-saving feature.');
    }
	load_index();
})

window.addEventListener('touchstart', (i) => {
	if(!is_touched) {
		is_touched = true;
		startCoord = i.changedTouches[0].pageX;
		touchInfo = i.changedTouches[0];
		callbackID = requestAnimationFrame(flip_judge);
	}else {
		window.cancelAnimationFrame(callbackID);
		callbackID = null;
	}
})

window.addEventListener('touchmove', (i) => {
	touchInfo = i.changedTouches[0];
})

window.addEventListener('touchend', () => {
	end();
})

window.addEventListener('touchcancel', () => {
	end();
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

info_img.addEventListener('click', () => {
	if(infoStatus) {
		infoStatus = false;
	}else {
		infoStatus = true;
	}
	info_panel.classList.toggle('hidden');
})

dir_sign.addEventListener('click', () => {
	if(direction == 1) {
		direction = -1
		dir_sign.innerHTML = '右';
	}else {
		direction = 1;
		dir_sign.innerHTML = '左';
	}
})