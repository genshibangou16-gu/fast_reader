// JavaScript Document

function step(parsedJsonEncodedText, textArea) {
	const textAreaWidth = textArea.offsetWidth;
	
	let lineWidth = 0;
	let wordCount = 0;
	let maxWordCount = 0;
	
	parsedJsonEncodedText.forEach((e) => {
		const word = document.createElement('span');
		word.classList.add('stepped__span');
		word.textContent = e[0];
		textArea.appendChild(word);
		lineWidth = lineWidth + word.offsetWidth;
		if(lineWidth > textAreaWidth) {
			const br = document.createElement('br');
			word.before(br);
			lineWidth = word.offsetWidth;
			(maxWordCount < wordCount) ? maxWordCount = wordCount : null;
			wordCount = 0;
		}
		word.style.transform = `translateY(${0.075 * wordCount}em)`;
		wordCount++;
	});
	
	textArea.style.lineHeight = `${1.3 + maxWordCount * 0.075}em`;
}