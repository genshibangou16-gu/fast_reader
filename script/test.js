// JavaScript Document

function initStep(input, text) {
	for(let i = 0; i < input.length; i++) {
		const data = new FormData();
		data.append('inputText', encodeURIComponent(input[i].value));
		
		fetch('https://book.sorabi.jp/fastreader/parts_api.php', {
			method: 'POST',
			body: data
		}).then((res) => {
			return res.json();
		}).then((data) => {
			step(data, text[i]);
			input[i].parentElement.classList.add('hidden');
		});
	}
}

window.addEventListener('DOMContentLoaded', () => {
	const stepped__input = document.getElementsByClassName('stepped__input');
	const stepped__text = document.getElementsByClassName('stepped__text');
	
	const wrapper__next = document.getElementsByClassName('wrapper__next');
	const wrapper__page = document.getElementsByClassName('wrapper__page');
	const len = wrapper__page.length;
	
	// this is for google form 
	const entries = [783365543, 331497032, 1420714410, 128667888, 631274546, 503847432, 1388349037, 697067311, 1119254390, 448596744, 434695248, 495684129] 
	
	// get text length to calc reading speed
	let textLengths = [];
	(function () {
		const test = document.getElementsByClassName('test');
		Array.from(test).forEach((t) => {
			textLengths.push(t.textContent.length);
		});
		textLengths.shift();
		Array.from(stepped__input).forEach((s) => {
			textLengths.push(s.value.length);
		})
	}());
	
	class Pages {
		constructor(page, button, number) {
			this.page = page;
			this.button = button;
			this.number = number;
			this.is_test = false;
		}
		set() {
			this.button.addEventListener('click', () => {
				this.end = Date.now();
				pages[this.number + 1].start = Date.now();
				this.page.classList.add('hidden');
				pages[this.number + 1].page.classList.remove('hidden');
			});
		}
		calc() {
			this.duration = (this.end - this.start) / 1000;
			return this.textLength / this.duration * 60;
		}
	}
	
	let pages = [];
	(function () {
		let j = 0;
		for(let i = 0; i < len; i++) {
			pages[i] = new Pages(wrapper__page[i], wrapper__next[i], i);
			if(pages[i].page.classList.contains('wrapper__page--test')) {
				pages[i].is_test = true;
				pages[i].textLength = textLengths[j];
				pages[i].entry = entries[j];
				j++;
			}
		}
		for(let i = 0; i < len - 1; i++) {
			pages[i].set();
		}
	}());
	
	setTimeout(() => {initStep(stepped__input, stepped__text)}, 1000);
	
	const result = document.getElementById('result');
	const resultButton = document.getElementById('result__button');
	const resultData = document.getElementById('result__data');
	const fonts = ['游明朝', '游ゴシック', 'ヒラギノ明朝', 'ヒラギノ角ゴ', '最適化表示:明朝体', '最適化表示:ゴシック体'];
	resultButton.addEventListener('click', () => {
		resultButton.classList.add('hidden');
		let i = 0;
		pages.forEach((p) => {
			if(p.is_test) {
				const input = document.createElement('input');
				input.type = 'hidden';
				input.name = `entry.${p.entry}`
				input.value = p.calc();
				resultData.appendChild(input);
				if(i % 2) {
					const speed = (p.textLength + pages[p.number - 1].textLength) / (p.duration + pages[p.number - 1].duration) * 60;
					const tr = document.createElement('tr');
					const td1 = document.createElement('td');
					const td2 = document.createElement('td');
					td1.textContent = fonts[Math.floor(i / 2)];
					td2.textContent = `${Math.round(speed)}文字/分`;
					tr.appendChild(td1);
					tr.appendChild(td2);
					resultData.appendChild(tr);
				}
				i++;
			}
		});
		result.classList.remove('hidden');
	});
});